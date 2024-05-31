@extends('master')
@push('scripts')
    <script type="module" src="http://[::1]:5173/resources/js/xd.js"></script>
    <script type="module" src="http://[::1]:5173/resources/css/sistema.css"></script>
@endpush
@php
    // $xs = $_SESSION['route-act'];
@endphp
@section('content')
    <div class="zoom" id="container">
        <div class="w-full bg-emerald-700 rounded-lg shadow-md text-white px-2 font-semibold text-sm">
            SISGC » Procesos » Administrar Procesos
        </div>
        <h1 class="text-3xl mb-6 text-center font-bold mt-4">Administrar Procesos</h1>

        <div class="  max-w-xl mx-auto shadow-2xl  rounded-lg ring-rounded z-10 " id="searchButton">
            <div class=" bg-slate-600 rounded-lg hover:bg-emerald-700 zoomh" id="searchBar">
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
                        class="mx-auto mt-2 zoomh bg-slate-600 hover:bg-emerald-700 text-white text-xs font-semibold p-2 rounded shadow-sm z-10">Buscar</button>
                </form>
            </div>
        </div>

        <div class="flex mt-2">
            <a href="{{ route('procesos.create') }}" class="ml-auto mr-1 flex mt-2 zoomh bg-slate-600 hover:bg-emerald-700 text-white text-xs font-semibold p-2 rounded shadow-md ">Nuevo</a>
            <a href="{{ route('inicio') }}"
                class="mr-auto ml-1 flex mt-2 bg-slate-600 hover:bg-emerald-700 zoomh text-white text-xs font-semibold p-2 rounded shadow-md ">Regresar</a>
        </div>

        <div class="container max-w-2xl mx-auto mt-6 ">
            {{ $procs->links() }}

            <div class=" rounded-md bg-white shadow-xl">
                <div class=" bg-slate-200 w-full flex border-b-2 border-emerald-800 rounded-t-md shadow-3xl">
                    <span class="mx-auto text-md font-semibold text-gray-900 py-1">Lista de procesos</span>
                </div>
                @isset($procs)
                    <div class="bg-emerald-700 border-b-2 border-emerald-800 grid grid-cols-4 text-white   ">
                        <span class="text-center ">Nombre</span>
                        <span class="text-center ">Descripción</span>
                        <span class="text-center ">Sistema</span>
                        <span class="text-center">Acciones</span>
                    </div>
                    @foreach ($procs as $proc)
                        <div class="bg-slate-100 border-b-2 border-emerald-700 grid grid-cols-4 py-4">
                            <div class="hidden">
                                <span>{{ $proc->id }}</span>
                            </div>
                            <div class="text-center">
                                <span>{{ $proc->code }}</span>
                            </div>
                            <div class="text-center">
                                <span>{{ $proc->description }}</span>
                            </div>
                            <div class="text-center">
                                <span>{{ $proc->code }}</span>
                            </div>
                            <div class=" mx-auto flex">
                                <div class="zoomh">
                                    <span class="mr-1">
                                        <button
                                            class="p-2 bg-slate-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded-xl ">

                                            <a href="{{ route('procesos.edit', $proc) }}" class="p-2 px-0">
                                                Editar
                                            </a>
                                        </button>
                                    </span>
                                </div>
                                <div class="zoomh">
                                    <span class="ml-1">
                                        <button id="btn-delete-{{ $proc->id }}"
                                            class="p-2 bg-slate-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded-xl">
                                            Eliminar
                                        </button>
                                    </span>
                                </div>

                                <x-confirm id="crud-modal-{{ $proc->id }}" idb="close-modal-{{ $proc->id }}"
                                    direccion="{{ route('procesos.destroy', $proc) }}" />
                            </div>
                        </div>
                    @endforeach
                @endisset
                @if (count($procs) == 0)
                    <div class="bg-slate-100 border-b-2 border-emerald-700  py-4">
                        <div class="text-center">
                            <span>No hay procesos</span>
                        </div>
                    </div>
                @endif
                <div class="bg-white rounded-b-md h-5">

                </div>
            </div>
            <div id="xs">

            </div>
            {{ $procs->links() }}


        </div>


        <x-modal.modal titulo="Registrar usuario" direccion="{{ route('procesos.store') }}" class="hidden"
            id="crud-modal-s" idb="close-modal-s">
            <div class="col-span-1">
                <x-modal.input nombre="name" titulo="Nombre" placeholder="Escriba el nombre" tipo="text" />
            </div>
            <div class="col-span-1">
                <x-modal.select nombre="role" titulo="Rol">
                    <option value="admin">Administrador</option>
                    <option value="fac">Facilitador</option>
                    <option value="par" selected>Participante</option>
                </x-modal.select>
            </div>
            <div class="col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-900">Descripción</label>
                <textarea placeholder="Escriba la descripción" name="description" id="description" cols="30" rows="10"
                    class="resize-none p-2.5  bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-900 focus:ring-emerald-900  focus:border-emerald-900 text-sm rounded-lg  block w-full"></textarea>

            </div>
        </x-modal.modal>

        

    </div>
@endsection
