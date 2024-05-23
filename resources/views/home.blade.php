@extends('adminlte::page')

@section('title')
    Laravel 11
@endsection

@section('content_header')
    <h1>Home</h1>
@endsection

@section('content')
        <h1>Welcome to my blog</h1>
        <x-alert type="success" class="mb-4">
            <x-slot name="title"> Alerta!</x-slot>
            Esto es una alerta
        </x-alert>
        <p>Hola Mundi</p>
@endsection
