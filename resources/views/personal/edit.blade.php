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

        <div class="p-4 w-full  max-w-xl mx-auto mt-24">
            <!-- Modal content -->
            <div class="relative bg-slate-200 rounded-lg shadow-3xl dark:bg-gray-100 zoom">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-emerald-700">
                    <h3 class="text-lg font-semibold text-emerald-900 ">
                        Editar sistema
                    </h3>
                </div>
                <div>
                    <form action="{{ route('sistemas.update', $personal->id) }}" method="POST" class="p-4">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-1">
                                <x-modal.input nombre="name" titulo="Nombre" placeholder="Escriba el nombre" tipo="text"
                                    valor="{{ $personal->name }}" />
                            </div>
                            <div class="col-span-1">
                                <x-modal.input nombre="last_name" titulo="Apellido" placeholder="Escriba el apellido" tipo="text"
                                    valor="{{ $personal->last_name }}" />
                            </div>
                            <div class="col-span-2">
                                <x-modal.input nombre="email" titulo="Correo" placeholder="Escriba el correo" tipo="email"
                                    valor="{{ $personal->email }}" />
                            </div>
                            <div class="col-span-1">
                                <x-modal.input nombre="code" titulo="Ficha" placeholder="Escriba la ficha" tipo="number"
                                    valor="{{ $personal->code }}" />
                            </div>
                            <div class="col-span-1">
                                <x-modal.input nombre="phone" titulo="Teléfono" placeholder="Escriba el teléfono" tipo="tlf"
                                    valor="{{ $personal->phone }}" />
                            </div>
                            <div class="col-span-1">
                                <x-modal.select nombre="role" titulo="Rol">
                                    @if ($personal->role == 'admin')
                                        <option value="admin" selected>Administrador</option>
                                        <option value="fac">Facilitador</option>
                                        <option value="par">Participante</option>
                                    @elseif ($personal->role == 'fac')
                                        <option value="admin">Administrador</option>
                                        <option value="fac" selected>Facilitador</option>
                                        <option value="par">Participante</option>
                                    @else
                                        <option value="admin">Administrador</option>
                                        <option value="fac">Facilitador</option>
                                        <option value="par" selected>Participante</option>
                                    @endif
                                </x-modal.select>
                            </div>
                            <div class="col-span-1">
                                <x-modal.input nombre="password" titulo="Contraseña" placeholder="Escriba la contraseña"
                                    tipo="password" />
                            </div>
                            <div class="col-span-2">
                                <x-modal.input nombre="address" titulo="Dirección" placeholder="Escriba la dirección" tipo="text"
                                    valor="{{ $personal->address }}" />
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
                                    <a href="{{ route('personal.index') }}" class="py-3 px-5">
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
