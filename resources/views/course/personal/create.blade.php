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
                        Registrar nuevo participante
                    </h3>
                </div>
                <div>
                    <form action="{{ route('cursos.personalsStore', $course->id) }}" method="POST" class="p-4">
                        @csrf
                        <input type="text" name="id_course" value="{{ $course->id }}" hidden>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-1">
                                @if (count($personals) > 0)
                                    <x-modal.select nombre="id_personal" titulo="Participante">
                                        @foreach ($personals as $personal)
                                            <option value="{{ $personal->id }}">{{ $personal->name }} {{ $personal->last_name }} #{{ $personal->code }}</option>
                                        @endforeach
                                    </x-modal.select>
                                @else
                                    <label for="syst" class="block mb-2 text-sm font-semibold text-emerald-900">Participante</label>
                                    <span
                                        class="text-sm font-semibold text-red-800 text-center rounded border block p-2 border-red-800">¡No hay participantes para agregar al curso!</span>
                                @endif
                                

                            </div>
                            <div class="col-span-1">
                                <x-modal.input nombre="grade" titulo="Nota" placeholder="Escriba la nota del participante"
                                    tipo="number" />
                            </div>
                            <div>
                                <x-modal.select nombre="approved" titulo="Aprobado">
                                    <option value="1">Aprobado</option>
                                    <option value="0" selected>Reprobado</option>
                                </x-modal.select>
                            </div>
                            <div>
                                <x-modal.select nombre="test_permision" titulo="Permiso de evaluación">
                                    <option value="1">Si</option>
                                    <option value="0" selected>No</option>
                                </x-modal.select>
                            </div>
                            <div class="col-span-2 mt-4 flex mx-auto gap-4">
                                @if (count($personals) > 0)
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
                                    <a href="{{ route('cursos.personals', $course->id) }}" class="py-2.5 px-5">
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
