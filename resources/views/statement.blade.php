@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <h4>Statement of account</h4>
                   <table class="table table-striped">
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                DATETIME
                            </th>
                            <th>
                                AMOUNT
                            </th>
                            <th>
                                TYPE
                            </th>
                            <th>
                                DETAILS
                            </th>
                            <th>
                                BALANCE
                            </th>
                        </tr>
                           @isset($transactions)
                            @foreach ($transactions as $item)
                            <tr>
                                <td>
                                    #
                                </td>
                                <td>
                                    {{$item->created_at}}
                                </td>
                                <td>
                                    @if($item->debit) {{$item->debit}} @else  {{$item->credit}} @endif
                                </td>
                                <td>
                                    @if($item->debit) Debit @else  Credit @endif
                                </td>
                                <td>
                                    @if($item->transferred && $item->debit) Transferred to {{$item->user->email}} 
                                    @elseif($item->transferred && $item->credit)  Transffered from {{$item->user->email}} 
                                    @elseif($item->debit) Withdraw
                                    @else Deposit 
                                    @endif
                                </td>
                                <td>
                                    {{$item->balance}}
                                </td>
                            </tr>

                            @endforeach
                               
                           @endisset
                        
                   </table>
                   <div class="d-flex justify-content-center">
                    {!! $transactions->links() !!}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
