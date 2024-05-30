@extends('master')
@push('scripts')
    <script type="module" src="http://[::1]:5173/resources/js/xd.js"></script>
    <script type="module" src="http://[::1]:5173/resources/css/sistema.css"></script>
@endpush
@php
    // $xs = $_SESSION['route-act'];
@endphp
@section('content')
    <div class="">
        <div class="w-full bg-emerald-700 rounded-lg shadow-md text-white px-2 font-semibold text-sm">
            SISGC » Sistemas » Administrar Usuarios
        </div>
        <h1 class="text-3xl mb-6 text-center font-bold mt-4">Administrar Usuarios</h1>

        <div class="  max-w-xl mx-auto shadow-2xl  rounded-lg ring-rounded z-10 " id="searchButton">
            <div class=" bg-slate-600 rounded-lg hover:bg-emerald-700" id="searchBar">
                <button class= "rounded-lg  text-white px-2 pb-1 font-semibold text-sm w-full text-left shadow-sm"
                    id="toggleSearch">Buscar</button>
            </div>
            <div class=" rounded-b-lg bg-white hidden p-3 " id="searchForm">
                <form class="flex flex-col mt-1">
                    <div class="border border-gray-300 ">
                        <span class="absolute ml-2 -translate-y-3 bg-white text-sm px-1">Filtro de búsqueda</span>
                        <div class="p-3 ">
                            <label for="searchInput" class="mb-2">Buscar</label>
                            <input type="text" id="searchInput"
                                class="border border-slate-300 p-2 rounded h-6 hover:border-blue-300">

                        </div>

                    </div>
                    <button type="submit"
                        class="mx-auto mt-2  bg-slate-600 hover:bg-emerald-700 text-white text-xs font-semibold p-2 rounded shadow-sm z-10">Buscar</button>
                </form>
            </div>
        </div>

        <div class="flex mt-2">
            <button id="btn-modal"
                class="ml-auto mr-1 flex mt-2 bg-slate-600 hover:bg-emerald-700 text-white text-xs font-semibold p-2 rounded shadow-md ">Nuevo</button>
            <a href="{{ route('inicio') }}"
                class="mr-auto ml-1 flex mt-2 bg-slate-600 hover:bg-emerald-700 text-white text-xs font-semibold p-2 rounded shadow-md ">Regresar</a>
        </div>

        <div class="container max-w-2xl mx-auto mt-6 ">
            {{ $personals->links() }}

            <div class=" rounded-md bg-white shadow-xl">
                <div class=" bg-slate-200 w-full flex border-b-2 border-emerald-800 rounded-t-md shadow-3xl">
                    <span class="mx-auto text-md font-semibold text-gray-900 py-1">Lista de usuarios</span>
                </div>
                @isset($personals)
                    <div class="bg-emerald-700 border-b-2 border-emerald-800 grid grid-cols-4 text-white   ">
                        <span class="text-center ">Nombre</span>
                        <span class="text-center ">Apellido</span>
                        <span class="text-center ">Ficha</span>
                        <span class="text-center">Acciones</span>
                    </div>
                    @foreach ($personals as $personal)
                        <div class="bg-slate-100 border-b-2 border-emerald-700 grid grid-cols-4 py-4">
                            <div class="text-center">
                                <span>{{ $personal->name }}</span>
                            </div>
                            <div class="text-center">
                                <span>{{ $personal->last_name }}</span>
                            </div>
                            <div class="text-center">
                                <span>{{ $personal->code }}</span>
                            </div>
                            <div class="text-center">
                                <span class="mr-1"><x-button
                                        href="{{ route('personal.edit', $personal) }}">Editar</x-button></span>
                                <form action="{{ route('personal.destroy', $personal) }}" method="post" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><a
                                            class="p-2 bg-slate-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded-xl">Eliminar</a></button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endisset
                @if (count($personals) == 0)
                    <div class="bg-slate-100 border-b-2 border-emerald-700  py-4">
                        <div class="text-center">
                            <span>No hay sistemas</span>
                        </div>
                    </div>
                @endif
                <div class="bg-white rounded-b-md h-5">

                </div>
            </div>

            {{ $personals->links() }}

        </div>

        <x-modal.modal titulo="Registrar usuario" direccion="{{ route('personal.store') }}" class="hidden" id="crud-modal-s" idb="close-modal-s">
            <div class="col-span-1">
                <x-modal.input nombre="name" titulo="Nombre" placeholder="Escriba el nombre" tipo="text" />
            </div>
            <div class="col-span-1">
                <x-modal.input nombre="last_name" titulo="Apellido" placeholder="Escriba el apellido" tipo="text" />
            </div>
            <div class="col-span-2">
                <x-modal.input nombre="email" titulo="Correo" placeholder="Escriba el correo" tipo="email" />
            </div>
            <div class="col-span-1">
                <x-modal.input nombre="code" titulo="Ficha" placeholder="Escriba la ficha" tipo="number" />
            </div>
            <div class="col-span-1">
                <x-modal.input nombre="phone" titulo="Teléfono" placeholder="Escriba el teléfono" tipo="tlf" />
            </div>
            <div class="col-span-1">
                <x-modal.select nombre="role" titulo="Rol">
                    <option value="admin">Administrador</option>
                    <option value="fac">Facilitador</option>
                    <option value="par" selected>Participante</option>
                </x-modal.select>
            </div>
            <div class="col-span-1">
                <x-modal.input nombre="password" titulo="Contraseña" placeholder="Escriba la contraseña" tipo="password" />
            </div>
            <div class="col-span-2">
                <x-modal.input nombre="address" titulo="Dirección" placeholder="Escriba la dirección" tipo="text" />
            </div>
        </x-modal.modal>

        @isset($personalI)
            <x-modal.modal titulo="Editar usuario" direccion="{{ route('personal.update', $personalI) }}" id="crud-modal-e" idb="close-modal-e">
                @method('PUT')
                <div class="col-span-1">
                    <x-modal.input nombre="name" titulo="Nombre" placeholder="Escriba el nombre" tipo="text" valor="{{ $personalI->name }}"/>
                </div>
                <div class="col-span-1">
                    <x-modal.input nombre="last_name" titulo="Apellido" placeholder="Escriba el apellido" tipo="text" valor="{{ $personalI->last_name }}"/>
                </div>
                <div class="col-span-2">
                    <x-modal.input nombre="email" titulo="Correo" placeholder="Escriba el correo" tipo="email" valor="{{ $personalI->email }}"/>
                </div>
                <div class="col-span-1">
                    <x-modal.input nombre="code" titulo="Ficha" placeholder="Escriba la ficha" tipo="number" valor="{{ $personalI->code }}"/>
                </div>
                <div class="col-span-1">
                    <x-modal.input nombre="phone" titulo="Teléfono" placeholder="Escriba el teléfono" tipo="tlf" valor="{{ $personalI->phone }}"/>
                </div>
                <div class="col-span-1">
                    <x-modal.select nombre="role" titulo="Rol">
                        @if ($personalI->role == 'admin')
                            <option value="admin" selected>Administrador</option>
                            <option value="fac">Facilitador</option>
                            <option value="par">Participante</option>
                        @elseif ($personalI->role == 'fac')
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
                        tipo="password"/>
                </div>
                <div class="col-span-2">
                    <x-modal.input nombre="address" titulo="Dirección" placeholder="Escriba la dirección" tipo="text" valor="{{ $personalI->address }}"/>
                </div>
            </x-modal.modal>
        @endisset

    </div>
@endsection
