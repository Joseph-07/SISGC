@extends('master')

@section('content')
    <h1 class="text-3xl mb-6">Personal</h1>

    <ul class="mt-6">
        @foreach ($personals as $personal)
            <li class="text-1xl mb-4">
                {{ $personal->name }}
            </li>
        @endforeach
    </ul>
@endsection