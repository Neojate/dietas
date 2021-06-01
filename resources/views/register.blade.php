@extends('layouts.app')

@section('content')

<div class="welcome container">
    <div class="text-center">
        <img alt="comprAS" class="mx-auto" src="{{ asset('images/logo.png') }}">
    </div>
    <div class="my-4">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input autocomplete="name" autofocus class="form-control @error('name') is-invalid @enderror" id="name" name="name" required type="text" value="{{ old('name') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input autocomplete="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required type="email" value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input autocomplete="new-password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required type="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password-confirm">Repetir contraseña</label>
                <input autocomplete="new-password" class="form-control" id="password-confirm" name="password_confirmation" required type="password">
            </div>
            <button class="btn btn-success btn-block" type="submit">Registrarme</button>
        </form>
    </div>

</div>

@endsection
