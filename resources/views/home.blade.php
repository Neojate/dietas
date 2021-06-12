@extends('layouts.app')

@section('content')

    <div class="text-center mt-4">
        <img src="{{ asset('images/logo.png') }}" alt="logo">
    </div>

    <div class="d-grid gap-2 my-4">
        <a class="btn btn-primary" href="{{ route('listas.index') }}">{{ trans('front_lang.listas') }}</a>
    </div>
    <div class="d-grid gap-2 my-4">
        <a class="btn btn-primary" href="{{ route('historial.index') }}">{{ trans('front_lang.historial') }}</a>
    </div>
    <div class="d-grid gap-2 my-4">
        <a class="btn btn-primary" href="{{ route('compras.index') }}">{{ trans('front_lang.comprar') }}</a>
    </div>
    <div class="d-grid gap-2 my-4">
        <a class="btn btn-primary" href="{{ route('listas.index') }}">{{ trans('front_lang.salir') }}</a>
    </div>


@endsection
