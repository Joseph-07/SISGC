<h1 class="text-3xl mb-6">Courses</h1>
    <button ><a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="/posts/create">Create Course</a></button>


    <ul class="mt-6">
        @foreach ($courses as $course)
            <li class="text-1xl mb-4">
                {{ $course->code }}
            </li>
        @endforeach
    </ul>