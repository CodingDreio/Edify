<div class="container-fluid">
    <div class="mt-5"> 
        <h3 class="text-color-title"><b>My Taken Subjects</b></h3>
        <hr class="hr-border mt-3">
    </div>
    <div class="row">
        @foreach ($subTaken as $subject)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div>
                            <h5 class="result-subject-text-primary"><b>{{ $subject->subject }}</b></h5>
                            <h6 class="result-subject-text-secondary">{{ $subject->description }}</h6>
                            <h6 class="result-subject-text-secondary">Schedule: <strong>{{ $subject->schedule }}</strong> </h6>
                        </div>
                        <hr>
                        <h6 class="result-subject-text-primary">Tutor: <b>{{ $subject->name }}</b></h6>
                        <hr>
                        <div class="text-center">
                            <a href="/my_class/{{ $subject->subjectID }}/{{ $subject->tutorID }}/{{ $subject->tuteeID }}/2" class="btn btn-view-profile">View Class</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>