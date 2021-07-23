@extends('layouts.app')

@section('content')
    <div class="container bg-light">
        <div class="row">
            <div class="col-md-9 col-sm-9 col-ld-9 m-auto">
                <div class="mt-5 text-center">
                    <h3 class="text-color-title"><b>Add Submition Score</b></h3>
                    <hr class="mb-3 mt-3">
                </div>
                {{-- <h6 class="text-secondary">Please fill out the form. (<b class="text-danger">*</b>) Required</h6> --}}
                <br>
                <form action="/update_score/{{ $submission->id }}/{{ $classID }}"ethod="POST" enctype="multipart/form-data">
                    @csrf
                    @method("POST")

                    <div class="form-group">
                        <h5 class="text-color-title" for="title"><b>Title</b> </h5>
                        <div class="p-3" style="background-color: #f0f2fa">
                            <h5>{{ $submission->title }}</h5>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <h5 class="text-color-title" for="description"> <b>Description/Instruction</b></h5>
                        <div class="p-3" style="background-color: #f0f2fa">
                            <h5>{{ $submission->description }}</h5>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <h5 class="text-color-title" for="file"><b>File</b></h5>
                        <a href="/download_submission/{{ $submission->file }}" class="btn btn-apply" style="text-decoration: none;">File: {{ $submission->file }}</a>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-6">
                            <div class="form-group">
                                <h5 class="text-color-title" for="date"><b>Date Submitted</b> </h5>
                                <div class="p-3" style="background-color: #f0f2fa">
                                    <h5>{{ $submission->created_at }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="hr-border mt-3 mb-3">
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5 class="text-color-title" for="range">Score</h5>
                            <input type="number" class="form-control" name="score" placeholder="Score">
                        </div>
                        <div class="form-group col-md-6">
                            <h5 class="text-color-title" for="range">Out of</h5>
                            <input type="number" class="form-control" name="range" placeholder="Out of">
                        </div>
                    </div>
                    <hr>
                    <hr class="hr-border mt-5 mb-3">

                    <div class="form-group">
                        <button type="submit" class="btn btn-apply float-right mr-1">Submit</button>
                        @switch($page)
                            @case(1)
                                <a href="/tutee_class/{{ $classID }}" class="btn btn-danger float-right mr-1">Cancel</a>
                                @break
                            @default
                                {{-- <a href="/my_class/{{ $taken->subjectID }}/{{ $taken->tutorID }}/{{ $taken->tuteeID }}/{{ $page }}" class="btn btn-danger float-right mr-1">Cancel</a> --}}
                        @endswitch
                    </div>
                    <br><br><br><br><br>
                </form>
            </div>
        </div>
    </div>
@endsection