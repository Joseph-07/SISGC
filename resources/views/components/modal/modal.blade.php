<!-- Main modal -->
<div id="{{ $id ?? 'modal'}}" tabindex="-1" aria-hidden="true"
    class="{{ $class ?? ''}} overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black bg-opacity-50">
    <div class="relative p-4 w-full  max-w-md mx-auto mt-28 max-h-lg">
        <!-- Modal content -->
        <div class="relative bg-slate-200 rounded-lg shadow-3xl dark:bg-gray-100 zoom" >
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-emerald-700">
                <h3 class="text-lg font-semibold text-emerald-900 ">
                    {{$titulo ?? 'Modal'}}
                </h3>
                <button type="button"
                    class="text-emerald-900 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    id="{{ $idb ?? 'close-modal'}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14" id="{{ $idb ?? 'close-modal'}}">
                        <path id="{{ $idb ?? 'close-modal'}}" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only" id="{{ $idb ?? 'close-modal'}}">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="{{$direccion}}" method="POST">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    {{$slot}}
                </div>
                <button type="submit"
                    class="text-white flex items-center bg-slate-500 hover:bg-emerald-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-auto">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    {{ $boton ?? 'Registrar' }}
                </button>
            </form>
        </div>
    </div>
</div>