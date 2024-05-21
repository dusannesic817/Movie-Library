@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" >
        <div class="col-6">
            <div class="card border-0">
                <div class="card-body">
                    <div class="d-flex flex-column mb-3">
                        <div class="p-2 text-center"><img src="/storage/profile/cinema_logo.png" height="200px"></div>
                        <div class="p-2 text-center mb-3">
                            <h2>{{ __('Welcome Please Sing In') }}</h2>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="p-2">
                                <div class="mb-3">                      
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="p-2 text-center ">
                                <div class="mb-3 form-check d-inline-block">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="exampleCheck1"> {{ __('Remember Me') }}</label>
                                </div>
                            </div>
                            <div class="p-2 text-center">
                                <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
