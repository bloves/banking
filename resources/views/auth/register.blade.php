@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="container">

                <div class="card">
                    {{-- <div class="card-header">{{ __('Register') }}</div> --}}
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <h6>Create new account</h6>

                        <div class="form-group">
                                <label for="name" class="col-form-label text-md-end">{{ __('Name') }}</label>

                                
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>

                        <div class="form-group">
                                <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>

                               
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>

                        <div class="form-group">
                                <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>

                                
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>

                        <div class="form-group">
                                <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="terms" id="terms" required {{ old('terms') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="terms">
                                        Agree the <span style="color:blue">terms and policy</span>
                                    </label>
                                </div>
                        </div>
                        <div class="form-group">
                                
                                    <button type="submit" class="btn btn-primary form-control">
                                        Create new account
                                    </button>
                                
                            </div>
                        </form>
                    </div>
                </div>

                <div style="justify-content: center; display: flex;padding-top: 25px;">
                    <h6 class="align-items-center">Already have an account? <a class="link-primary" href="{{ route('login') }}">Sign In</a></h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
