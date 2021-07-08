@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($subject as $sub)
                <div class="col-md-12 col-sm-12">
                    <a href="{{ route("profile.index") }}" class="btn btn-primary text-white">
                        <i class="fa fa-arrow-circle-left mr-2"></i>
                        Back
                    </a>
                </div>
                <div class="col-md-12 col-sm-12">      
                    <div class="align-items-center text-center mt-4">
                        <h4 class="text-color-title"><b>Edit Subject</b></h4>
                    </div>
                    <hr class="hr-border mt-4">
                    <div class="row">
                        <div class="col-md-9 col-sm-9 m-auto">
                            <form action="/subject/{{ $sub->id }}" method="POST" id="subjectForm">
                                @csrf
                                @method("PUT")
                                <div class="form-group mt-2">
                                    <label for="subjectInput"><b class="text-color-primary">Subject: </b></label>
                                    <input class="form-control" type="text" name="subjectInput" id="subjectInput" value="{{ $sub->subject }}" required>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="descInput"><b class="text-color-primary">Description: </b></label>
                                    <textarea class="form-control" type="text" name="descInput" id="descInput" rows="3" >{{$sub->description}}</textarea>
                                </div>
                                <div class="form-group mt-2 row">
                                    @php
                                        $sched = $sub->schedule;
                                        $splitSched = explode(" ",$sched);
                                    @endphp
                                    <div class="col-sm-3">
                                        <label for="dayInput"><b class="text-color-primary">Schedule: </b></label>
                                        <select class="form-control" name="dayInput" id="dayInput"  required>
                                            @if ($splitSched[0] == "Sunday")
                                                <option value="Sunday" selected>Sunday</option>
                                            @else
                                                <option value="Sunday">Sunday</option>
                                            @endif

                                            @if ($splitSched[0] == "Monday")
                                                <option value="Monday" selected>Monday</option>
                                            @else
                                                <option value="Monday">Monday</option>
                                            @endif

                                            @if ($splitSched[0] == "Tuesday")
                                                <option value="Tuesday" selected>Tuesday</option>
                                            @else
                                                <option value="Tuesday">Tuesday</option>
                                            @endif

                                            @if ($splitSched[0] == "Wednesday")
                                                <option value="Wednesday" selected>Wednesday</option>
                                            @else
                                                <option value="Wednesday">Wednesday</option>
                                            @endif
                                            
                                            @if ($splitSched[0] == "Thursday")
                                                <option value="Thursday" selected>Thursday</option>
                                            @else
                                                <option value="Thursday">Thursday</option>
                                            @endif
                                            
                                            @if ($splitSched[0] == "Friday")
                                                <option value="Friday" selected>Friday</option>
                                            @else
                                                <option value="Friday">Friday</option>
                                            @endif

                                            @if ($splitSched[0] == "Saturday")
                                                <option value="Saturday" selected>Saturday</option>
                                            @else
                                                <option value="Saturday">Saturday</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div  class="col-sm-3">
                                        <label for="fromInput"><b class="text-color-primary">From: </b></label>
                                        <input class="form-control" type="time" name="fromInput" id="fromInput" value="{{ $splitSched[1] }}" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="toInput"><b class="text-color-primary">To: </b></label>
                                        <input class="form-control" type="time" name="toInput" id="toInput" value="{{ $splitSched[3] }}" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="slotInput"><b class="text-color-primary">Slots: </b></label>
                                        <input class="form-control" type="number" name="slotInput" id="slotInput" value="{{ $sub->slot }}" required>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary" id="saveChangesBtn">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 mt-4">
                    <div class="align-items-center text-center mt-4">
                        <h4 class="text-color-title"><b>Topics</b></h4>
                    </div>
                    <hr class="hr-border mt-4">
                    <div class="m-3">
                        <div class="row">
                            <div class="col-md-9 col-sm-9 m-auto pb-4">
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addTopicModal">
                                    Add Topic
                                </button>
                            </div>
                            <div class="col-md-9 col-sm-9 m-auto">
                                @if (sizeof($topics) > 0)
                                    @foreach ($topics as $topicVal)
                                        <div class="mb-3 bg-white p-3">
                                            <a class="float-right mr-1" href="/topic/{{ $topicVal->id }}/edit ">
                                                <i class="fa fa-edit" style="color: #007c00"></i>
                                                <b class="text-color-edit">Edit</b>
                                            </a>
                                            <h6 class="text-color-primary"><b>{{ $topicVal->topic }}</b></h6>
                                            <h6>{{ $topicVal->description }}</h6>
                                            <form action="/topic/{{ $topicVal->id }}" method="POST">
                                                @csrf
                                                @method("delete")
                                                <button type="submit" class="btn-remove-topic text-color-remove float-right">
                                                    <i class="fa fa-trash  text-color-remove"></i>
                                                    Remove
                                                </button>
                                            </form>
                                            <div class="mb-4"></div>
                                        </div>                                        
                                    @endforeach
                                @else
                                    <div class="text-center align-items-center">
                                        <h5>No topics added</h5>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <hr class="hr-border mt-4">
                </div>
                <div class="col-md-11 col-sm-11 m-auto">
                    <a href="{{ route("profile.index") }}" class="btn btn-primary text-white float-right">
                        <i class="fa fa-arrow-circle-left mr-2"></i>
                        Back
                    </a>
                    <button type="button" class="btn btn-danger text-white float-right mr-3" data-toggle="modal" data-target="#removeSubjectModal">
                        <i class="fa fa-trash mr-2"></i>
                            Remove Subject
                    </button>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Modal Remove Subject Confirmation --}}
    <div class="modal fade" id="removeSubjectModal" tabindex="-1" role="dialog" aria-labelledby="removeSubjectModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="removeSubjectModalLabel"><h3>Remove Subject</h3></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <h4>
                            Are you sure you want to permanently remove this subject?
                        </h4>
                        <h5>
                            This will also permanently remove the topics integrated with this subject.
                        </h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="/subject/{{ $sub->id }}" method="POST">
                        @csrf
                        @method("delete")
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash mr-2"></i>
                            Confirm
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Topic Modal --}}
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

    


    {{-- Modal Remove Topic Confirmation
    <div class="modal fade" id="removeTopicModal" tabindex="-1" role="dialog" aria-labelledby="removeTopicModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="removeSubjectModalLabel"><h3>Remove Topic</h3></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <h4>
                            Are you sure you want to permanently remove this topic?
                        </h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="/topic/{{ $sub->id }}" method="POST">
                        @csrf
                        @method("delete")
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash mr-2"></i>
                            Confirm
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

<script type="text/javascript">

</script>
