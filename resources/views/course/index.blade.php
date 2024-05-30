@extends('master')
@push('scripts')
    <script type="module" src="http://[::1]:5173/resources/js/xd.js"></script>
    <script type="module" src="http://[::1]:5173/resources/css/sistema.css"></script>
@endpush
@php
    // $xs = $_SESSION['route-act'];
@endphp
@section('content')
    <div class="">
        <div class="w-full bg-emerald-700 rounded-lg shadow-md text-white px-2 font-semibold text-sm">
            SISGC » Sistemas » Administrar Sistemas
        </div>
        <h1 class="text-3xl mb-6 text-center font-bold mt-4">Administrar Sistemas</h1>

        <div class="  max-w-xl mx-auto shadow-2xl  rounded-lg ring-rounded z-10 " id="searchButton">
            <div class=" bg-slate-600 rounded-lg hover:bg-emerald-700" id="searchBar">
                <button class= "rounded-lg  text-white px-2 pb-1 font-semibold text-sm w-full text-left shadow-sm"
                    id="toggleSearch">Buscar</button>
            </div>
            <div class=" rounded-b-lg bg-white hidden p-3 " id="searchForm">
                <form class="flex flex-col mt-1">
                    <div class="border border-gray-300 ">
                        <span class="absolute ml-2 -translate-y-3 bg-white text-sm px-1">Filtro de búsqueda</span>
                        <div class="p-3 ">
                            <label for="searchInput" class="mb-2">Buscar</label>
                            <input type="text" id="searchInput"
                                class="border border-slate-300 p-2 rounded h-6 hover:border-blue-300">

                        </div>

                    </div>
                    <button type="submit"
                        class="mx-auto mt-2  bg-slate-600 hover:bg-emerald-700 text-white text-xs font-semibold p-2 rounded shadow-sm z-10">Buscar</button>
                </form>
            </div>
        </div>

        <div class="flex mt-2">
            <button id="btn-modal"
                class="ml-auto mr-1 flex mt-2 bg-slate-600 hover:bg-emerald-700 text-white text-xs font-semibold p-2 rounded shadow-md ">Nuevo</button>
            <a href="{{ route('inicio') }}"
                class="mr-auto ml-1 flex mt-2 bg-slate-600 hover:bg-emerald-700 text-white text-xs font-semibold p-2 rounded shadow-md ">Regresar</a>
        </div>

        <h1 id="boton[^1]">Administrar Sistemas</h1>
        <h1 id="boton[^1]">Administrar Sistemas</h1>

    </div>
@endsection
