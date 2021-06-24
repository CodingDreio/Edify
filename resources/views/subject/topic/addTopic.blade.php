@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($subject as $sub)
            <div class="card mb-3">
                <div class="card-body"> 
                    <div class="items-align-center text-center">
                        <h3 style="color:#014e01">Subject</h3>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h4>Subject</h4>
                        </div>
                        <div class="col-md-9">
                            <h5><b>{{ $sub->subject }}</b></h5>
                        </div>
                        <div class="col-md-3">
                            <h4>Description</h4>
                        </div>
                        <div class="col-md-9">
                            <h5><b>{{ $sub->description }}</b></h5>
                        </div>
                        <div class="col-md-3">
                            <h4>Schedule</h4>
                        </div>
                        <div class="col-md-9">
                            <h5><b>{{ $sub->schedule }}</b></h5>
                        </div>
                        <div class="col-md-3">
                            <h4>Slot</h4>
                        </div>
                        <div class="col-md-9">
                            <h5><b>{{ $sub->slot }}</b></h5>
                        </div>
                    </div>
                </div>
            </div> 
        @endforeach
        <div class="card mb-3">
            <div class="card-body">
                <div class="items-align-center text-center">
                    <h3 style="color:#014e01">Topics</h3>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addTopicModal">
                            Add Topic
                        </button>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                    @foreach ($topic as $subTopic)
                        <div class="col-md-12">
                            <h4>{{ $subTopic->topic }}</h4>
                            <h5>{{ $subTopic->description }}</h4>
                            <hr>
                        </div>
                    @endforeach
                </div>
                <div>
                    <a href="/profile" class="btn btn-primary float-right">Done</a>
                </div>

            </div>
        </div>
    </div>

    {{-- Add Subject Modal --}}
    <div class="modal fade" id="addTopicModal" tabindex="-1" role="dialog" aria-labelledby="addTopicModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Topic</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="/topic" method="POST">
                        @csrf
                        <input class="form-control" type="text" name="idInput" value="{{ $sub->id }}" hidden>
                        <div class="form-group mt-2">
                            <label for="topicInput"><b>Topic:</b></label>
                            <input class="form-control" type="text" name="topicInput" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="topicDescInput"><b>Description:</b></label>
                            <input class="form-control" type="text" name="topicDescInput" required>
                        </div>
                        <div class="form-group mt-2 float-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Cancel">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                </div>
            </div> 
        </div>
    </div>
@endsection