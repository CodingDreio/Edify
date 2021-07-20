@extends('layouts.app')

@section('content')
    <div class="container bg-light">
        <div class="row">
            <div class="col-md-9 col-sm-9 col-ld-9 m-auto">
                <div class="mt-5 text-center">
                    <h3 class="text-color-title"><b>Upload Material</b></h3>
                    <hr class="mb-3 mt-3">
                </div>
                <h6 class="text-secondary">Please fill-out the form. (<b class="text-danger">*</b>) Required</h6>
                <br>
                
                <form action="/store_activity/7/23" method="POST">
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
                        <input type="file" class="form-control-file" id="file" name="file" required>
                    </div>

                    <hr>

                    <div class="form-group">
                        <button type="submit" class="btn btn-apply float-right mr-1">Submit</button>
                        <a href="/tutee_class/23" class="btn btn-danger float-right mr-1">Cancel</a>
                    </div>
                    <br><br><br>
                </form>
            </div>
        </div>
    </div>
@endsection