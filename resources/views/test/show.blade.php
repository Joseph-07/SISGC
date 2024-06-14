@extends('master')
@push('scripts')
    <script type="module" src="http://[::1]:5173/resources/js/xd.js"></script>
    <script type="module" src="http://[::1]:5173/resources/css/sistema.css"></script>
@endpush
@php
    // $xs = $_SESSION['route-act'];
@endphp

@section('hidden')
    hidden
@endsection
@section('modal')
    <div class="bg-black bg-opacity-50 flex h-full">

        <div class="p-4 w-full  max-w-7xl mx-auto mt-24">
            <!-- Modal content -->
            <div class="relative bg-slate-200 rounded-lg shadow-3xl dark:bg-gray-100 zoom">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t @if ($errors->any()) border-red-700 @else border-emerald-700 @endif">
                    <h3 class="text-lg font-semibold text-emerald-900 ">
                        Registrar nueva evaluación
                    </h3>
                </div>
                @if ($errors->any())
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-red-700">
                        <ul class="text-sm text-red-600 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div>
                    <form action="{{ route('evaluaciones.store') }}" method="POST" enctype="multipart/form-data"
                        class="p-4">
                        @csrf
                        <div class="grid grid-cols-3 gap-4">

                            <div class="col-span-1">
                                <x-modal.input tipo="text" nombre="name" titulo="Nombre"
                                placeholder="{{ $test->code }}" deshabilitado="disabled" />
                            </div>
                            <div class="col-span-1">
                                <x-modal.input tipo="text" nombre="curso" titulo="Curso"
                                placeholder="{{ $test->course->code }}" deshabilitado="disabled" />
                            </div>
                            <div class="col-span-1">
                                <x-modal.input tipo="text" nombre="personal" titulo="Personal"
                                placeholder="{{ $test->personal->name }} {{ $test->personal->last_name }} #{{ $test->personal->code}}" deshabilitado="disabled" />
                            </div>
                            <div class="col-span-1">
                                <label for="description"
                                    class="block text-sm mb-2 font-semibold text-emerald-900">Descripción</label>
                                <textarea placeholder="Escriba la descripción" name="description" id="description" cols="30" rows="9" disabled
                                    class="resize-none p-2.5 bg-gray-50 border border-gray-300 text-slate-400 hover:border-emerald-800 focus:ring-emerald-800  focus:border-emerald-800 text-sm rounded-lg  block w-full">{{ $test->description }}</textarea>
                            </div>


                            <div class="grid grid-cols-2 gap-4 col-span-2">
                                <div class="col-span-1">
                                    <div class="col-span-1 bottom-0">
                                        <x-modal.input tipo="text" nombre="type_test" titulo="Tipo de evaluación"
                                        placeholder="{{ $test->type_test->name }}" deshabilitado="disabled" />
                                    </div>
                                </div>
                                
                                <div class="col-span-1 row-span-2">
                                    <h3 class="text-lg font-semibold text-emerald-900 mt-8 shadow-slate-900 text-center">
                                        Duración</h1>
                                        <div
                                            class="col-span-1 grid grid-cols-2 border border-emerald-600 rounded-lg mt-2 shadow-lg p-2">
                                            <div class="col-span-1">
                                                <x-modal.input nombre="time_h" titulo="Horas"
                                                    placeholder="{{ date('H', strtotime($test->time)) }}" tipo="number" min="min=0"
                                                    max="max=8" deshabilitado="disabled" />
                                            </div>
                                            <div class="col-span-1">
                                                <x-modal.input nombre="time_m" titulo="Minutos"
                                                    placeholder="{{ date('i', strtotime($test->time)) }}" tipo="number" min="min=0"
                                                    max="max=59" deshabilitado="disabled" />
                                            </div>


                                        </div>

                                </div>

                                <div class="col-span-1">
                                    <x-modal.input tipo="text" nombre="random" titulo="Preguntas aleatorias"
                                    placeholder="{{ $test->random == 1 ? 'Si' : 'No' }}" deshabilitado="disabled" />
                                </div>

                                <div class="col-span-1 ">
                                    <x-modal.input nombre="grade_max" titulo="Nota maxima"
                                        placeholder="{{ $test->grade_max }}" tipo="number" min="1"
                                        deshabilitado="disabled" />
                                </div>

                                <div class="col-span-1 ">
                                    <x-modal.input nombre="grade_min" titulo="Nota maxima"
                                        placeholder="{{ $test->grade_min }}" tipo="number" min="1"
                                        deshabilitado="disabled" />
                                </div>
                            </div>


                            <div class="col-span-3 mt-4 flex mx-auto gap-4">
                                
                                    <button type="submit"
                                        class="text-white flex bg-slate-600 hover:bg-emerald-700 shadow-md font-medium rounded-lg text-sm px-5 py-2.5 text-center my-auto zoomh">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Guardar
                                    </button>
                                <button
                                    class="text-white flex bg-slate-600 hover:bg-emerald-700 shadow-md font-medium rounded-lg text-sm  text-center my-auto zoomh">
                                    <a href="{{ route('evaluaciones.index') }}" class="py-2.5 px-5">
                                        Volver
                                    </a>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Modal body -->
            </div>
        </div>
    </div>
@endsection
