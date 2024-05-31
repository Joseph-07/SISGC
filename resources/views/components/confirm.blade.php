<!-- Main modal -->
<div id="{{ $id ?? 'modal'}}" tabindex="-1" aria-hidden="true"
    class="hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full max-h-full bg-black bg-opacity-50">
    <div class="relative p-4 w-full  max-w-md mx-auto mt-28 max-h-lg">
        <!-- Modal content -->
        <div class="relative bg-slate-200 rounded-lg shadow-3xl dark:bg-gray-100 zoom">
            <!-- Modal header -->
            <div class=" justify-between p-4 md:p-5 border-b rounded-t border-emerald-700">
                <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" width="200px" height="200px" viewBox="0 0 45.311 45.311"
                    xml:space="preserve" class="mx-auto">

                    <path fill="#661414" d="M22.675,0.02c-0.006,0-0.014,0.001-0.02,0.001c-0.007,0-0.013-0.001-0.02-0.001C10.135,0.02,0,10.154,0,22.656
  c0,12.5,10.135,22.635,22.635,22.635c0.007,0,0.013,0,0.02,0c0.006,0,0.014,0,0.02,0c12.5,0,22.635-10.135,22.635-22.635
  C45.311,10.154,35.176,0.02,22.675,0.02z M22.675,38.811c-0.006,0-0.014-0.001-0.02-0.001c-0.007,0-0.013,0.001-0.02,0.001
  c-2.046,0-3.705-1.658-3.705-3.705c0-2.045,1.659-3.703,3.705-3.703c0.007,0,0.013,0,0.02,0c0.006,0,0.014,0,0.02,0
  c2.045,0,3.706,1.658,3.706,3.703C26.381,37.152,24.723,38.811,22.675,38.811z M27.988,10.578
  c-0.242,3.697-1.932,14.692-1.932,14.692c0,1.854-1.519,3.356-3.373,3.356c-0.01,0-0.02,0-0.029,0c-0.009,0-0.02,0-0.029,0
  c-1.853,0-3.372-1.504-3.372-3.356c0,0-1.689-10.995-1.931-14.692C17.202,8.727,18.62,5.29,22.626,5.29
  c0.01,0,0.02,0.001,0.029,0.001c0.009,0,0.019-0.001,0.029-0.001C26.689,5.29,28.109,8.727,27.988,10.578z" />

                </svg>

                <h3 class="text-xl font-semibold text-center text-red-900 mt-2">
                    ¿Seguro que desea eliminarlo?
                </h3>
            </div>

            <!-- Modal body -->
            <form class="p-4 md:p-5 " action="{{ $direccion }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="grid gap-4 mb-4 grid-cols-2">

                    <button type="submit"
                        class="text-white zoomh bg-slate-500 hover:bg-red-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center ml-auto">
                        Aceptar
                    </button>
                    <button type="button"
                        class="text-white zoomh bg-slate-500 hover:bg-emerald-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-auto"
                        id="close-modal-{{ $idb ?? '-close-modal' }}">
                        <span class="" id="close-modal-{{ $idb ?? 'close-modal' }}">Cancelar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
