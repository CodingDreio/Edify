<div class="container-fluid bg-light">
    <div class="mt-5"> 
        <h3 class="text-color-title"><b>My Tutors</b></h3>
        <hr class="hr-border mt-3 mb-5">
    </div>
    <div class="row">
        {{-- LOOP HERE --}}
        <div class="col-md-4 col-sm-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="align-items-center text-center">
                        <div class="imgDiv">
                            <img src="{{ asset('img/') }}" alt="Profile Picture" class="rounded-circle imgProf">
                        </div>
                        <div class="mt-3">
                            <h4 class="text-color-title">NAme</h4>
                            <p class="text-secondary mb-1">asfadfgdagd</p>
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
                                    <a href="/tutor_profile/" class="btn btn-view-profile">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- END LOOP --}}
    </div>
</div>