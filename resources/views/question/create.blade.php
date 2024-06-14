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

        <div class="p-4 w-full  max-w-3xl mx-auto mt-24">
            <!-- Modal content -->
            <div class="relative bg-slate-200 rounded-lg shadow-3xl dark:bg-gray-100 zoom">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t @if ($errors->any()) border-red-700 @else border-emerald-700 @endif">
                    <h3 class="text-lg font-semibold text-emerald-900 ">
                        Registrar nueva pregunta
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
                    <form action="{{ route('preguntas.store', $test) }}" method="POST" enctype="multipart/form-data" class="p-4">
                        @csrf
                        <div class="grid grid-cols-3 gap-4">

                            <div class="col-span-1">
                                <x-modal.input tipo="text" nombre="name" titulo="Evaluación"
                                    placeholder="{{ $test->code }}" deshabilitado="disabled" />
                            </div>
                            
                            <div class="col-span-2">
                                <label for="enunce"
                                    class="block text-sm mb-2 font-semibold text-emerald-900">Enunciado</label>
                                <textarea name="enunce" id="enunce" cols="30" rows="1"
                                    class="resize-none bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-900 focus:ring-emerald-800  focus:border-emerald-800 text-sm rounded-lg  block w-full p-2.5">{{ old('enunce')}}</textarea>
                            </div>

                            

                            <div class="col-span-1">
                                @if (count($typeQuests) > 0)
                                    @if ($test->id_type_test == 1)
                                        <x-modal.input tipo="text" nombre="id_type_questions" titulo="Tipo de pregunta" placeholder="{{ $typeQuests[0]->name }}" deshabilitado="disabled"/>
                                        <div class="hidden">
                                            <x-modal.input tipo="text" nombre="id_type_question" titulo="Tipo de pregunta" placeholder="{{ $typeQuests[0]->name }}" valor="{{ $typeQuests[0]->id }}" />
                                        </div>
                                    @else
                                        <x-modal.select nombre="id_type_question" titulo="Tipo de pregunta">
                                            @foreach ($typeQuests as $typeQuest)
                                                @if ($typeQuest->id == old('id_type_question'))
                                                    <option value="{{ $typeQuest->id }}" selected>{{ $typeQuest->name }}
                                                    </option>
                                                @else
                                                    @if ($typeQuest->id != 1)
                                                        <option value="{{ $typeQuest->id }}">{{ $typeQuest->name }}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </x-modal.select>
                                    @endif
                                    
                                @else
                                    <label for="id_type_quest"
                                        class="block mb-2 text-sm font-semibold text-emerald-900">Tipo de pregunta</label>
                                    <span
                                        class="text-sm font-semibold text-red-800 text-center rounded border block p-2 border-red-800">¡Primero
                                        debe agregar un tipo de pregunta!</span>
                                @endif
                            </div>

                            <div class="col-span-1">

                                @if ($test->id_type_test != 1)
                                    <div class="col-span1">
                                        <label for="require_jus" class="block mb-2 text-sm font-semibold text-emerald-900">Requiere
                                            justificación</label>
                                        <input type="checkbox" name="require_jus" id="require_jus"
                                            class=" focus:ring-0 rounded-full checked:bg-emerald-800 checkbox:bg-emerald-800 appearance-none text-emerald-900 focus:text-emerald-800 checked:text-emerald-900">
                                    </div>
                                @endif

                                @if($test->id_type_test == 1)
                                    <div class="col-span-1">
                                        <x-modal.select nombre="group" titulo="Grupo">
                                            <option value="Visual">Visual</option>
                                            <option value="Auditivo">Auditivo</option>
                                            <option value="Kinestésico">Kinestésico</option>
                                        </x-modal.select>
                                    </div>
                                @endif
                                
                            </div>

                            <div class="col-span-1">
                                <label for="doc"
                                    class="block mb-2 text-sm font-semibold text-emerald-900">Imagen</label>
                                <div class="flex">
                                    <input type="file" name="url_image" id="url_image" class="text-gray-500 hidden"
                                        value="{{ old('url_document') }}}">
                                    <label for="url_image"
                                        class="text-white bg-slate-600 hover:bg-emerald-700 shadow-md font-semibold rounded-lg text-sm p-2 mx-auto zoomh">Seleccionar
                                        documento</label>
                                </div>
                            </div>


                            <div class="col-span-3 mt-4 flex mx-auto gap-4">
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
                                    <a href="{{ route('evaluaciones.edit', [$test->id, $selec]) }}" class="py-2.5 px-5">
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
