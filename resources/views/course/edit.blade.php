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
                        Editar curso
                    </h3>
                </div>
                <div>
                    <form action="{{ route('cursos.update', $course->id) }}" method="POST" class="p-4">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-1">
                                <x-modal.input nombre="name" titulo="Nombre" placeholder="Escriba el nombre del curso"
                                    tipo="text" valor="{{ $course->code }}" />
                            </div>
                            <div class="col-span-1">
                                <x-modal.select nombre="id_personal" titulo="Facilitador">
                                    @foreach ($personals as $personal)
                                        @if ($personal->id == $course->id_personal)
                                            <option value="{{ $personal->id }}" selected>{{ $personal->name }}
                                                {{ $personal->last_name }} #{{ $personal->code }}</option>
                                        @else
                                            <option value="{{ $personal->id }}">{{ $personal->name }}
                                                {{ $personal->last_name }}
                                                #{{ $personal->code }}</option>
                                        @endif
                                    @endforeach
                                </x-modal.select>
                            </div>
                            <div class="col-span-1">
                                <x-modal.select nombre="id_system" titulo="Sistema">
                                    @foreach ($systs as $syst)
                                        @if ($syst->id == $course->id_system)
                                            <option value="{{ $syst->id }}" selected>{{ $syst->code }}</option>
                                        @else
                                            <option value="{{ $syst->id }}">{{ $syst->code }}</option>
                                        @endif
                                    @endforeach
                                </x-modal.select>
                            </div>
                            <div class="col-span-1">
                                <x-modal.select nombre="id_proc" titulo="Proceso">
                                    @foreach ($procs as $proc)
                                        @if ($proc->id == $course->id_proc)
                                            <option value="{{ $proc->id }}" selected>{{ $proc->code }}</option>
                                        @else
                                            <option value="{{ $proc->id }}">{{ $proc->code }}</option>
                                        @endif
                                    @endforeach
                                </x-modal.select>
                            </div>
                            <div class="col-span-1">
                                <x-modal.select nombre="id_spec" titulo="Especialidad">
                                    @foreach ($specs as $spec)
                                        @if ($spec->id == $course->id_spec)
                                            <option value="{{ $spec->id }}" selected>{{ $spec->code }}</option>
                                        @else
                                            <option value="{{ $spec->id }}">{{ $spec->code }}</option>
                                        @endif
                                    @endforeach
                                </x-modal.select>
                            </div>
                            <div class="col-span-1">
                                    <x-modal.select nombre="id_clas" titulo="Clase">
                                        @foreach ($classes as $clas)                                        
                                            @if ($clas->id == $course->id_clas)
                                                <option value="{{ $clas->id }}" selected>{{ $clas->code }}</option>
                                            @else
                                                <option value="{{ $clas->id }}">{{ $clas->code }}</option>
                                            @endif
                                        @endforeach
                                    </x-modal.select>
                            </div>
                            <div class="col-span-2 mt-2">
                                <label for="description"
                                    class="block text-sm mb-2 font-semibold text-emerald-900">Descripción</label>
                                <textarea placeholder="Escriba la descripción" name="description" id="description" cols="30" rows="10"
                                    class="resize-none p-2.5 col-span-2 bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-800 focus:ring-emerald-800  focus:border-emerald-800 text-sm rounded-lg  block w-full">{{ $course->description }}</textarea>
                            </div>
                            <div class="col-span-2 mt-4 flex mx-auto gap-4">
                                @if (count($systs) >= 1 && count($procs) >= 1 && count($specs) >= 1 && count($classes) >= 1)
                                    <button type="submit"
                                        class="text-white flex bg-slate-600 hover:bg-emerald-700 shadow-md font-medium rounded-lg text-sm px-5 py-2.5 text-center my-auto ">
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
                                    class="text-white flex bg-slate-600 hover:bg-emerald-700 shadow-md font-medium rounded-lg text-sm  text-center my-auto">
                                    <a href="{{ route('cursos.index') }}" class="py-2.5 px-5">
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
