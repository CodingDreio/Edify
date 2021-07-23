@extends('layouts.app')

@section('content')
    <div class="container bg-light">
        <div class="pt-3">
            @include('layouts.tutorNav')
        </div>
        <hr>
        <div class="text-center pt-3">
            <h3 class="text-color-title">Search Result</h3>
        </div> <br>
        
        <div class="p-3">
            <h5 class="text-color-title">You search for <i style="color:dodgerblue;">"{{ $input }}"</i></h5>
            {{-- Tabs --}}
            <ul class="nav nav-tabs">
                <li class="nav-item li-hover">
                    <a href="#peopleSearch" class="nav-link tab-link-style active" role="tab" data-toggle="tab">People</a>
                </li>
                <li class="nav-item li-hover">
                    <a href="#subjectsSearch" class="nav-link tab-link-style" role="tab" data-toggle="tab">Subjects</a>
                </li>
            </ul>

            {{-- Tab Contents --}}
            <div class="tab-content container-fluid">

                {{-- People Search Results --}}
                <div class="tab-pane active" role="tabpanel" id="peopleSearch">
                    <div class="row mt-3">
                        @forelse ($users as $user)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="align-items-center text-center">
                                            <div class="imgDiv">
                                                <img src="{{ asset('img/'.$user->image) }}" alt="Profile Picture" class="rounded-circle imgProf">
                                            </div>
                                            <div class="mt-3">
                                                <h4 class="text-color-title">{{ $user->name }}</h4>
                                                <p class="text-secondary mb-1">{{ $user->description }}</p>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <h6>Tutees</h6>
                                                        <h4>3</h4>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <h6>Tutored</h6>
                                                        <h4>18</h4>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <h6>Ratings</h6>
                                                        <h4>4.8</h4>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        {{-- <form action="/tutor_profile/{{ $user->id }}" method="POST">
                                                            @csrf
                                                            @method('POST')
                                                            <input type="text" name="tutorID" id="tutorID" value="{{ $user->id }}" hidden>
                                                            <button type="submit" class="btn btn-view-profile">View Profile</button>
                                                        </form> --}}
                                                        <a href="/tutor_profile/{{ $user->id }}" class="btn btn-view-profile">View Profile</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12 text-center">
                                <h5>No people found! See subjects result.</h5>
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- Subjects Search Results --}}
                <div class="tab-pane" role="tabpanel" id="subjectsSearch">
                    <div class="row mt-3">
                        @forelse ($subjects as $subject)
                            <div class="col-md-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div>
                                            <h5 class="result-subject-text-primary">{{ $subject->subject }}</h5>
                                            <h6 class="result-subject-text-secondary">{{ $subject->description }}</h6>
                                        </div>
                                        <hr>
                                        <div>
                                            <h6 class="text-secondary"><strong>Tutor:</strong></h6>
                                            <h5 class="result-subject-text-primary pl-3"><b>{{ $subject->name }}</b></h5>
                                            <div class="text-center">
                                                <a href="/tutor_profile/{{ $subject->userID }}" class="btn btn-view-profile">View Profile</a>
                                            </div>
                                        </div>
                                        <div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12 text-center">
                                <h5>No subjects found! See people result.</h5>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection