@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
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
                    <h4>Welcome {{Auth::user()->name}}</h4>
                   <table class="table table-striped">
                        <tr>
                            <th>
                                Your id
                            </th>
                            <td>
                                {{Auth::user()->email}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Your balance
                            </th>
                            <td>
                                {{Auth::user()->balance}}
                            </td>
                        </tr>
                        
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
