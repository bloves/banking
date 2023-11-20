<?php

namespace App\Repositories\Transaction;

use App\Models\Transaction;

class TransactionEloquent implements TransactionRepository
{
    public function get($id=Null)
    {
        if($id){
            return Transaction::where('user_id',$id)->paginate(10);
        }else{
            return Transaction::get();
        }
    }
    
    public function create($data)
    {   
        return Transaction::create($data);
    }
    
    public function update($id, $data)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->update($data);
        return $transaction;
    }
    
    public function delete($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
    }
}