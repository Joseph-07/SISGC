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
                        Registrar nuevo curso
                    </h3>
                </div>
                <div>
                    <form action="{{ route('cursos.store') }}" method="POST" class="p-4">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-1">
                                <x-modal.input nombre="name" titulo="Nombre" placeholder="Escriba el nombre del curso"
                                    tipo="text" />
                            </div>
                            <div class="col-span-1">
                                @if (count($personals) >= 1)
                                    <x-modal.select nombre="id_personal" titulo="Facilitador">
                                        @foreach ($personals as $personal)
                                            <option value="{{ $personal->id }}">{{ $personal->name }} {{ $personal->last_name }} #{{ $personal->code }}</option>
                                        @endforeach
                                    </x-modal.select>
                                @endif
                                @if (count($personals) == 0)
                                    <label for="personal" class="block mb-2 text-sm font-semibold text-emerald-900">Personal</label>
                                    <span
                                        class="text-sm font-semibold text-red-800 text-center rounded border block p-2 border-red-800">¡Primero
                                        debe agregar un
                                        personal!</span>
                                @endif
                            </div>
                            <div class="col-span-1">
                                @if (count($systs) >= 1)
                                    <x-modal.select nombre="id_system" titulo="Sistema">
                                        @foreach ($systs as $syst)
                                            <option value="{{ $syst->id }}">{{ $syst->code }}</option>
                                        @endforeach
                                    </x-modal.select>
                                @endif
                                @if (count($systs) == 0)
                                    <label for="syst" class="block mb-2 text-sm font-semibold text-emerald-900">Sistema</label>
                                    <span
                                        class="text-sm font-semibold text-red-800 text-center rounded border block p-2 border-red-800">¡Primero
                                        debe agregar un sistema!</span>
                                @endif
                            </div>
                            <div class="col-span-1">
                                @if (count($procs) >= 1)
                                    <x-modal.select nombre="id_proc" titulo="Proceso">
                                        @foreach ($procs as $proc)
                                            <option value="{{ $proc->id }}">{{ $proc->code }}</option>
                                        @endforeach
                                    </x-modal.select>
                                @endif
                                @if (count($procs) == 0)
                                    <label for="personal" class="block mb-2 text-sm font-semibold text-emerald-900">Proceso</label>
                                    <span
                                        class="text-sm font-semibold text-red-800 text-center rounded border block p-2 border-red-800">¡Primero
                                        debe agregar un Proceso!</span>
                                @endif
                            </div>
                            <div class="col-span-1">
                                @if (count($specs) >= 1)
                                    <x-modal.select nombre="id_spec" titulo="Especialidad">
                                        @foreach ($specs as $spec)
                                            <option value="{{ $spec->id }}">{{ $spec->code }}</option>
                                        @endforeach
                                    </x-modal.select>
                                @endif
                                @if (count($specs) == 0)
                                    <label for="spec" class="block mb-2 text-sm font-semibold text-emerald-900">Especialidad</label>
                                    <span
                                        class="text-sm font-semibold text-red-800 text-center rounded border block p-2 border-red-800">¡Primero
                                        debe agregar una especialidad!</span>
                                @endif
                            </div>
                            <div class="col-span-1">
                                @if (count($classes) >= 1)
                                    <x-modal.select nombre="id_clas" titulo="Clase">
                                        @foreach ($classes as $clas)
                                            <option value="{{ $clas->id }}">{{ $clas->code }}</option>
                                        @endforeach
                                    </x-modal.select>
                                @endif
                                @if (count($classes) == 0)
                                    <label for="personal" class="block mb-2 text-sm font-semibold text-emerald-900">Clase</label>
                                    <span
                                        class="text-sm font-semibold text-red-800 text-center rounded border block p-2 border-red-800">¡Primero
                                        debe agregar una clase!</span>
                                @endif
                            </div>
                            <div class="col-span-2 mt-2">
                                <label for="description"
                                    class="block text-sm mb-2 font-semibold text-emerald-900">Descripción</label>
                                <textarea placeholder="Escriba la descripción" name="description" id="description" cols="30" rows="10"
                                    class="resize-none p-2.5 col-span-2 bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-800 focus:ring-emerald-800  focus:border-emerald-800 text-sm rounded-lg  block w-full"></textarea>
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
                                    <a href="{{ route('procesos.index') }}" class="py-2.5 px-5">
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
