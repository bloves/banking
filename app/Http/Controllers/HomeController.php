<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransferRequest;
use App\Models\User;
use App\Repositories\Transaction\TransactionRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $transaction;
    public function __construct(TransactionRepository $transaction)
    {
        $this->middleware('auth');
        $this->transaction = $transaction;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function deposit()
    {
        return view('deposit');
    }
    public function depositPost(Request $request)
    {
        $data['credit'] = $request->amount;
        $data['balance'] = Auth::user()->balance + $data['credit'];
        $data['user_id'] = Auth::user()->id;
        $credit = $this->transaction->create($data);
        if($credit){
            $user = Auth::user();
            $user->balance = $data['balance'];
            $user->save();
        }
        
        return redirect()->route('home');
    }
    public function withdraw()
    {
        return view('withdraw');
    }
    public function withdrawPost(Request $request)
    {
        $data['debit'] = $request->amount;
        if(Auth::user()->balance>$data['debit']){
            $data['balance'] = Auth::user()->balance - $data['debit'];
            $data['user_id'] = Auth::user()->id;
            $debit = $this->transaction->create($data);
            if($debit){
                $user = Auth::user();
                $user->balance = $data['balance'];
                $user->save();
            }
            
            return redirect()->route('home')->withSuccess('Money debited successfully');
        }else{
            return redirect()->route('home')->withError('Not enough money');
        }
    }
    public function transfer()
    {
        return view('transfer');
    }
    public function transferPost(TransferRequest $request)
    {
        $data['debit'] = $request->amount;
        $data['credit'] = $request->amount;
        if(Auth::user()->balance>$data['debit']){
            $tranfer =  User::where('email',$request->email)->first();
            $data['balance'] = Auth::user()->balance - $data['debit'];
            $data['user_id'] = Auth::user()->id;
            $data['transferred'] = $tranfer->id;
            $data['balance_credited'] = $tranfer->balance + $data['debit'];
            $data['created_at'] = Carbon::now();
            DB::beginTransaction();
            try {
               
                $credit['user_id'] = $tranfer->id;
                $credit['transferred'] = $data['transferred'];
                $credit['credit'] = $data['credit'];
                $credit['balance'] = $data['balance_credited'];
                $credit['created_at'] = $data['created_at'];
                $debit['user_id'] = $data['user_id'];
                $debit['transferred'] = $data['user_id'];
                $debit['debit'] = $data['debit'];
                $debit['balance'] = $data['balance'];
                $debit['created_at'] = $data['created_at'];
                DB::table('transactions')->insert($credit);
                DB::table('transactions')->insert($debit);

                DB::update("update users set balance = {$data['balance']} where id = {$data['user_id']}");
                DB::update("update users set balance = {$data['balance_credited']} where id = {$data['transferred']}");
            
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                return redirect()->route('home')->withError('Transaction not completed');

            }
            return redirect()->route('home')->withSuccess('Money transferred successfully');
        }else{
            return redirect()->route('home')->withError('Not enough money');
        }
    }
    public function statement()
    {
        $transactions = $this->transaction->get(Auth::user()->id);
        return view('statement')->with('transactions',$transactions);
    }
}
