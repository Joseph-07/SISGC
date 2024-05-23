@extends('layouts.app')

@section('title')
    Laravel 11
@endsection

@push('css')
    <style>
        body {
            background-color: #f8fafc;
        }
    </style>
@endpush

@section('content')
        <h1>Welcome to my blog</h1>
        <x-alert2 type="warning" class="mb-4">
            <x-slot name="title"> Alerta!</x-slot>
            Esto es una alerta
        </x-alert2>
        <p>Hola Mundo</p>
@endsection
