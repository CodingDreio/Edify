@extends('layouts.app')

@section('content')
    <div class="container bg-light">
        <div class="row">
            <div class="col-md-9 col-sm-9 col-ld-9 m-auto">
                <div class="mt-5 text-center">
                    <h3 class="text-color-title"><b>Add Submition</b></h3>
                    <hr class="mb-3 mt-3">
                </div>
                {{-- <h6 class="text-secondary">Please fill out the form. (<b class="text-danger">*</b>) Required</h6> --}}
                <br>
                @foreach ($activity as $act)
                    
                @endforeach
                <form action="/store_submission/{{ $activityID }}/{{ $page }}/{{ $taken->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("POST")

                    <div class="form-group">
                        <h5 class="text-color-title" for="title"><b>Title</b> </h5>
                        <div class="p-3" style="background-color: #f0f2fa">
                            <h5>{{ $act->title }}</h5>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <h5 class="text-color-title" for="description"> <b>Description/Instruction</b></h5>
                        <div class="p-3" style="background-color: #f0f2fa">
                            <h5>{{ $act->description }}</h5>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        @if ($act->file != NULL)
                            <h5 class="text-color-title" for="file"><b>File</b></h5>
                            <div class="p-3" style="background-color: #f0f2fa">
                                @if ($act->file != "NULL")
                                    <h5><a href="/download_submission/{{ $act->file }}">{{ $act->file }}</a></h5>
                                @endif
                            </div>
                        @endif
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-6">
                            <div class="form-group">
                                <h5 class="text-color-title" for="date"><b>Date</b> </h5>
                                <div class="p-3" style="background-color: #f0f2fa">
                                    <h5>{{ $act->date }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6">
                            <div class="form-group">
                                <h5 class="text-color-title" for="time"><b>Time</b></h5>
                                <div class="p-3" style="background-color: #f0f2fa">
                                    <h5>{{ $act->time }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="hr-border mt-3 mb-3">
                    
                    <div class="form-group">
                        <label class="text-color-title" for="title"><b>Title</b> </label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submition title" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="text-color-title" for="description"><b>Description</b> </label>
                        <textarea type="text" class="form-control" id="description" name="description" rows="3" placeholder="Submition description"></textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="text-color-title" for="title"><b>Description</b> </label>
                        <input type="file" class="form-control-file" id="file" name="file">
                    </div>
                    <hr class="hr-border mt-5 mb-3">

                    <div class="form-group">
                        <button type="submit" class="btn btn-apply float-right mr-1">Submit</button>
                        @switch($page)
                            @case(1)
                                <a href="{{ route('tutor.index') }}" class="btn btn-danger float-right mr-1">Cancel</a>
                                @break
                            @case(2)
                                <a href="{{ route('home') }}" class="btn btn-danger float-right mr-1">Cancel</a>
                                @break
                            @default
                                <a href="/my_class/{{ $taken->subjectID }}/{{ $taken->tutorID }}/{{ $taken->tuteeID }}/{{ $page }}" class="btn btn-danger float-right mr-1">Cancel</a>
                        @endswitch
                    </div>
                    <br><br><br><br><br>
                </form>
            </div>
        </div>
    </div>
@endsection