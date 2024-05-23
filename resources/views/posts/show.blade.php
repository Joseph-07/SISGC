@extends('layouts.app')

@section('content')
    <a href="/posts" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> Volver</a>
    <div
        class="border-r border-b border-l border-gray-400  lg:border-t lg:border-gray-400 bg-white rounded  lg:rounded-r p-4 flex flex-col justify-between leading-normal mt-5">
        <div class="mb-8">
            <div class="text-gray-900 font-bold text-xl mb-2">
                {{ $post->title }}
            </div>
            <p class="text-sm text-gray-600 flex items-center">
                {{ $post->category }}
            </p>
            <p class="text-gray-700 text-base mt-4">{{ $post->content }}</p>
        </div>
        <div class="flex items-center">
            <img class="w-10 h-10 rounded-full mr-4" src="https://picsum.photos/200/300" alt="Avatar of Jonathan Reinink">
            <div class="text-sm">
                <p class="text-gray-900 leading-none">Jonathan Reinink</p>
                <p class="text-gray-600">Aug 18</p>
            </div>
        </div>
    </div>
@endsection
