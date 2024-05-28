@extends('master')
@push('scripts')
    <script type="module" src="http://[::1]:5173/resources/js/xd.js"></script>
@endpush
@section('content')
    <div class="">
        <div class="w-full bg-blue-400 rounded-lg border border-blue-600 shadow-md text-white px-2 font-bold text-sm">
            SISGC » Cursos » Administrar Cursoss
        </div>
        <h1 class="text-3xl mb-6 text-center font-bold mt-4">Administrar Sistemas</h1>

        <div class="max-w-xl mx-auto ring-2 ring-slate-600 rounded-lg ring-rounded z-10 bg-blue-300 shadow-md">
            <div class=" rounded-lg">
                <button class= "rounded-lg  text-white px-2 font-bold text-sm w-full text-left shadow-sm"
                    id="toggleSearch">Buscar</button>
            </div>
            <div class="ring-2 ring-slate-600 rounded-b-lg bg-white hidden p-3" id="searchForm">
                <form class="flex flex-col">
                    <div class="border border-gray-300 ">
                        <span class="absolute ml-2 -translate-y-3 bg-white text-sm px-1">Filtro de búsqueda</span>
                        <div class="p-3 ">
                            <label for="searchInput" class="mb-2">Buscar</label>
                            <input type="text" id="searchInput"
                                class="border border-gray-300 p-2 rounded h-6 hover:border-blue-300">

                        </div>

                    </div>
                    <button type="submit"
                        class="mx-auto mt-2 bg-blue-300 hover:bg-blue-500 text-white text-xs font-bold px-2 rounded ring-2 ring-slate-600 shadow-sm z-10">Buscar</button>
                </form>
            </div>
        </div>
        <div class="flex mt-2">
            <button
                class="ml-auto mr-1 flex mt-2 bg-blue-300 hover:bg-blue-500 text-white text-xs font-bold px-2 rounded ring-2 ring-slate-600 shadow-md z-10">Nuevo</button>
            <button
                class="mr-auto ml-1 flex mt-2 bg-blue-300 hover:bg-blue-500 text-white text-xs font-bold px-2 rounded ring-2 ring-slate-600 shadow-md z-10">Regresar</button>
        </div>

        <div class="container max-w-2xl mx-auto mt-6 bg-red-100">
            xs
            <div class="ring-2 ring-slate-600 rounded-md bg-white">
                <div class=" bg-yellow-200 w-full flex border-b-2 border-slate-600 rounded-t-md">
                    <span class="mx-auto text-md font-semibold text-gray-900 py-1">Lista de sistemas</span>
                </div>
                <div class="bg-blue-600 border-b-2 border-slate-600 grid grid-cols-3 text-white">
                    <span class="text-center border-r-2 border-slate-600">Código</span>
                    <span class="text-center border-r-2 border-slate-600">Descrición</span>
                    <span class="text-center">Acciones</span>
                </div>
                @foreach ($systs as $syst)
                    <div class="bg-blue-300 border-b-2 border-slate-600 grid grid-cols-3 py-4">
                        <div class="text-center">
                            <span>{{ $syst->code }}</span>
                        </div>
                        <div class="text-center">
                            <span>{{ $syst->description }}</span>
                        </div>
                        <div class="text-center">
                            <span><a href="{{ route('sistemas.edit', $syst) }}"
                                    class="p-2 bg-white hover:bg-blue-100 text-blue-500 text-xs font-bold rounded-xl ring-2     ring-blue-500">Editar</a></span>
                            <span><a href="{{ route('sistemas.destroy', $syst) }}"
                                    class="p-2 bg-white hover:bg-blue-100 text-blue-500 text-xs font-bold rounded-xl ring-2     ring-blue-500">Eliminar</a></span>
                        </div>
                    </div>
                @endforeach
                <div class="bg-white rounded-b-md h-5">

                </div>
            </div>

            {{ $systs->links() }}

        </div>


        <ul class="mt-6 list-disc ml-4">
            @foreach ($systs as $syst)
                <li class="text-1xl mb-4">
                    <a href="{{ route('sistemas.show', $syst) }}">{{ $syst->code }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
