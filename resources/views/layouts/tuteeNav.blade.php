<div>
    <nav class="navbar nav-pills navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-chalkboard-teacher" style="color: #018725">&nbsp;&nbsp;My Tutors</span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <div class="navbar-nav mr-auto">
                {{-- @switch($active)
                    @case(1)
                        <a class="nav-item nav-link" style="color: #018725;font-weight:bold;" href="{{ route('tutee.index') }}">My Tutees</a>
                        <a class="nav-item nav-link  active text-white" style="font-weight:bold;" href="{{ route('myTuteesTimetable') }}">Timetable</a>
                        @break

                    @case(2)
                        <a class="nav-item nav-link" style="color: #018725;font-weight:bold;" href="{{ route('tutee.index') }}">My Tutees</a>
                        <a class="nav-item nav-link" style="color: #018725;font-weight:bold;" href="{{ route('myTuteesTimetable') }}">Timetable</a>
                        @break

                    @default
                        <a class="nav-item nav-link active text-white" style="font-weight:bold;" href="{{ route('tutee.index') }}">My Tutees</a>
                        <a class="nav-item nav-link" style="color: #018725;font-weight:bold;" href="{{ route('myTuteesTimetable') }}">Timetable</a>
                @endswitch --}}
            </div>
            <form class="form-inline my-2 my-lg-0" action="/search_result" method="POST">
                @csrf
                @method("GET")
                <input type="text" value="{{ $active }}" name="active" hidden>
                <input type="text" class="form-control mr-sm-1" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-search my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</div>