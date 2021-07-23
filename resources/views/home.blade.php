@extends('layouts.app')

@section('content')
<div class="container bg-light pt-4">
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
        <div class="col-md-12 col-sm-12">
            @include('layouts.homeTabsNav')
            @switch($active)
                @case(1)
                    @include('pages.notification')
                    @break
                @default
                    <div class="container-fluid pt-4">
                        <div class="row">
                            {{-- Loop For Activities --}}
                            @foreach ($activities as $activity)
                                {{-- Switch Here --}}
                                @switch($activity->type)
                                    @case(1)
                                        <div class="col-sm-6 col-md-6 col-lg-6 activity-link ">
                                            <a href="/add_submition/{{ $activity->id }}/2" style="text-decoration: none;">
                                                <div class="p-3">
                                                    <h4 class="text-color-title"><i class="fa fa-clipboard-list"></i><b>&nbsp;&nbsp;Assignment</b></h4> 
                                                    <div class="text-margin-left-t">
                                                        <h5 class="text-secondary"><b>{{ $activity->title }}</b></h5>
                                                        {{-- IF Description if not null --}}
                                                        @if($activity->description != NULL)
                                                            <h6 class="text-secondary"><b>{{ $activity->description }}</b></h6>
                                                        @endif
                                                        {{-- If file is not null --}}
                                                        @if ($activity->file != "NULL")
                                                            <h6><b><a href="/download_submission/{{ $activity->file }}" class="text-secondary">File: {{ $activity->file }}</a></b></h6>
                                                        @endif
                                                        <h6 class="text-secondary"><strong>Due: </strong>{{ $activity->date }} {{ $activity->time }}</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        @break
                                
                                    @default
                                        <div class="col-sm-6 col-md-6 col-lg-6 activity-link">
                                            <a href="/view_meeting/{{ $activity->id }}/2" style="text-decoration: none;">
                                                <div class=" p-3">
                                                    <h5 class="text-color-title"><i class="fa fa-calendar-alt"></i><b>&nbsp;&nbsp;Meeting</b></h5>
                                                    <div class="text-margin-left-t">
                                                        <h5 class="text-secondary"><b>{{ $activity->title }}</b></h5>
                                                        @if($activity->description != NULL)
                                                            <h6 class="text-secondary"><b>{{ $activity->description }}</b></h6>
                                                        @endif
                                                        <h6 class="text-secondary"><strong>Date: </strong>{{ $activity->date }} {{ $activity->time }}</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                {{-- End Switch --}}
                                @endswitch
                                {{-- End Loop --}}
                            @endforeach
                        </div>
                    </div>
                    <br><br><br><br><br>
            @endswitch
        </div>
    </div>
</div>
@endsection