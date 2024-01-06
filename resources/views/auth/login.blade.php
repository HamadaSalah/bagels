@extends('layouts.app')

@section('content')
<div class="pageheaders">
    <h1>LOGIN</h1>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="loginPage">

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1 style="font-weight: bold;color: #FFF">Hello!</h1>
                    <p style="font-weight: bold;color: #FFF">Welcome</p>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-12 ">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            <a style="color: #FFF" class="btn btn-link" href="{{ route('register') }}">
                                {{ __('Don\'t Have Acoount Register?') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
