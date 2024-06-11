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
                                @if (old('name') != null)
                                    <x-modal.input tipo="text" nombre="name" titulo="Nombre"
                                        placeholder="Escriba el nombre" valor="{{ old('name') }}" />
                                @else
                                <x-modal.input tipo="text" nombre="name" titulo="Nombre"
                                placeholder="Escriba el nombre" />
                                @endif
                                
                            </div>
                            <div class="col-span-1">
                                @if (count($courses) > 0)
                                    <x-modal.select nombre="id_course" titulo="Curso">
                                        @foreach ($courses as $course)
                                            @if ($course->id == old('id_course'))
                                                <option value="{{ $course->id }}" selected>{{ $course->code }}</option>
                                            @else
                                                <option value="{{ $course->id }}">{{ $course->code }}</option>
                                            @endif
                                        @endforeach
                                    </x-modal.select>
                                @else
                                    <label for="id_personal" class="block mb-2 text-sm font-semibold text-emerald-900">Curso</label>
                                    <span
                                        class="text-sm font-semibold text-red-800 text-center rounded border block p-2 border-red-800">¡Primero
                                        debe agregar algún curso!</span>
                                @endif
                            </div>
                            <div class="col-span-1">
                                @if (count($personals) > 0)
                                    <x-modal.select nombre="id_personal" titulo="Facilitador">
                                        @foreach ($personals as $personal)
                                            @if ($personal->id == old('id_personal'))
                                                <option value="{{ $personal->id }}" selected>{{ $personal->name }} {{ $personal->last_name }} #{{ $personal->code}}
                                                </option>
                                            @else
                                                <option value="{{ $personal->id }}">{{ $personal->name }} {{ $personal->last_name }} #{{ $personal->code}}</option>
                                            @endif
                                        @endforeach
                                    </x-modal.select>
                                    
                                @else
                                    
                                @endif
                            </div>
                            <div class="col-span-1">
                                <label for="description"
                                    class="block text-sm mb-2 font-semibold text-emerald-900">Descripción</label>
                                <textarea placeholder="Escriba la descripción" name="description" id="description" cols="30" rows="9"
                                    class="resize-none p-2.5 bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-800 focus:ring-emerald-800  focus:border-emerald-800 text-sm rounded-lg  block w-full">{{ old('description') }}</textarea>
                            </div>


                            <div class="grid grid-cols-2 gap-4 col-span-2">
                                <div class="col-span-1">
                                    <div class="col-span-1 bottom-0">
                                        @if (count($typeTests) > 0)
                                            <x-modal.select nombre="id_type_test" titulo="Tipo de Evaluación">
                                                @foreach ($typeTests as $typeTest)
                                                    @if (old('id_type_test') == $typeTest->id)
                                                        <option value="{{ $typeTest->id }}" selected>{{ $typeTest->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $typeTest->id }}">{{ $typeTest->name }}</option>
                                                    @endif
                                                @endforeach
                                            </x-modal.select>
                                        @else
                                            <label for="id_personal"
                                                class="block mb-2 text-sm font-semibold text-emerald-900">Tipo
                                                de Evaluación</label>
                                            <span
                                                class="text-sm font-semibold text-red-800 text-center rounded border block p-2 border-red-800">¡Primero
                                                debe agregar un tipo de Evaluación!</span>
                                        @endif
                                    </div>




                                </div>
                                <div class="col-span-1 row-span-2">
                                    <h3 class="text-lg font-semibold text-emerald-900 mt-8 shadow-slate-900 text-center">
                                        Duración</h1>
                                        <div
                                            class="col-span-1 grid grid-cols-2 border border-emerald-600 rounded-lg mt-2 shadow-lg p-2">
                                            <div class="col-span-1">
                                                <x-modal.input nombre="time_h" titulo="Horas"
                                                    placeholder="Escriba las horas" tipo="number" min="min=0"
                                                    max="max=8" valor="{{ old('time_h') }}" />
                                            </div>
                                            <div class="col-span-1">
                                                <x-modal.input nombre="time_m" titulo="Minutos"
                                                    placeholder="Escriba los minutos" tipo="number" min="min=0"
                                                    max="max=59" valor="{{ old('time_m') }}" />
                                            </div>


                                        </div>

                                </div>

                                <div class="col-span-1">
                                    <x-modal.select nombre="random" titulo="Preguntas aleatorias">
                                        @if (old('random') == 1)
                                            <option value="1" selected>Si</option>
                                            <option value="0">No</option>
                                        @else
                                            <option value="1">Si</option>
                                            <option value="0" selected>No</option>
                                        @endif
                                    </x-modal.select>
                                </div>



                                <div class="col-span-1 ">
                                    <x-modal.input nombre="grade_max" titulo="Nota maxima"
                                        placeholder="Escriba la nota maxima" tipo="number" min="1"
                                        valor="{{ old('grade_max') }}" />
                                </div>
                                <div class="col-span-1 ">
                                    <x-modal.input nombre="grade_min" titulo="Nota mínima"
                                        placeholder="Escriba la nota mínima" tipo="number" min="1"
                                        valor="{{ old('grade_min') }}" />
                                </div>
                            </div>


                            <div class="col-span-3 mt-4 flex mx-auto gap-4">
                                @if (count($typeTests) >= 1 && count($personals) >= 1 && count($courses) >= 1)
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
