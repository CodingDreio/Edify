@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.tutorNav')
        @switch($active)
            @case(1)
                @include('pages.tutorSubjects')
                @break
            @case(2)
                @include('pages.tutorTutors')
                @break
            @default
                <h1>Hello Timeline
                </h1>
        @endswitch
    </div>
@endsection