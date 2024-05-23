<div  {{$attributes->merge(['class' => 'p-4 mb-6 text-sm rounded-lg ' . $class])}} role="alert">
    <span class="font-semibold">{{$title ?? 'Info Alert!'}}</span> {{ $slot }}.
</div>