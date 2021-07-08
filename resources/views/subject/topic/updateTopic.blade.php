@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($topic as $topicVal)
            <div class="row">
                <div class="col-md-9 col-sm-9 m-auto">     
                    <div class="align-items-center text-center mt-4">
                        <h4 class="text-color-title"><b>Edit Topic</b></h4>
                    </div>
                    <form action="/topic/{{ $topicVal->id }}" method="POST">
                        @csrf
                        @method("PUT")
                        <input class="form-control" type="text" name="subIDInput" value="{{ $topicVal->subjectID }}" hidden>
                        <div class="form-group mt-2">
                            <label for="topictInput"><b class="text-color-primary">Topic: </b></label>
                            <input class="form-control" type="text" name="topicInput" id="topicInput" value="{{ $topicVal->topic }}" required>        
                        </div><div class="form-group mt-2">
                            <label for="descInput"><b class="text-color-primary">Description: </b></label>
                            <textarea class="form-control" type="text" name="descInput" id="descInput" rows="3" >{{$topicVal->description}}</textarea>
                        </div>
                        <div class="form-group mt-2">
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary" id="saveChangesBtn">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection