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
            <form class="p-4 md:p-5" action="{{ route('personal.update', $personalI->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-900 focus:ring-emerald-900  focus:border-emerald-900 text-sm rounded-lg  block w-full p-2.5 "
                            placeholder="Escriba el nombre" required="" value="{{ $personalI->name }}">
                    </div>
                    <div class="col-span-1">
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Apellido</label>
                        <input type="text" name="last_name" id="last_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-900 focus:ring-emerald-900  focus:border-emerald-900 text-sm rounded-lg  block w-full p-2.5 "
                            placeholder="Escriba el apellido" required="" value="{{ $personalI->last_name }}">
                    </div>
                    <div class="col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Correo</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-900 focus:ring-emerald-900  focus:border-emerald-900 text-sm rounded-lg  block w-full p-2.5 "
                            placeholder="Escriba el correo" required="" value="{{ $personalI->email }}">
                    </div>
                    <div class="col-span-1">
                        <label for="code" class="block mb-2 text-sm font-medium text-gray-900">Ficha</label>
                        <input type="number" name="code" id="code"
                            class="bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-900 focus:ring-emerald-900  focus:border-emerald-900 text-sm rounded-lg  block w-full p-2.5 "
                            placeholder="Escriba la ficha" required="" value="{{ $personalI->code }}">
                    </div>
                    <div class="col-span-1">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Telefono</label>
                        <input type="phone" name="phone" id="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-900 focus:ring-emerald-900  focus:border-emerald-900 text-sm rounded-lg  block w-full p-2.5 "
                            placeholder="Escriba el telefono" required="" value="{{ $personalI->phone }}">
                    </div>
                    <div class="col-span-1">
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Rol</label>
                        <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-900 focus:ring-emerald-900  focus:border-emerald-900 text-sm rounded-lg  block w-full p-2.5 ">
                            @if ($personalI->role == 'admin')
                                <option value="admin" selected>Administrador</option>
                                <option value="fac">Facilitador</option>
                                <option value="par">Participante</option>
                            @elseif ($personalI->role == 'fac')
                                <option value="admin">Administrador</option>
                                <option value="fac" selected>Facilitador</option>
                                <option value="par">Participante</option>
                            @elseif ($personalI->role == 'par')
                                <option value="admin">Administrador</option>
                                <option value="fac">Facilitador</option>
                                <option value="par" selected>Participante</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-span-1">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Contraseña</label>
                        <input type="password" name="password" id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-900 focus:ring-emerald-900  focus:border-emerald-900 text-sm rounded-lg  block w-full p-2.5 "
                            placeholder="Escriba la contraseña" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Dirección</label>
                        <input type="text" name="address" id="address"
                            class="bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-900 focus:ring-emerald-900  focus:border-emerald-900 text-sm rounded-lg  block w-full p-2.5 "
                            placeholder="Escriba la dirección" required="" value="{{ $personalI->address }}">
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
                    Actualizar información del usuario
                </button>
            </form>
        </div>
    </div>
</div>