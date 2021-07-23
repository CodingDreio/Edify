@extends('layouts.app')
@section('content') 
    <div class="container bg-light pt-3">
        <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars" style="color: #018725;"><b>&nbsp;Options</b></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a href="/tutee" class="nav-item nav-link  btn btn-apply m-1"><i class="fa fa-arrow-left"></i> Go Back</a>
                    <a href="#tuteeProfile" class="nav-item nav-link btn btn-apply m-1" data-toggle="collapse">View Tutee's Information</a>
                    {{-- <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn btn-apply m-1" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Add Activity
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#"><i class="fa fa-clipboard-list mr-1"></i> Add Assignment</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="fa fa-file-upload mr-1"></i> Upload Material</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="fa fa-calendar-alt mr-1"></i> Set Meeting</a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </nav>
        <hr>

        <div id="tuteeProfile" class="collapse mt-3">
            @foreach ($tutee as $student)
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="align-items-center text-center">
                                    <div class="imgDiv">
                                        <img src="{{ asset('img/'.$student->image) }}" alt="Profile Picture" class="rounded-circle imgProf">
                                    </div>
                                    <div class="mt-3">
                                        <h4 class="text-color-title">{{ $student->name }}</h4>
                                        <p class="text-secondary mb-1">{{ $student->description }}</p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 border-left">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 align-items-center text-center mb-3 mt-2">
                                        <h4 class="text-color-title"><b>Profile Information</b></h4>
                                    </div>
                                    <div class="col-sm-3">
                                        <h6 class="mb-0 pl-2">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <h6 class="pl-2">{{ $student->name }}</h6>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0 pl-2">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <h6 class="pl-2">{{ $student->address }}</h6>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0 pl-2">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <h6 class="pl-2">{{ $student->email }}</h6>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0 pl-2">Mobile</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <h6 class="pl-2">{{ $student->mobile }}</h6>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0 pl-2">Sex</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <h6 class="pl-2">{{ $student->gender }}</h6>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <hr class="mb-5">
        </div>

        <div class="mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-9 col-lg-9 m-auto">
                        <hr class="hr-border mt-4">
                        {{-- Ssubject Loop --}}
                        @foreach ($subject as $sub)
                            <div class="mt-3">
                                <h3 class="text-color-title"><i class="fa fa-book"></i><b>&nbsp;&nbsp;Subject</b></h3>
                                <hr class="hr-border">
                                <div class="text-margin-left text-margin-right p-3">
                                    <h4 class="text-color-title"><i class="fa fa-book-open"></i>&nbsp;Subject Title:<b>&nbsp;&nbsp;{{ $sub->subject }}</b></h4>
                                    <h5 class="text-secondary">{{ $sub->description }} </h5>
                                    <h6 class="text-secondary">{{ $sub->schedule }}</h6>
                                </div>
                                <hr class="mt-3" style="">
                            </div>
                        @endforeach
                        <div class="mt-3">
                            <hr class="hr-border mt-4">
                            <h3 class="text-color-title"><i class="fa fa-book"></i><b>&nbsp;&nbsp;Topics</b></h3>
                            <hr class="hr-border">
                            {{-- Topics Loop --}}
                            @foreach ($topics as $topic)
                                <div class="text-margin-left text-margin-right">
                                    <div class="p-3">
                                        <h4 class="text-color-title"><i class="fa fa-book-open"></i>&nbsp;Topic Title:<b>&nbsp;&nbsp;{{ $topic->topic }}</b></h4>
                                        <h5 class="text-secondary">{{ $topic->description }}</h5>
                                        <div class="float-right">
                                            <div class="dropdown">
                                                <a class="btn btn-apply dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Add Activity
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    @foreach ($takenSubject as $taken)
                                                        <a class="dropdown-item" href="{{ route('addActivity',[$topic->id,$taken->id]) }}"><i class="fa fa-clipboard-list mr-1"></i> Add Assignment</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="{{ route('uploadMaterial',[$topic->id,$taken->id]) }}"><i class="fa fa-file-upload mr-1"></i> Upload Material</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="{{ route('setMeeting',[$topic->id,$taken->id]) }}"><i class="fa fa-calendar-alt mr-1"></i> Set Meeting</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="hr-border mt-5">
                                    <div class="text-margin-left text-margin-right mt-3">
                                        {{-- Activities Loop --}}
                                        @foreach ($activities as $activity)
                                            @foreach ($activity as $act)
                                                @if ($act->topicID == $topic->id)
                                                    <a href="#" style="text-decoration: none;">
                                                        @switch($act->type)
                                                            @case(1)
                                                                <div class="activity-link p-3">
                                                                    <h5 class="text-color-title"><i class="fa fa-clipboard-list"></i><b>&nbsp;&nbsp;Assignment</b></h5>    
                                                                    <div class="text-margin-left-t">
                                                                        <h5 class="text-secondary"><b>{{ $act->title }}</b></h5>
                                                                        <h6 class="text-secondary"><strong>Due:</strong>{{ $act->description }}</h6>
                                                                    </div>
                                                                </div>
                                                                @break
                                                            @case(2)
                                                                <div class="activity-link p-3">
                                                                    <h5 class="text-color-title"><i class="fa fa-file-upload"></i><b>&nbsp;&nbsp;Material</b></h5>
                                                                    <div class="text-margin-left-t">
                                                                        <h5 class="text-secondary"><b>{{ $act->title }}</b></h5>
                                                                        <h6 class="text-secondary">{{ $act->description }}</h6>
                                                                    </div>
                                                                </div>
                                                                @break 
                                                            @default
                                                                <div class="activity-link p-3">
                                                                    <h5 class="text-color-title"><i class="fa fa-calendar-alt"></i><b>&nbsp;&nbsp;Meeting</b></h5>
                                                                    <div class="text-margin-left-t">
                                                                        <h5 class="text-secondary"><b>{{ $act->title }}</b></h5>
                                                                        <h6 class="text-secondary"><strong>Due:</strong>{{ $act->description }}</h6>
                                                                    </div>
                                                                </div>
                                                        @endswitch
                                                    </a> 
                                                    @foreach ($submissions as $submit)
                                                        @foreach ($submit as $submited)
                                                            @if ($submited->activityID == $act->id)
                                                                <div class="ml-5 p-3">
                                                                    <h5 class=""><i class="fa fa-calendar-alt"></i><b>&nbsp;&nbsp;Submitted</b></h5>
                                                                    <div class="text-margin-left-t">
                                                                        <h5 class="text-secondary"><b>{{ $submited->title }}</b></h5>
                                                                        <h6 class="text-secondary"><strong></strong>{{ $submited->description }}</h6>
                                                                        <h6 class="text-secondary">Submited: <strong>{{ $submited->created_at }}</strong></h6>
                                                                        <h6 class="text-secondary">Score: <strong>{{ $submited->score }}</strong></h6>
                                                                    </div>
                                                                    <div>
                                                                        <a href="/download_submission/{{ $submited->file }}" class="btn btn-apply" style="text-decoration: none;">Download File</a>
                                                                        <a href="/view_submission/{{ $submited->id }}/{{ 1 }}/{{ $classID }}" class="btn btn-apply">Add Score</a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                    <hr>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </div>
                                    <hr class="hr-border mt-4">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>



        {{-- Modals --}}

        {{-- Add Assignment --}}
        <div class="modal fade" id="addAssignment" tabindex="-1" role="dialog" aria-labelledby="addAssignmentModal" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-color-title" id="exampleModalLabel">Add Assignment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            @csrf
                            @method("POST")

                            <label for="basic-url">Your vanity URL</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                                </div>
                                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Upload Material--}}
        <div class="modal fade" id="uploadMaterial" tabindex="-1" role="dialog" aria-labelledby="uploadMaterialModal" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-color-title" id="exampleModalLabel">Upload Material</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            @csrf
                            @method("POST")
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Set Meeting --}}
        <div class="modal fade" id="setMeeting" tabindex="-1" role="dialog" aria-labelledby="setMeetingModal" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-color-title" id="exampleModalLabel">Set Meeting</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            @csrf
                            @method("POST")
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection