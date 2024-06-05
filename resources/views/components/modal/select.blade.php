<label for="{{ $nombre ?? 'Ejemplo'}}" class="block mb-2 text-sm font-semibold text-emerald-900">{{ $titulo ?? 'Ejemplo'}}</label>
<select id="{{ $nombre ?? 'Ejemplo'}}" name="{{ $nombre ?? 'Ejemplo'}}"
    class="bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-900 focus:ring-emerald-900  focus:border-emerald-900 text-sm rounded-lg  block w-full p-2.5 ">
    {{ $slot }}
</select>
