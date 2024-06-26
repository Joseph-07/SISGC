@extends('adminlte::page')

@section('content')
    <h1 class="text-3xl mb-6">Posts</h1>
    <button ><a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="/posts/create">Create Post</a></button>

    @php if(isset($pagina)){ echo"xs";} @endphp

    <ul class="mt-6">
        @foreach ($posts as $post)
            <li class="text-1xl mb-4">
                <div class="text-gray-500">
                    <div class="bg-black w-3 h-3 rounded-full ">

                    </div>
                    <a  class="ml-6" href="{{ route('posts.show', $post)}}">{{ $post->title }}</a>
                    <a href="/posts/{{ $post->id }}/edit"><button><a class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" href="{{ route('posts.edit', $post)}}">Edit</button></a>
                    <form action="{{ route('posts.destroy', $post)}}" method="post" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</a></button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
    {{ $posts->links() }}
@endsection
