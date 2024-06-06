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
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t @if ($errors->any()) border-red-700 @else border-emerald-700 @endif">
                    <h3 class="text-lg font-semibold text-emerald-900 ">
                        Editar documento
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
                    <form action="{{ route('documentos.courseUpdate', [$course->id, $document->id]) }}" method="POST" enctype="multipart/form-data"
                        class="p-4">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-1">
                                <div class="col-span-1">
                                    <x-modal.input nombre="name" titulo="Nombre" placeholder="{{ $course->code }}"
                                        tipo="text" deshabilitado="disabled" />
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="col-span-1">
                                    <x-modal.input nombre="id_document" titulo="Documento"
                                        placeholder="{{ $document->code }}" tipo="text" deshabilitado="disabled" />
                                </div>
                            </div>
                            <div class="col-span-2">
                                <x-modal.select nombre="active" titulo="Estatus">
                                    @if ($document->pivot->active == 1)
                                        <option selected value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    @else
                                        <option value="1">Activo</option>
                                        <option selected value="0">Inactivo</option>
                                    @endif
                                </x-modal.select>
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
                                    <a href="{{ route('documentos.course', $course->id) }}" class="py-2.5 px-5">
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
