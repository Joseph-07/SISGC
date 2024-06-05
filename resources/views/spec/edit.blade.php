@extends('master')
@push('scripts')
    <script type="module" src="http://[::1]:5173/resources/js/xd.js"></script>
    <script type="module" src="http://[::1]:5173/resources/css/sistema.css"></script>
@endpush
@section('hidden')
    hidden
@endsection
@section('modal')
    <div class="bg-black bg-opacity-50 flex h-full">

        <div class="p-4 w-full  max-w-md mx-auto mt-24">
            <!-- Modal content -->
            <div class="relative bg-slate-200 rounded-lg shadow-3xl dark:bg-gray-100 zoom">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-emerald-700">
                    <h3 class="text-lg font-semibold text-emerald-900 ">
                        Editar especialidad
                    </h3>
                </div>
                <div>
                    <form action="{{ route('especialidades.update', $spec->id) }}" method="POST" class="p-4">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-2">
                            <div class="col-span-2">
                                <x-modal.input nombre="name" titulo="Nombre" placeholder="Escriba el nombre de la especialidad"
                                    tipo="text" valor="{{ $spec->code }}" />
                            </div>
                            <div class="col-span-2 mt-2">
                                <label for="description"
                                    class="block text-sm mb-2 font-semibold text-emerald-900">Descripción</label>
                                <textarea placeholder="Escriba la descripción" name="description" id="description" cols="30" rows="10"
                                    class="resize-none p-2.5 col-span-2 bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-800 focus:ring-emerald-800  focus:border-emerald-800 text-sm rounded-lg  block w-full">{{ $spec->description }}</textarea>
                            </div>
                            <div class="col-span-1 mt-4">
                                <button type="submit"
                                    class="text-white flex ml-auto mr-4 bg-slate-600 hover:bg-emerald-700 shadow-md font-medium rounded-lg text-sm px-5 py-2.5 text-center zoomh">
                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Guardar
                                </button>
                            </div>
                            <div class="col-span-1 mt-4">
                                <button
                                    class="text-white  mr-auto ml-4 bg-slate-600 hover:bg-emerald-700 shadow-md font-medium rounded-lg text-sm py-2.5 text-center zoomh">
                                    <a href="{{ route('especialidades.index') }}" class="py-3 px-5">
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
