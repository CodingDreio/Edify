<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-sm-7 col-md-7 col-lg-7 m-auto">
            <div class="mb-2">
                <h4 class="text-color-title"><b>Notification</b></h4>
                <hr class="hr-border">
            </div>
            <div class="p-2">
                @foreach ($notifications as $notifs)
                    @switch($notifs->type)
                        @case(1)
                            
                            @break
                        
                        @case(2)
                            <div>
                                <h5 class="text-color-title">Reschedule Meeting</h5>
                                <h6><b>{{ $notifs->title }}</b></h6>
                                <h6 class="text-secondary">Reason: <b>{{ $notifs->description }}</b></h6>
                                <h6 class="text-secondary">New Schedule: <b>{{ $notifs->date }} {{ $notifs->time }}</b></h6>
                                <hr>
                                <form action="/accept_reschedule/{{ $notifs->id }}/{{ $notifs->activityID }}" method="POST">
                                    @csrf
                                    @method("POST")
                                    <input type="text" name="date" value="{{ $notifs->date }}" hidden>
                                    <input type="text" name="time" value="{{ $notifs->time }}" hidden>
                                    <button type="submit" class="btn btn-apply float-right">Accept</button>
                                </form>
                                {{-- <a href="" class="btn btn-apply float-right mr-1">Accept</a> --}}
                                <a href="/reject_reschedule/{{ $notifs->id }}/{{ $notifs->activityID }}" class="btn btn-danger float-right mr-1">Reject</a>
                                <br><br>
                                <hr style="border: 1px solid green">
                            </div>
                            @break

                        @case(3)
                            <div>
                                <h5 class="text-color-title">{{ $notifs->title }}</h5>
                                <h6 class="text-secondary">{{ $notifs->description }}</h6>
                                <h6 class="text-secondary">Schedule: <b>{{ $notifs->date }} {{ $notifs->time }}</h6>
                                <hr>
                                <a href="/remove_notification/{{$notifs->id}}" class="btn btn-apply float-right mr-1">Remove</a>
                                <br><br>
                                <hr style="border: 1px solid green">
                            </div>
                            @break
                            
                        @case(4)
                            <div>
                                <h5 class="text-color-title">Reschedule Meeting Was Decline</h5>
                                <h6><b>{{ $notifs->title }}</b></h6>
                                <h6 class="text-secondary">{{ $notifs->description }}</h6>
                                <hr>
                                <a href="/remove_notification/{{$notifs->id}}" class="btn btn-apply float-right mr-1">Remove</a>
                                <br><br>
                                <hr style="border: 1px solid green">
                            </div>
                            @break
                    
                        @default

                    @endswitch
                @endforeach
            </div>
        </div>
    </div>
</div>