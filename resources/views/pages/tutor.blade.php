@extends('layouts.app')

@section('content')
    <div class="container bg-light">
        @include('layouts.tutorNav')
        @switch($active)
            @case(1)
                @include('pages.tutorSubjects')
                @break
            @case(2)
                @include('pages.tutorTutors')
                @break
            @default
                <div class="container-fluid bg-light">
                    
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <div class="mt-5"> 
                                <h3 class="text-color-title">Coming Activities</h3>
                                <hr class="hr-border mt-3">
                            </div>
                            <div class="mt-3">
                                {{-- Coming Activities LOOP HERE --}}
                                @foreach ($comingDue as $activity)
                                    @switch($activity->type)
                                        @case(1)   
                                            <a href="/add_submition/{{ $activity->id }}/1" style="text-decoration: none;">
                                                <div class="activity-link p-3">
                                                    <h5 class="text-color-title"><i class="fa fa-clipboard-list"></i><b>&nbsp;&nbsp;Assignment</b></h5> 
                                                    <div class="text-margin-left-t">
                                                        <h5 class="text-secondary"><b>{{ $activity->title }}</b></h5>
                                                        <h6 class="text-secondary"><strong>Due: </strong>{{ $activity->date }} {{ $activity->time }}</h6>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr>
                                            @break
                                        @default
                                            <a href="/view_meeting/{{ $activity->id }}/1" style="text-decoration: none;">
                                                <div class="activity-link p-3">
                                                    <h5 class="text-color-title"><i class="fa fa-calendar-alt"></i><b>&nbsp;&nbsp;Meeting</b></h5>
                                                    <div class="text-margin-left-t">
                                                        <h5 class="text-secondary"><b>{{ $activity->title }}</b></h5>
                                                        <h6 class="text-secondary"><strong>Due: </strong>{{ $activity->date }} {{ $activity->time }}</h6>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr>
                                    @endswitch   
                                @endforeach
                                {{-- End Loop --}}
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <div class="mt-5"> 
                                <h3 class="text-color-title">Overdue Activities</h3>
                                <hr class="hr-border mt-3">
                            </div>
                            <div class="mt-3">
                                {{-- Coming Activities LOOP HERE --}}
                                @foreach ($overDue as $over)
                                    @switch($over->type)
                                        @case(1)   
                                            <a href="/add_submition/{{ $over->id }}/1" style="text-decoration: none;">
                                                <div class="activity-link p-3">
                                                    <h5 class="text-color-title"><i class="fa fa-clipboard-list"></i><b>&nbsp;&nbsp;Assignment</b></h5> 
                                                    <div class="text-margin-left-t">
                                                        <h5 class="text-secondary"><b>{{ $over->title }}</b></h5>
                                                        <h6 class="text-secondary"><strong>Due: </strong>{{ $over->date }} {{ $over->time }}</h6>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr>
                                            @break
                                        @default
                                            <a href="/view_meeting/{{ $over->id }}/1" style="text-decoration: none;">
                                                <div class="activity-link p-3">
                                                    <h5 class="text-color-title"><i class="fa fa-calendar-alt"></i><b>&nbsp;&nbsp;Meeting</b></h5>
                                                    <div class="text-margin-left-t">
                                                        <h5 class="text-secondary"><b>{{ $over->title }}</b></h5>
                                                        <h6 class="text-secondary"><strong>Due: </strong>{{ $over->date }} {{ $over->time }}</h6>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr>
                                    @endswitch   
                                @endforeach
                                {{-- End Loop --}}
                            </div>
                        </div>
                    </div>
                </div>
        @endswitch
        <div class="mt-5"><br><br></div>
    </div>
@endsection