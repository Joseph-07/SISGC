@extends('master')
@push('scripts')
    <script type="module" src="http://[::1]:5173/resources/js/xd.js"></script>
    <script type="module" src="http://[::1]:5173/resources/css/sistema.css"></script>
@endpush
@php
    // $xs = $_SESSION['route-act'];
@endphp

@section('content')
    <div class="zoom" id="container">
        <div class="w-full bg-emerald-700 rounded-lg shadow-md text-white px-2 font-semibold text-sm"> 
            SISGC » Evaluaciones » Presentar Evaluaciones
        </div>
        <h1 class="text-3xl mb-6 text-center font-bold mt-6">Evaluación: {{ $test->code }}</h1>
        <h1 class="text-2xl mb-6 text-center font-bold">{{ $test->description }}</h1>
        <h1 class="text-xl mb-6 text-center font-semibold">Tiempo de evaluación: {{ $test->time }}</h1>

        <div class="max-w-3xl mx-auto shadow-2xl rounded-lg ring-1 ring-emerald-900 p-2" >
            <form action="{{ route('evaluaciones.results', $test->id) }}" method="POST">
                @csrf
                @php
                    $i = 0;
                @endphp
                @foreach ($questions as $question)
                    @php
                        $i +=1;
                    @endphp
                    <div>
                        <div name="{{ $question->id }}" class="">
                            <span class=" font-semibold text-lg">{{ $i}}. Pregunta: {{ $question->enunce }}</span> @if($question->total > 0)<span class="float-right font-semibold">{{ $question->total}} pnts</span> @endif
                        </div>
                        <div name="Opciones" class="rounded-lg bg-slate-200 ring-1 ring-slate-400 mx-2 mt-1 p-2 mb-6">
                            @if($question->type_quest->name == 'Simple')
                                {{-- simple --}}
                                @foreach($question->answers as $answer)
                                    <div class="block ">
                                        <input type="radio" id="{{ $answer->id}}" name="pre-{{ $question->id }}" value="{{ $answer->id }}" class="text-emerald-700 focus:ring-0 focus:ring-transparent mb-0.5"> <label for="{{ $answer->id}}" class="my-auto">{{ $answer->enunce }}</label>
                                    </div>
                                @endforeach

                            @elseif($question->type_quest->name == 'Múltiple')
                                {{-- multiple --}}
                                @foreach($question->answers as $answer)
                                    <div class="block ">
                                        <input type="checkbox" id="{{ $answer->id }}" name="prem-{{ $question->id }}-{{ $answer->id }}" value="{{ $answer->id }}" class="text-emerald-700 focus:ring-0 focus:ring-transparent  mb-0.5"> <label for="{{ $answer->id }}" class="my-auto">{{ $answer->enunce }}</label>
                                    </div>
                                @endforeach

                            @elseif($question->type_quest->name == 'Linea de aprendizaje')
                                {{-- line --}}
                                @foreach($question->answers as $answer)
                                    <div class="block ">
                                        <input type="radio" id="{{ $answer->id}}" name="prel-{{ $question->id }}" value="{{ $answer->id }}" class="text-emerald-700 focus:ring-0 focus:ring-transparent mb-0.5"> <label for="{{ $answer->id}}" class="my-auto">{{ $answer->enunce }}</label>
                                    </div>
                                @endforeach
                            @endif

                            @if ($question->require_jus == 1)
                                <div class="block px-2">
                                    <label for="justification" class="mt-1 font-semibold">Justifique su respuesta:</label>
                                    <textarea name="justification" id="justification"  class="mt-1 resize-none p-2.5 bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-800 focus:ring-emerald-800  focus:border-emerald-800 rounded-lg  block w-full" cols="30" rows="2"></textarea>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                <div class="flex justify-center">
                    <button type="submit" class="bg-emerald-700 hover:bg-emerald-800 text-white font-semibold text-sm p-2 rounded shadow-sm ">Evaluar</button>
                </div>
                
            </form>
        </div>
    </div>
@endSection