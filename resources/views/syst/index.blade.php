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

        <div class="container max-w-2xl mx-auto mt-6 ">
            {{ $systs->links() }}

            <div class=" rounded-md bg-white shadow-xl">
                <div class=" bg-slate-200 w-full flex border-b-2 border-emerald-800 rounded-t-md shadow-3xl">
                    <span class="mx-auto text-md font-semibold text-gray-900 py-1">Lista de sistemas</span>
                </div>
                @isset($systs)
                    <div class="bg-emerald-700 border-b-2 border-emerald-800 grid grid-cols-3 text-white   ">
                        <span class="text-center ">Código</span>
                        <span class="text-center ">Descrición</span>
                        <span class="text-center">Acciones</span>
                    </div>
                    @foreach ($systs as $syst)
                        <div class="bg-slate-100 border-b-2 border-emerald-700 grid grid-cols-3 py-4">
                            <div class="text-center">
                                <span>{{ $syst->code }}</span>
                            </div>
                            <div class="text-center">
                                <span>{{ $syst->description }}</span>
                            </div>
                            <div class="text-center">
                                <span class="mr-1"><x-button
                                        href="{{ route('sistemas.edit', $syst) }}">Editar</x-button></span>
                                <form action="{{ route('sistemas.destroy', $syst) }}" method="post" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><a
                                            class="p-2 bg-slate-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded-xl">Eliminar</a></button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endisset
                @if (count($systs) == 0)
                    <div class="bg-slate-100 border-b-2 border-emerald-700  py-4">
                        <div class="text-center">
                            <span>No hay sistemas</span>
                        </div>
                    </div>
                @endif
                <div class="bg-white rounded-b-md h-5">

                </div>
            </div>

            {{ $systs->links() }}

        </div>
        {{-- @include('syst.create-modal') --}}
        <x-modal.modal titulo="Registrar sistema" direccion="{{ route('sistemas.store') }}" class="hidden" id="crud-modal-s">
            <div class="col-span-2">
                <x-modal.input nombre="name" titulo="Nombre" placeholder="Escriba el nombre del sistema" tipo="text" />
            </div>
            <div class="col-span-2">
                <x-modal.input nombre="description" titulo="Descripción" placeholder="Escriba la descripción"
                    tipo="text" />
            </div>
        </x-modal.modal>

        @isset($systI)
            <x-modal.modal titulo="Editar sistema" direccion="{{ route('sistemas.update', $systI) }}" id="crud-modal-e"
                idb="close-modal-e">
                @method('PUT')
                <div class="col-span-2">
                    <x-modal.input nombre="name" titulo="Nombre" placeholder="Escriba el nombre del sistema" tipo="text"
                        valor="{{ $systI->code }}" />
                </div>
                <div class="col-span-2">
                    <x-modal.input nombre="description" titulo="Descripción" placeholder="Escriba la descripción" tipo="text"
                        valor="{{ $systI->description }}" />
                </div>
            </x-modal.modal>
        @endisset

    </div>
@endsection
