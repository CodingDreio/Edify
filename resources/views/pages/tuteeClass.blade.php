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
                    <div class="nav-item dropdown">
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
                    </div>
                </div>
            </div>
        </nav>
        <hr>

        <div id="tuteeProfile" class="collapse mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="align-items-center text-center">
                                <div class="imgDiv">
                                    <img src="{{ asset('img/user_default.png') }}" alt="Profile Picture" class="rounded-circle imgProf">
                                </div>
                                <div class="mt-3">
                                    <h4 class="text-color-title">Name</h4>
                                    <p class="text-secondary mb-1">Description</p>
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
                                    <h6 class="pl-2">adsdkgm,adf</h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0 pl-2">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6 class="pl-2">adfsdfsdf</h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0 pl-2">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6 class="pl-2">adsfasdfads</h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0 pl-2">Mobile</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6 class="pl-2">asdfasdfad</h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0 pl-2">Sex</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6 class="pl-2">asfasdfasdf</h6>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-9 col-lg-9 m-auto">
                        <div class="mt-3">
                            <h3 class="text-color-title"><i class="fa fa-book"></i><b>&nbsp;&nbsp;Subject</b></h3>
                            <hr class="mt-3" style="">
                            <div class="text-margin-left text-margin-right p-3">
                                <h4 class="text-color-title"><i class="fa fa-book-open"></i><b>&nbsp;&nbsp;The Contemporary World</b></h4>
                                <h5 class="text-secondary">Decription </h5>
                                <h6 class="text-secondary">Subject Schedule</h6>
                            </div>
                            <hr class="mt-3" style="">
                        </div>
                        <div class="mt-3">
                            <h3 class="text-color-title"><i class="fa fa-book"></i><b>&nbsp;&nbsp;Topics</b></h3>
                            <hr class="mt-3" style="">
                            {{-- Loop Start Here --}}
                            <div class="text-margin-left text-margin-right">
                                <div class="p-3">
                                    <h4 class="text-color-title"><i class="fa fa-book-open"></i><b>&nbsp;&nbsp;Topic Title Here</b></h4>
                                    <h5 class="text-secondary">Topic Description here</h5>
                                    <div class="float-right">
                                        <div class="dropdown">
                                            <a class="btn btn-apply dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Add Activity
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="/add_activity/7/23"><i class="fa fa-clipboard-list mr-1"></i> Add Assignment</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="/upload_material/7/23"><i class="fa fa-file-upload mr-1"></i> Upload Material</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="/set_meeting/7/23"><i class="fa fa-calendar-alt mr-1"></i> Set Meeting</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mt-5">
                                <div class="text-margin-left text-margin-right mt-3">
                                    {{-- Loop Start Here --}}
                                    <a href="#" style="text-decoration: none;">
                                        <div class="activity-link p-3">
                                            <h5 class="text-color-title"><i class="fa fa-clipboard-list"></i><b>&nbsp;&nbsp;Assignment</b></h5>
                                            <div class="text-margin-left-t">
                                                <h5 class="text-secondary"><b>Assignment Title</b></h5>
                                                <h6 class="text-secondary"><strong>Due:</strong> Assignment Due</h6>
                                            </div>
                                        </div>
                                    </a> 
                                    <hr>
                                    <a href="#" class="" style="text-decoration: none;">
                                        <div class="activity-link p-3">
                                            <h5 class="text-color-title"><i class="fa fa-file-upload"></i><b>&nbsp;&nbsp;Material</b></h5>
                                            <div class="text-margin-left-t">
                                                <h5 class="text-secondary"><b>Material Title</b></h5>
                                                <h6 class="text-secondary">Description</h6>
                                            </div>
                                        </div>
                                    </a>
                                    <hr>
                                    <a href="#" class="" style="text-decoration: none;">
                                        <div class="activity-link p-3">
                                            <h5 class="text-color-title"><i class="fa fa-calendar-alt"></i><b>&nbsp;&nbsp;Assignment</b></h5>
                                            <div class="text-margin-left-t">
                                                <h5 class="text-secondary"><b>Assignment Title</b></h5>
                                                <h6 class="text-secondary"><strong>Due:</strong> Assignment Due</h6>
                                            </div>
                                        </div>
                                    </a> 
                                    
                                    {{-- Loop Ends Here --}}
                                </div>
                            </div>
                            {{-- Loop Ends Here --}}
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