@extends('layouts.app')

@section('content')
    <div class="container bg-light">
        @include('layouts.tuteeNav')
        @switch($active)
            @case(1)
                @include('pages.tuteeTimetable')
                @break
            @default
                {{-- Start My Tutees Body --}}

                {{-- Tutee Request --}}
                {{-- This part will show if there is a request --}}
                
                @if ($tuteeRequest->isNotEmpty())
                    <div class="mt-3">
                        <div class="card p-2">
                            <div class="card-body">
                                <h5 class="text-color-title"><b>Students who wants to be your tutee.<b></h5>
                                <h6 class="text-secondary">Please respond to their request as soon as you received it.</h6>
                                
                                @foreach ($tuteeRequest as $apply)
                                    <div class="row mt-4 ml-3">
                                        <div class="col-md-8 col-sm-8">
                                            <h6 class="text-color-title"><b>{{ $apply->name }}</b></h6>
                                            <h6 class="text-secondary">Applied Subject: <b>{{ $apply->subject }}</b></h6>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <form class="float-right m-1" action="/tutee_accept" method="POST">
                                                @csrf
                                                @method("POST")
                                                <input type="text" name="requestID" value="{{$apply->id}}" hidden>
                                                <button class="btn btn-apply" type="submit">Accept</button>
                                            </form>
                                            <form class="float-right m-1" action="/tutee_decline/{{ $apply->id }}" method="POST">
                                                @csrf
                                                @method("GET")
                                                <input type="text" name="requestID" value="{{$apply->id}}" hidden>
                                                <button class="btn btn-decline" type="submit">Decline</button>
                                            </form>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    @endif


                    {{-- Tutee List --}}
                    @if($myTutees->isNotEmpty())
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="text-center mt-3">
                                    <h3><b class="text-color-title">My Tutees</b></h3>
                                    <hr>
                                </div>
                                <div class="row">
                                    @foreach ($myTutees as $tutee)
                                        <div class="col-md-6 col-sm-6 col-lg-4" style="display:table;">
                                            <div class="card mt-3" style="display:table-cell;">
                                                <div class="card-body">
                                                    <div class="align-items-center text-center">
                                                        <div class="imgDiv">
                                                            <img src="{{ asset('img/'.$tutee->image) }}" alt="Profile Picture" class="rounded-circle imgProf">
                                                        </div>
                                                        <div class="mt-3">
                                                            <h5 class="text-color-title"><b>{{ $tutee->name }}</b></h5>
                                                            <hr>
                                                            <h5 class="text-secondary">Subject: <b class="text-color-title">{{ $tutee->subject }}</b></h5>
                                                            <h6 class="text-secondary">Schedule: <b>{{ $tutee->schedule }}</b></h6>
                                                            <a href="/tutee_class/{{ $tutee->id }}" class="btn btn-view-profile">View Class</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="text-center mt-3">
                                <h3><b class="text-color-title">My Tutees</b></h3>
                                <hr>
                            </div>
                            <div class="text-center mt-2">
                                <h5 class="text-secondary">You have no tutees yet.</h5>
                            </div>
                        </div>
                    </div>

                    @endif
                </div>











                {{-- End My Tutees Body --}}

        @endswitch
    </div>
@endsection