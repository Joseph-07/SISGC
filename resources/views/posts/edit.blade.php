@extends('adminlte::page')

@section('content')
    <h1 class="text-3xl mb-6">Update Post</h1>
    <form action="{{ route('posts.update', $post->id)}}" method="post" class="mt-6 border border-gray-400 rounded-lg p-4">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-1 ...">
                <label for="title">Title
                    <br>
                    <input type="text" id="title" name="title"class="border border-gray-400 rounded hover:border-gray-500 px-2 py-1" value="{{ $post->title }}">
                </label>
            </div>

            <div class="col-span-1 ...">
                <label for="category">Category
                    <br>
                    <input type="text" id="category" name="category"
                        class="border border-gray-400 rounded hover:border-gray-500 px-2 py-1" value="{{ $post->category }}">
                </label>
            </div>

            <div class="col-span-1 ...">
                <label for="content">Content
                    <br>
                    <textarea id="content" name="content" class="border border-gray-400 rounded hover:border-gray-500 px-2 py-1"> {{ $post->content }}</textarea>
                </label>
            </div>
        </div>
        <div class="grid grid-cols-7 gap-4 mt-3">
            <div class="col-span-6 ..."></div>
            <div class="col-span-1 ...">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
            </div>
        </div>
    </form>
@endsection
