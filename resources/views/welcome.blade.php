@extends('layouts.app')

@section('content')

<div class="welcome container">
    <div class="text-center">
        <img alt="comprAS" class="mx-auto" src="{{ asset('images/logo.png') }}">
    </div>
    <div class="my-4">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input autofocus class="form-control @error('email') is-invalid @enderror" id="email" name="email" required type="email" value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input auto-complete="current-password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required type="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group form-check">
                <input class="form-check-input" id="remember" name="remember" type="checkbox"  {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Recuerdame</label>
            </div>
            <button class="btn btn-success btn-block" type="submit">Acceder</button>
        </form>
    </div>
    <a class="btn btn-danger btn-block" href="{{ route('register') }}">Registrarme</a>
    {{-- <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>
    </form>
    <div>
        <a href="{{ route('register') }}" class="btn btn-primary">Registrar</a>
    </div> --}}
</div>


@endsection
