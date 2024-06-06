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
            SISGC » Cursos » Administrar Cursos
        </div>
        <h1 class="text-3xl mb-6 text-center font-bold mt-4">Administrar Cursos</h1>

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
            <a href="{{ route('cursos.create') }}"
                class="ml-auto mr-1 flex mt-2 zoomh bg-slate-600 hover:bg-emerald-700 text-white text-xs font-semibold p-2 rounded shadow-md ">Nuevo</a>
            <a href="{{ route('inicio') }}"
                class="mr-auto ml-1 flex mt-2 bg-slate-600 hover:bg-emerald-700 zoomh text-white text-xs font-semibold p-2 rounded shadow-md ">Regresar</a>
        </div>

        <div class="container max-w-5xl mx-auto mt-6 ">
            <div class="mb-2">
                {{ $courses->links() }}
            </div>

            <div class=" rounded-md bg-white shadow-xl">
                <div class=" bg-slate-200 w-full flex border-b-2 border-emerald-800 rounded-t-md shadow-3xl">
                    <span class="mx-auto text-md font-semibold text-gray-900 py-1">Lista de cursos</span>
                </div>
                @isset($courses)
                    <div class="bg-emerald-700 border-b-2 border-emerald-800 grid grid-cols-5 text-white font-semibold">
                        <span class="text-center ">Nombre</span>
                        <span class="text-center ">Descripción</span>
                        <span class="text-center">Facilitador</span>
                        <span class="text-center">Acciones</span>
                        <span class="text-center">Admin</span>
                    </div>
                    @foreach ($courses as $course)
                        <div class="bg-slate-100 border-b-2 border-emerald-700 grid grid-cols-5 gap-1 py-4">
                            <div class="text-center my-auto">
                                <span>{{ $course->code }}</span>
                            </div>
                            <div class="text-center my-auto">
                                <span>{{ mb_substr($course->description, 0, 100, 'UTF-8') }}@if (mb_strlen($course->description) > 100)
                                        ...
                                    @endif
                                </span>
                            </div>
                            <div class="text-center my-auto">
                                <span>{{ $course->personal->name }} {{ $course->personal->last_name }} </span>
                            </div>
                            <div class="mx-auto my-auto">
                                <div class="flex">
                                    <div class="zoomh">
                                        <span class="mr-1">
                                            <button
                                                class="p-2 px-0 bg-slate-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded-xl ">

                                                <a href="{{ route('cursos.show', $course) }}" class="p-2 ">
                                                    Examinar
                                                </a>
                                            </button>
                                        </span>
                                    </div>
                                    <div class="zoomh">
                                        <span class="ml-1">
                                            <button
                                                class="p-2 px-0 bg-slate-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded-xl ">

                                                <a href="{{ route('cursos.personals', $course->id) }}" class="p-2 ">
                                                    Ver Participantes
                                                </a>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="zoomh">
                                        <span class="">
                                            <button
                                                class="p-2 px-0 bg-slate-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded-xl mt-2">

                                                <a href="{{ route('documentos.course', $course) }}" class="p-2 ">
                                                    Documentos
                                                </a>
                                            </button>
                                        </span>
                                    </div>
                                    <div class="ml-9">

                                    </div>
                                    <div class="zoomh">
                                        <span class="">
                                            <button
                                                class="p-2 px-0 bg-slate-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded-xl mt-2">

                                                <a href="{{ route('cursos.reviews', $course) }}" class="p-2 ">
                                                    Reseñas
                                                </a>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class=" mx-auto flex my-auto">

                                <div class="zoomh">
                                    <span class="mr-1">
                                        <button
                                            class="p-2 px-0 bg-slate-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded-xl ">

                                            <a href="{{ route('cursos.edit', $course) }}" class="p-2 ">
                                                Editar
                                            </a>
                                        </button>
                                    </span>
                                </div>

                                <div class="zoomh">
                                    <span class="ml-1">
                                        <button id="btn-delete-{{ $course->id }}"
                                            class="p-2 bg-slate-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded-xl">
                                            Eliminar
                                        </button>
                                    </span>
                                </div>

                                <x-confirm id="crud-modal-{{ $course->id }}" idb="close-modal-{{ $course->id }}"
                                    direccion="{{ route('cursos.destroy', $course) }}" />
                            </div>
                        </div>
                    @endforeach
                @endisset
                @if (count($courses) == 0)
                    <div class="bg-slate-100 border-b-2 border-emerald-700  py-4">
                        <div class="text-center">
                            <span>No hay cursos</span>
                        </div>
                    </div>
                @endif
                <div class="bg-white rounded-b-md h-5">

                </div>
            </div>
            <div class="mt-2">
                {{ $courses->links() }}
            </div>



        </div>



    </div>
@endsection
