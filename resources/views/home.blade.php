@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-6 mt-2">
            <div class="btn-tutor-width m-auto">
                <a href="{{ route('tutor.index') }}" class="btn btn-tutor text-white w-100"> My Tutors</a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 mt-2">
            <div class="btn-tutor-width m-auto">
                <a href="{{ route('tutee.index') }}" class="btn btn-tutor text-white w-100"> My Tutees</a>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <hr>
        </div>
    </div>
</div>
@endsection