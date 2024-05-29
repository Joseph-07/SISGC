<!-- Main modal -->
<div id="crud-modal-e" tabindex="-1" aria-hidden="true"
    class=" overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black bg-opacity-50">
    <div class="relative p-4 w-full  max-w-md mx-auto mt-28 max-h-lg">
        <!-- Modal content -->
        <div class="relative bg-slate-200 rounded-lg shadow-3xl dark:bg-gray-100">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-emerald-700">
                <h3 class="text-lg font-semibold text-emerald-900 ">
                    Editar información del sistema
                </h3>
                <button type="button"
                    class="text-emerald-900 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    id="close-modal-e">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="{{ route('sistemas.update', $systI->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Código</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-900 focus:ring-emerald-900  focus:border-emerald-900 text-sm rounded-lg  block w-full p-2.5 "
                            placeholder="Escriba el nombre del sistema" required="" value="{{ $systI->code }}">
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Descripción del
                            sistema</label>
                        <textarea id="description" rows="4"
                            class="block resize-none p-2.5 w-full text-sm text-gray-900 bg-gray-50 hover:border-emerald-900 rounded-lg border border-gray-300 focus:ring-emerald-900  focus:border-emerald-900 "
                            placeholder="Escriba la descripción del sistema" name="description">{{ $systI->description }}</textarea>
                    </div>
                </div>
                <button type="submit"
                    class="text-white flex items-center bg-slate-500 hover:bg-emerald-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-auto">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Actualizar información del sistema
                </button>
            </form>
        </div>
    </div>
</div>