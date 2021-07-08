@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="card-body"> 
                <div>
                    <div class="items-align-center text-center">
                        <h3 class="text-color-title">Add Subject</h3>
                        <hr class="hr-border mb-3">
                    </div>
                    <div class="">
                        <form action="/subject" method="POST">
                            @csrf
                            <div class="form-group mt-2">
                                <label for="subjectInput"><b class="text-color-primary">Subject: </b></label>
                                <input class="form-control" type="text" name="subjectInput" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="descInput"><b class="text-color-primary">Description: </b></label>
                                <textarea class="form-control" type="text" name="descInput" rows="3" > </textarea>
                            </div>
                            <div class="form-group mt-2 row">
                                <div class="col-sm-3">
                                    <label for="dayInput"><b class="text-color-primary">Schedule: </b></label>
                                    <select class="form-control" name="dayInput" required>
                                        <option value="Sunday">Sunday</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                    </select>
                                </div>
                                <div  class="col-sm-3">
<<<<<<< HEAD
                                    <label for="fromInput"><b class="text-color-primary">From: </b></label>
                                    <input class="form-control" type="time" name="fromInput" required>
                                </div>
                                <div class="col-sm-3">
                                    <label for="toInput"><b class="text-color-primary">To: </b></label>
                                    <input class="form-control" type="time" name="toInput" required>
                                </div>
                                <div class="col-sm-3">
                                    <label for="slotInput"><b class="text-color-primary">Slots: </b></label>
=======
                                    <label for="fromInput"><b>From: </b></label>
                                    <input class="form-control" type="time" name="fromInput" required>
                                </div>
                                <div class="col-sm-3">
                                    <label for="toInput"><b>To: </b></label>
                                    <input class="form-control" type="time" name="toInput" required>
                                </div>
                                <div class="col-sm-3">
                                    <label for="slotInput"><b>Slots: </b></label>
>>>>>>> f828708f6e6bbeb2d3160828a8c701339fc57c53
                                    <input class="form-control" type="number" name="slotInput" required>
                                </div>
                            </div>
                            <div class="form-group mt-2">
<<<<<<< HEAD
                                <hr class="hr-border mt-4">
=======
                                <hr>
>>>>>>> f828708f6e6bbeb2d3160828a8c701339fc57c53
                                <div class="float-right">
                                    <a href="/profile" class="btn btn-secondary">Cancel</a>
                                    <input type="submit" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection