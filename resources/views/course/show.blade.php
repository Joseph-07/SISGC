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

        <div class="p-4 w-full  max-w-xl mx-auto mt-24">
            <!-- Modal content -->
            <div class="relative bg-slate-200 rounded-lg shadow-3xl dark:bg-gray-100 zoom">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-emerald-700">
                    <h3 class="text-lg font-semibold text-emerald-900 ">
                        Ver curso
                    </h3>
                </div>
                <div class="p-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-1">
                            <x-modal.input nombre="name" titulo="Nombre del curso" placeholder="{{ $course->code }}"
                                tipo="text" deshabilitado="disabled" />
                        </div>
                        <div class="col-span-1">
                            <x-modal.input nombre="" titulo="Facilitador" placeholder="{{ $course->personal->name }} {{ $course->personal->last_name }} #{{ $course->personal->code }}"
                                tipo="text" deshabilitado="disabled" />

                        </div>
                        <div class="col-span-1">
                            <x-modal.input nombre="name" titulo="Sistema" placeholder="{{ $course->syst->code }}"
                                tipo="text" deshabilitado="disabled" />
                        </div>
                        <div class="col-span-1">
                            <x-modal.input nombre="" titulo="Proceso" placeholder="{{ $course->proc->code }}"
                                tipo="text" deshabilitado="disabled" />

                        </div>
                        <div class="col-span-1">
                            <x-modal.input nombre="name" titulo="Especialidad" placeholder="{{ $course->spec->code }}"
                                tipo="text" deshabilitado="disabled" />
                        </div>
                        <div class="col-span-1">
                            <x-modal.input nombre="" titulo="Clase" placeholder="{{ $course->clas->code }}"
                                tipo="text" deshabilitado="disabled" />

                        </div>
                        <div class="col-span-2 mt-2">
                            <label for="description"
                                class="block text-sm mb-2 font-semibold text-emerald-900">Descripción</label>
                            <textarea placeholder="Escriba la descripción" name="description" id="description" cols="30" rows="10" 
                                class="resize-none p-2.5 col-span-2 bg-gray-50 border border-gray-300 text-gray-400 hover:border-emerald-800 focus:ring-emerald-800  focus:border-emerald-800 text-sm rounded-lg  block w-full" disabled>{{ $course->description }}</textarea>
                        </div>
                        <div class="col-span-2 mt-4 flex mx-auto gap-4">
                            <button
                                class="text-white flex bg-slate-600 hover:bg-emerald-700 shadow-md font-medium rounded-lg text-sm  text-center my-auto">
                                <a href="{{ route('cursos.index') }}" class="py-2.5 px-5">
                                    Volver
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Modal body -->
            </div>
        </div>



    </div>
@endsection
