@extends('layouts.app')
@section('content') 
    <div class="container bg-light pt-3">
        <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars" style="color: #018725;"><b>&nbsp;Options</b></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a href="/my_subjects" class="nav-item nav-link  btn btn-apply m-1"><i class="fa fa-arrow-left"></i> Go Back</a>
                    <a href="/tutor_profile/{{ $tutorID }}" class="nav-item nav-link  btn btn-apply m-1">View Tutor Profile</a>
                </div>
            </div>
        </nav>
        <hr>

        <div class="mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-sm-10 col-lg-10 m-auto">
                        <hr class="hr-border mt-4">
                        {{-- Subject Loop --}}
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
                                                                <a href="/add_submition/{{ $act->id }}/2" style="text-decoration: none;">
                                                                    <div class="activity-link p-3">
                                                                        <h5 class="text-color-title"><i class="fa fa-clipboard-list"></i><b>&nbsp;&nbsp;Assignment</b></h5>    
                                                                        <div class="text-margin-left-t">
                                                                            <h5 class="text-secondary"><b>{{ $act->title }}</b></h5>
                                                                            <h6 class="text-secondary"><strong>Due:</strong>{{ $act->description }}</h6>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                                @break
                                                            @case(2)
                                                                <a href="/download_file/{{ $act->file }}" style="text-decoration: none;">
                                                                    <div class="activity-link p-3">
                                                                        <h5 class="text-color-title"><i class="fa fa-file-upload"></i><b>&nbsp;&nbsp;Material</b></h5>
                                                                        <div class="text-margin-left-t">
                                                                            <h5 class="text-secondary"><b>{{ $act->title }}</b></h5>
                                                                            <h6 class="text-secondary">{{ $act->description }}</h6>
                                                                        </div>
                                                                        <div class="text-center">
                                                                            <h6 class="text-secondary" style="text-decoration: true;"><small>Click to download the file.</small></h6>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                                @break
                                                            @default
                                                                <a href="/view_meeting/{{ $act->id }}/1" style="text-decoration: none;">
                                                                    <div class="activity-link p-3">
                                                                        <h5 class="text-color-title"><i class="fa fa-calendar-alt"></i><b>&nbsp;&nbsp;Meeting</b></h5>
                                                                        <div class="text-margin-left-t">
                                                                            <h5 class="text-secondary"><b>{{ $act->title }}</b></h5>
                                                                            <h6 class="text-secondary"><strong>{{ $act->description }}</strong></h6>
                                                                            <h6 class="text-secondary">Schedule: <strong>{{ $act->date }} {{ $act->time }}</strong></h6>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                        @endswitch
                                                    </a> 
                                                    @foreach ($submitions as $submission)
                                                        @foreach ($submission as $submited)
                                                            @if ($submited->activityID == $act->id)
                                                                <div class="ml-5 p-3">
                                                                    <h5 class=""><i class="fa fa-calendar-alt"></i><b>&nbsp;&nbsp;Submitted</b></h5>
                                                                    <div class="text-margin-left-t">
                                                                        <h5 class="text-secondary"><b>{{ $submited->title }}</b></h5>
                                                                        <h6 class="text-secondary"><strong>Due:</strong>{{ $submited->description }}</h6>
                                                                        <h6 class="text-secondary">Submited: <strong>{{ $submited->created_at }}</strong></h6>
                                                                        <h6 class="text-secondary">Score: <strong>{{ $submited->score }}</strong></h6>
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
    </div>
@endsection