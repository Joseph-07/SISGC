<div>
    <label for="{{ $nombre ?? 'Ejemplo'}}" class="block mb-2 text-sm font-semibold text-emerald-900">{{ $titulo ?? 'Ejemplo'}}</label>
    <input type="{{$tipo ?? 'text'}}" name="{{ $nombre ?? 'Ejemplo' }}" id="{{ $nombre ?? 'Ejemplo'}}"
        class="bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-900 focus:ring-emerald-800  focus:border-emerald-800 text-sm rounded-lg  block w-full p-2.5"
        placeholder="{{ $placeholder }}" required="" value="{{ $valor ?? ''}}" {{ $deshabilitado ?? ''}} step={{ $step ?? '1'}} {{ $min ?? ''}} {{ $max ?? ''}}>
</div>
