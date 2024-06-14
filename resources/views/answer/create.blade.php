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
                        Registrar nueva respuesta
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
                    <form action="{{ route('respuestas.store', $question) }}" method="POST" enctype="multipart/form-data"
                        class="p-4">
                        @csrf
                        <div class="grid grid-cols-4 gap-4">
                    
                            <div class="col-span-2">
                                <x-modal.input tipo="text" nombre="name" titulo="Pregunta"
                                    placeholder="{{ $question->enunce }}" deshabilitado="disabled" />
                            </div>

                            <div class="col-span-2">
                                <label for="enunce"
                                    class="block text-sm mb-2 font-semibold text-emerald-900">Enunciado</label>
                                <textarea name="enunce" id="enunce" cols="30" rows="1" placeholder="Inserte el enunciado"
                                    class="resize-none bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-900 focus:ring-emerald-800  focus:border-emerald-800 text-sm rounded-lg  block w-full p-2.5">{{ old('enunce') }}</textarea>
                            </div>
                            
                            @if ($question->type_quest->name != 'Linea de aprendizaje')
                                <div class="col-span-1 col-start-2">
                                    <x-modal.input type="number" nombre="value" titulo="Valor" placeholder="Escriba el valor de la respuesta" valor="{{ old('value') }}"/>
                                </div>
                            
                                <div class="col-span-1">
                                    <label for="right" class="block mb-2 text-sm font-semibold text-emerald-900">¿Es correcta?</label>
                                    @if (old('right') == 'on')
                                        
                                        <input type="checkbox" name="right" id="right"
                                            class=" focus:ring-0 rounded-full checked:bg-emerald-800 checkbox:bg-emerald-800 appearance-none text-emerald-900 focus:text-emerald-800 checked:text-emerald-900"
                                            checked>

                                    @else
                                        
                                        <input type="checkbox" name="right" id="right"
                                        class=" focus:ring-0 rounded-full checked:bg-emerald-800 checkbox:bg-emerald-800 appearance-none text-emerald-900 focus:text-emerald-800 checked:text-emerald-900">

                                    @endif
                                    
                                </div>
                            @endif
                            <div class="col-span-4 mt-4 flex mx-auto gap-4">
                            
                                @if (true)
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
                                @endif
                                <button
                                    class="text-white flex bg-slate-600 hover:bg-emerald-700 shadow-md font-medium rounded-lg text-sm  text-center my-auto zoomh">
                                    <a href="{{ route('preguntas.edit', [$question->id, $selec]) }}" class="py-2.5 px-5">
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
