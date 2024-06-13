@extends('master')
@push('scripts')
    <script type="module" src="http://[::1]:5173/resources/js/xd.js"></script>
    <script type="module" src="http://[::1]:5173/resources/js/tab.js"></script>
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
        <script>
            var selec = {{ Js::from($selecQ) }};
        </script>

        <div class="p-4 w-full  max-w-7xl mx-auto mt-24">
            <!-- Modal content -->
            <div class="relative bg-slate-200 rounded-lg shadow-3xl dark:bg-gray-100 zoom">
                <!-- Modal header -->
                <div
                    class="flex items-center   border-b rounded-t @if ($errors->any()) border-red-700 @else border-emerald-700 @endif">
                    <h3 class="text-lg font-semibold p-5 text-emerald-900 bg-slate-200 rounded-tl-lg" id="tag-1">
                        Editar pregunta
                    </h3>
                    <h3 class="text-lg font-semibold p-5  text-emerald-900 " id="tag-2">
                        Respuestas
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
                <div id="tab-1" class="hidden">
                    <form action="{{ route('preguntas.update', $question->id) }}" method="POST" enctype="multipart/form-data"
                        class="p-4">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-3 gap-4">

                            <div class="col-span-1">
                                <x-modal.input tipo="text" nombre="name" titulo="Evaluación"
                                    placeholder="{{ $test->code }}" deshabilitado="disabled" />
                            </div>

                            <div class="col-span-2">
                                <label for="enunce"
                                    class="block text-sm mb-2 font-semibold text-emerald-900">Enunciado</label>
                                <textarea name="enunce" id="enunce" cols="30" rows="1"
                                    class="resize-none bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-900 focus:ring-emerald-800  focus:border-emerald-800 text-sm rounded-lg  block w-full p-2.5">@if (old('enunce') != null){{ old('enunce') }}@else{{ $question->enunce }}@endif</textarea>
                            </div>



                            <div class="col-span-1">
                                @if (count($typeQuests) > 0)
                                    <x-modal.select nombre="id_type_question" titulo="Tipo de pregunta">
                                        @foreach ($typeQuests as $typeQuest)
                                            @if (old('id_type_question') != null)
                                                @if ($typeQuest->id == old('id_type_question'))
                                                    <option value="{{ $typeQuest->id }}" selected>{{ $typeQuest->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $typeQuest->id }}">{{ $typeQuest->name }}</option>
                                                @endif
                                            @else
                                                @if ($typeQuest->id == $question->id_type_question)
                                                    <option value="{{ $typeQuest->id }}" selected>{{ $typeQuest->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $typeQuest->id }}">{{ $typeQuest->name }}</option>
                                                @endif
                                            @endif
                                        @endforeach
                                    </x-modal.select>
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
                                        <label for="require_jus"
                                            class="block mb-2 text-sm font-semibold text-emerald-900">Requiere
                                            justificación</label>
                                        @if (old('require_jus') != null)
                                            <input type="checkbox" name="require_jus" id="require_jus"
                                                class=" focus:ring-0 rounded-full checked:bg-emerald-800 checkbox:bg-emerald-800 appearance-none text-emerald-900 focus:text-emerald-800 checked:text-emerald-900"
                                                checked>
                                        @else
                                            @if ($question->require_jus == 1)
                                                <input type="checkbox" name="require_jus" id="require_jus"
                                                    class=" focus:ring-0 rounded-full checked:bg-emerald-800 checkbox:bg-emerald-800 appearance-none text-emerald-900 focus:text-emerald-800 checked:text-emerald-900"
                                                    checked>
                                            @else
                                                <input type="checkbox" name="require_jus" id="require_jus"
                                                    class=" focus:ring-0 rounded-full checked:bg-emerald-800 checkbox:bg-emerald-800 appearance-none text-emerald-900 focus:text-emerald-800 checked:text-emerald-900">
                                            @endif
                                        @endif
                                        <input type="checkbox" name="require_jus" id="require_jus"
                                            class=" focus:ring-0 rounded-full checked:bg-emerald-800 checkbox:bg-emerald-800 appearance-none text-emerald-900 focus:text-emerald-800 checked:text-emerald-900">
                                    </div>
                                @endif

                                @if ($test->id_type_test == 1)
                                    <div class="col-span-1">
                                        <x-modal.select nombre="group" titulo="Grupo">
                                            @if (old('group') != null)
                                                @if (old('group') == 'Visual')
                                                    <option value="Visual" selected>Visual</option>
                                                    <option value="Auditivo">Auditivo</option>
                                                    <option value="Kinestesico">Kinestesico</option>
                                                @elseif (old('group') == 'Auditivo')
                                                <option value="Visual">Visual</option>
                                                <option value="Auditivo" selected>Auditivo</option>
                                                    <option value="Kinestesico">Kinestesico</option>
                                                @elseif (old('group') == 'Kinestesico')
                                                    <option value="Visual">Visual</option>
                                                    <option value="Auditivo">Auditivo</option>
                                                    <option value="Kinestesico" selected>Kinestesico</option>
                                                    
                                                @endif

                                            @else
                                            
                                                @if ($question->group == 'Visual')
                                                    <option value="Visual" selected>Visual</option>
                                                    <option value="Auditivo">Auditivo</option>
                                                    <option value="Kinestesico">Kinestesico</option>
                                                @elseif ($question->group == 'Auditivo')
                                                    <option value="Visual">Visual</option>
                                                    <option value="Auditivo" selected>Auditivo</option>
                                                    <option value="Kinestesico">Kinestesico</option>
                                                @elseif ($question->group == 'Kinestesico')
                                                    <option value="Visual">Visual</option>
                                                    <option value="Auditivo">Auditivo</option>
                                                    <option value="Kinestesico" selected>Kinestesico</option>
                                                @endif
                                                
                                            @endif
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
                <div id="tab-2" class="hidden">
                    <div class="container max-w-3xl mx-auto mt-6 min-h-40">
                        <div class=" rounded-md bg-white shadow-xl">
                            <div class=" bg-slate-200 w-full flex border-b-2 border-emerald-800 rounded-t-md shadow-3xl">
                                <span class="mx-auto text-md font-semibold text-gray-900 py-1">Lista de respuestas</span>
                            </div>
                            <div
                                class="bg-emerald-700 border-b-2 border-emerald-800 grid grid-cols-3 text-white font-semibold ">
                                <span class="text-center my-auto">Enunciado</span>
                                <span class="text-center my-auto">¿Es correcta?</span>
                                <span class="text-center my-auto">Acciones</span>
                            </div>
                            @if (count($answers) > 0)
                                @foreach ($answers as $answer)
                                    <div class="bg-slate-100 border-b-2 border-emerald-700 grid grid-cols-3 py-4">
                                        <span class="text-center my-auto">{{ $answer->enunce }}</span>
                                        <span class="text-center my-auto">@if ($answer->right  == 1)
                                                <i class="fas fa-check text-emerald-600"></i>
                                        @else
                                                <i class="fas fa-times text-red-600"></i>
                                        @endif</span>
                                        <div class=" mx-auto flex">
                                            <div class="zoomh">
                                                <span class="mr-1">
                                                    <button
                                                        class="p-2 px-0 bg-slate-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded-xl ">

                                                        <a href="{{ route('respuestas.edit', $answer) }}"
                                                            class="p-2 ">
                                                            Editar
                                                        </a>
                                                    </button>
                                                </span>
                                            </div>
                                            <div class="zoomh">
                                                <span class="ml-1">
                                                    <button id="btn-delete-{{ $answer->id }}"
                                                        class="p-2 bg-slate-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded-xl">
                                                        Eliminar
                                                    </button>
                                                </span>
                                            </div>

                                            <x-confirm id="crud-modal-{{ $answer->id }}"
                                                idb="close-modal-{{ $answer->id }}" idc="btn-delete-{{ $answer->id }}"
                                                direccion="{{ route('respuestas.destroy', $answer->id) }}" />
                                        </div>

                                    </div>
                                @endforeach
                            @endif
                            @if (count($answers) == 0)
                                <div class="bg-slate-100 border-b-2 border-emerald-700  py-4">
                                    <div class="text-center">
                                        <span>No hay respuestas para esta pregunta.</span>
                                    </div>
                                </div>
                            @endif
                            <div class="bg-white rounded-b-md h-5">

                            </div>
                        </div>
                        <div class="flex mt-2">
                            <a href="{{ route('respuestas.create', $question->id) }}"
                                class="ml-auto mr-1 flex mt-2 zoomh bg-slate-600 hover:bg-emerald-700 text-white text-xs font-semibold p-2 rounded shadow-md ">Agregar</a>
                            <a href="{{ route('evaluaciones.edit', [$test->id, $selec]) }}"
                                class="mr-auto ml-1 flex mt-2 bg-slate-600 hover:bg-emerald-700 zoomh text-white text-xs font-semibold p-2 rounded shadow-md ">Volver</a>
                        </div>
                        <div class="h-5" id="container"></div>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
