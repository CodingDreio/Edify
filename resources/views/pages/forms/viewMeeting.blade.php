@extends('layouts.app')

@section('content')
    <div class="container bg-light">
        <div class="row">
            <div class="col-md-7 col-sm-7 col-lg-7 m-auto">
                <div class="">
                    <div class="mt-5 text-center">
                        <h3 class="text-color-title"><b>View Meeting</b></h3>
                        <hr class="hr-border mb-3 mt-3">
                    </div>
                    @foreach ($meeting as $meet)
                        <div class="form-group">
                            <h5 class="text-color-title" for="title"> <b>Title</b></h5>
                            <div class="p-3" style="background-color: #f0f2fa">
                                <h5>{{ $meet->title }}</h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5 class="text-color-title" for="description"> <b>Description</b></h5>
                            <div class="p-3" style="background-color: #f0f2fa">
                                <h5>{{ $meet->description }}</h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5 class="text-color-title" for="description"> <b>Date</b></h5>
                            <div class="p-3" style="background-color: #f0f2fa">
                                <h5>{{ $meet->date }} {{ $meet->time }}</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            @switch($page)
                                @case(1)
                                    <a href="#" type="button" class="btn btn-apply float-right mr-1" data-toggle="modal" data-target="#requestSched">Request Reschedule</a>
                                    <a href="{{ route('tutor.index') }}" class="btn btn-apply float-right mr-1">
                                        <i class="fa fa-arrow-left mr-1"></i>Back</a>
                                    @break
                                @default
                                    <a href="#" type="button" class="btn btn-apply float-right mr-1" data-toggle="modal" data-target="#requestSched">Request Reschedule</a>
                                    <a href="{{ route('tutor.index') }}" class="btn btn-apply float-right mr-1">
                                        <i class="fa fa-arrow-left mr-1"></i>Back</a>
                            @endswitch
                        </div>
                    @endforeach
                    <br><br><br><br><br><br>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="requestSched" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Request Reschedule</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 class="text-secondary">Please input your prefered schedule.</h6>
                    <form action="/request_resched/{{ $activityID }}/{{$page}}" method="POST">
                        @csrf
                        @method("POST")
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label class="text-color-title" for="desc"><b>Reason</b> (<b class="text-danger">*</b>)</label>
                                    <textarea type="text" class="form-control" id="desc" name="desc" required></textarea>
                                </div>
                            </div>
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
                        <div class="form-group">
                            <button type="submit" class="btn btn-apply float-right mr-1">Request</button>
                            <button type="button" class="btn btn-secondary float-right mr-1" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
@endsection