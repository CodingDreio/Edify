@extends('layouts.app')

@section('content')
    <div class="container bg-light">
        <div class="row">
            <div class="col-md-9 col-sm-9 col-ld-9 m-auto">
                <div class="mt-5 text-center">
                    <h3 class="text-color-title"><b>Add Assignment</b></h3>
                    <hr class="mb-3 mt-3">
                </div>
                <h6 class="text-secondary">Please fill out the form. (<b class="text-danger">*</b>) Required</h6>
                <br>
                
                <form action="/store_activity/{{ $topicID }}/{{ $takenID }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("POST")

                    <div class="form-group">
                        <label class="text-color-title" for="title"><b>Title</b> (<b class="text-danger">*</b>)</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Input Assignment Title" required>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label class="text-color-title" for="description"> <b>Descriptio/Instruction</b> (<b class="text-danger">*</b>)</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Input Description/Instructions" required></textarea>    
                    </div>

                    <hr>

                    <div class="form-group">
                        <label class="text-color-title" for="file"><b>File</b></label>
                        <input type="file" class="form-control-file" id="file" name="file" accept="">
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-6">
                            <div class="form-group">
                                <label class="text-color-title" for="date"><b>Date</b> (<b class="text-danger">*</b>)</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6">
                            <div class="form-group">
                                <label class="text-color-title" for="time"><b>Time</b> (<b class="text-danger">*</b>)</label>
                                <input type="time" class="form-control" id="time" name="time" required>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <button type="submit" class="btn btn-apply float-right mr-1">Submit</button>
                        <a href="/tutee_class/{{ $takenID }}" class="btn btn-danger float-right mr-1">Cancel</a>
                    </div>
                    <br><br><br>
                </form>
            </div>
        </div>
    </div>
@endsection