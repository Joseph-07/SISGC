<div>
    <label for="{{ $nombre ?? 'Ejemplo'}}" class="block mb-2 text-sm font-medium text-gray-900">{{ $titulo ?? 'Ejemplo'}}</label>
    <input type="{{$tipo ?? 'text'}}" name="{{ $nombre ?? 'Ejemplo' }}" id="{{ $nombre ?? 'Ejemplo'}}"
        class="bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-900 focus:ring-emerald-900  focus:border-emerald-900 text-sm rounded-lg  block w-full p-2.5 "
        placeholder="{{ $placeholder }}" required="" value="{{ $valor ?? ''}}" {{ $deshabilitado ?? ''}}>
</div>
