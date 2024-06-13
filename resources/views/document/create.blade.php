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
                        Registrar nuevo documento
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
                    <form action="{{ route('documentos.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
                        @csrf
                        <div class="grid grid-cols-3 gap-4">
                            <div class="col-span-1">
                                <x-modal.input nombre="name" titulo="Nombre" placeholder="Escriba el nombre" tipo="text"
                                    valor="{{ old('name') }}" />
                            </div>
                            <div class="col-span-1">
                                @if (count($personals) > 0)
                                    <x-modal.select nombre="id_personal" titulo="Personal">
                                        @foreach ($personals as $personal)
                                            @if ($personal->id == old('id_personal'))
                                                <option selected value="{{ $personal->id }}">{{ $personal->name }}
                                                    {{ $personal->last_name }} #{{ $personal->code }}</option>
                                            @else
                                                <option value="{{ $personal->id }}">{{ $personal->name }}
                                                    {{ $personal->last_name }} #{{ $personal->code }}</option>
                                            @endif
                                        @endforeach
                                    </x-modal.select>
                                @else
                                    <label for="id_personal"
                                        class="block mb-2 text-sm font-semibold text-emerald-900">Personal</label>
                                    <span
                                        class="text-sm font-semibold text-red-800 text-center rounded border block p-2 border-red-800">¡Primero
                                        debe agregar un personal!</span>
                                @endif
                            </div>

                            <div class="col-span-1">
                                @if (count($categories) > 0)
                                    <x-modal.select nombre="id_category" titulo="Categoría">
                                        @foreach ($categories as $category)
                                            @if ($category->id == old('id_category'))
                                                <option selected value="{{ $category->id }}">{{ $category->name }}
                                                </option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </x-modal.select>
                                @else
                                    <label for="id_personal" class="block mb-2.5 text-sm font-semibold text-emerald-900">Categoría</label>
                                    <span
                                        class="text-sm font-semibold text-red-800 text-center rounded border block p-2 border-red-800">¡Primero
                                        debe agregar una categoría!</span>
                                @endif
                            </div>

                            <div class="col-span-1">
                                @if (count($typeDocs) > 0)
                                    <x-modal.select nombre="id_type_doc" titulo="Tipo de documento">
                                        @foreach ($typeDocs as $typeDoc)
                                            @if (old('id_type_doc') == $typeDoc->id)
                                                <option value="{{ $typeDoc->id }}" selected>{{ $typeDoc->name }}
                                                </option>
                                            @else
                                                <option value="{{ $typeDoc->id }}">{{ $typeDoc->name }}</option>
                                            @endif
                                        @endforeach
                                    </x-modal.select>
                                @else
                                    <label for="id_personal" class="block mb-2 text-sm font-semibold text-emerald-900">Tipo
                                        de documento</label>
                                    <span
                                        class="text-sm font-semibold text-red-800 text-center rounded border block p-2 border-red-800">¡Primero
                                        debe agregar un tipo de documento!</span>
                                @endif
                            </div>
                            <div class="col-span-1">
                                @if (count($systs) > 0)
                                    <x-modal.select nombre="id_system" titulo="Sistema">
                                        @foreach ($systs as $syst)
                                            @if (old('id_system') == $syst->id)
                                                <option value="{{ $syst->id }}" selected>{{ $syst->code }}</option>
                                            @else
                                                <option value="{{ $syst->id }}">{{ $syst->code }}</option>
                                            @endif
                                            @php
                                                $valor[] = $syst->procs->pluck('id', 'code');
                                                $document = null;
                                            @endphp
                                        @endforeach
                                    </x-modal.select>
                                @else
                                    <label for="id_personal"
                                        class="block mb-2 text-sm font-semibold text-emerald-900">Sistema</label>
                                    <span
                                        class="text-sm font-semibold text-red-800 text-center rounded border block p-2 border-red-800">¡Primero
                                        debe agregar un sistema!</span>
                                @endif
                            </div>
                            @php
                                $proc = [
                                    'select' => $valor,
                                    'ele' => $document != null ? $document : null,
                                    'proc' => old('id_proc') != null ? old('id_proc') : null,
                                ];
                                // dd($proc);
                            @endphp

                            <script>
                                var proc = {{ Js::from($proc) }};
                            </script>

                            <div class="col-span-1" id="procesos">
                            </div>

                            <div class="col-span-2">
                                <label for="description"
                                    class="block text-sm mb-2 font-semibold text-emerald-900">Descripción</label>
                                <textarea placeholder="Escriba la descripción" name="description" id="description" cols="30" rows="7"
                                    class="resize-none p-2.5 col-span-2 bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-800 focus:ring-emerald-800  focus:border-emerald-800 text-sm rounded-lg  block w-full">{{ old('description') }}</textarea>
                            </div>

                            <div class="col-span-1">
                                <div class="col-span-1 mt-1">
                                    @if (count($classes) > 0)
                                        <x-modal.select nombre="id_clas" titulo="Clase">
                                            @foreach ($classes as $clas)
                                                @if (old('id_clas') == $clas->id)
                                                    <option value="{{ $clas->id }}" selected>{{ $clas->code }}
                                                    </option>
                                                @else
                                                    <option value="{{ $clas->id }}">{{ $clas->code }}</option>
                                                @endif
                                            @endforeach
                                        </x-modal.select>
                                    @else
                                        <label for="id_personal"
                                            class="block mb-2 text-sm font-semibold text-emerald-900">Clase</label>
                                        <span
                                            class="text-sm font-semibold text-red-800 text-center rounded border block p-2 border-red-800">¡Primero
                                            debe agregar una clase!</span>
                                    @endif
                                </div>

                                <div class="grid-cols-1 mt-1">
                                    @if (count($specs) > 0)
                                        <x-modal.select nombre="id_spec" titulo="Especialidad">
                                            @foreach ($specs as $spec)
                                                @if (old('id_spec') == $spec->id)
                                                    <option value="{{ $spec->id }}" selected>{{ $spec->code }}
                                                    </option>
                                                @else
                                                    <option value="{{ $spec->id }}">{{ $spec->code }}</option>
                                                @endif
                                            @endforeach
                                        </x-modal.select>
                                    @else
                                        <label for="id_personal"
                                            class="block mb-2 text-sm font-semibold text-emerald-900">Especialidad</label>
                                        <span
                                            class="text-sm font-semibold text-red-800 text-center rounded border block p-2 border-red-800">¡Primero
                                            debe agregar una especialidad!</span>
                                    @endif
                                </div>

                                <div class="grid-cols-1 mt-1">
                                    <label for="doc"
                                        class="block mb-2 text-sm font-semibold text-emerald-900">Documento</label>
                                    <div class="flex">
                                        <input type="file" name="url_document" id="url_document"
                                            class="text-gray-500 hidden" value="{{ old('url_document') }}}">
                                        <label for="url_document"
                                            class="text-white bg-slate-600 hover:bg-emerald-700 shadow-md font-semibold rounded-lg text-sm p-2 mx-auto zoomh">Seleccionar
                                            documento</label>
                                    </div>

                                </div>

                            </div>

                            <div class="col-span-3 mt-4 flex mx-auto gap-4">
                                @if (count($systs) >= 1 && count($specs) >= 1 && count($classes) >= 1 && count($typeDocs) >= 1 && count($personals) >= 1)
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
