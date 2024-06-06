@extends('master')
@push('scripts')
    <script type="module" src="http://[::1]:5173/resources/js/xd.js"></script>
    <script type="module" src="http://[::1]:5173/resources/js/proc.js"></script>
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

        <div class="p-4 w-full  max-w-5xl mx-auto mt-24">
            <!-- Modal content -->
            <div class="relative bg-slate-200 rounded-lg shadow-3xl dark:bg-gray-100 zoom">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t  border-emerald-700 ">
                    <h3 class="text-lg font-semibold text-emerald-900 ">
                        Ver datos del documento
                    </h3>
                </div>
                <div>
                    <form action="{{ route('documentos.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
                        @csrf
                        <div class="grid grid-cols-3 gap-4">
                            <div class="col-span-1">
                                <x-modal.input nombre="name" titulo="Nombre del documento" placeholder="{{ $document->code }}" tipo="text" deshabilitado="disabled" />
                            </div>
                            <div class="col-span-1">
                                <x-modal.input nombre="personal" titulo="Personal" placeholder="{{ $document->personal->name }} {{ $document->personal->last_name }} #{{ $document->personal->code }}" tipo="text" deshabilitado="disabled" />
                            </div>

                            <div class="col-span-1">
                                <x-modal.input nombre="category" titulo="Categoria" placeholder="{{ $document->category->name }}" tipo="text" deshabilitado="disabled" />                                
                            </div>

                            <div class="col-span-1">
                                <x-modal.input nombre="typeDoc" titulo="Tipo de documento" placeholder="{{ $document->typeDoc->name }}" tipo="text" deshabilitado="disabled" />
                            </div>
                            <div class="col-span-1">
                                <x-modal.input nombre="syst" titulo="Sistema" placeholder="{{ $document->syst->code }}" tipo="text" deshabilitado="disabled" />
                            </div>

                            <div class="col-span-1" id="procesos">
                                <x-modal.input nombre="procesos" titulo="Procesos" placeholder="{{ $document->proc->code }}" tipo="text" deshabilitado="disabled" />
                            </div>

                            <div class="col-span-2">
                                <label for="description"
                                    class="block text-sm mb-2 font-semibold text-emerald-900">Descripción</label>
                                <textarea placeholder="Escriba la descripción" name="description" id="description" cols="30" rows="4" disabled
                                    class="resize-none p-2.5 col-span-2 bg-gray-50 border border-gray-300 text-gray-400 hover:border-emerald-800 focus:ring-emerald-800  focus:border-emerald-800 text-sm rounded-lg  block w-full">{{ $document->description }}</textarea>
                            </div>

                            <div class="col-span-1">
                                <div class="col-span-1 mt-1">
                                    <x-modal.input nombre="clas" titulo="Clase" placeholder="{{ $document->clas->code }}" tipo="text" deshabilitado="disabled" />
                                </div>

                                <div class="grid-cols-1 mt-1">
                                    <x-modal.input nombre="spec" titulo="Especialidad" placeholder="{{ $document->spec->code }}" tipo="text" deshabilitado="disabled" />
                                </div>


                            </div>

                            <div class="col-span-3 mt-4 flex mx-auto gap-4">
                                <button
                                    class="text-white flex bg-slate-600 hover:bg-emerald-700 shadow-md font-medium rounded-lg text-sm  text-center my-auto zoomh">
                                    <a href="{{ route('documentos.index') }}" class="py-2.5 px-5">
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
