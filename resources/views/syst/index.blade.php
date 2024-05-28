@extends('master')
@push('scripts')
    <script type="module" src="http://[::1]:5173/resources/js/xd.js"></script>
@endpush
@section('content')
    <div class="">
        <div class="w-full bg-blue-400 rounded-lg border border-blue-600 shadow-md text-white px-2 font-bold text-sm">
            SISGC » Cursos » Administrar Cursoss
        </div>
        <h1 class="text-3xl mb-6 text-center font-bold mt-4">Administrar Sistemas</h1>

        <div
            class="max-w-xl mx-auto bg-blue-300 rounded-lg border border-blue-600 shadow-md text-white px-2 font-bold text-sm">
            xs
        </div>

        <div class="container">
            <button class="btn btn-primary" id="toggleSearch">Buscar</button>
            <div class="search-form hidden" id="searchForm">
                <form class="flex flex-col">
                    <label for="searchInput" class="mb-2">Buscar</label>
                    <input type="text" id="searchInput" class="border border-gray-300 p-2 rounded">
                    <button type="submit" class="btn btn-primary mt-2">Buscar</button>
                </form>
            </div>
        </div>


        <ul class="mt-6 list-disc ml-4">
            @foreach ($systs as $syst)
                <li class="text-1xl mb-4">
                    <a href="{{ route('sistemas.show', $syst) }}">{{ $syst->code }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
