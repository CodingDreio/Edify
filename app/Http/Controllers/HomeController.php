<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\Notification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = 0;
        $id = Auth::id();

        $takenSub = DB::table('taken_subjects')->where('tutorID','=',$id)
            ->orWhere('tuteeID','=',$id)->get();
        
        $activities = collect([]);
        foreach($takenSub as $taken){
            $act = DB::table('activities')->where('takenID','=',$taken->id)->get();
            foreach($act as $activity){
                if($activity->status == 1 && $activity->type != 2){
                    $activities->push($activity);
                }
            }
        }
        // dd($activities);

        return view('home',['active'=>$active,'activities'=>$activities]);
    }

    // =================================================================================================
    //                                          Notification
    // =================================================================================================

    public function notification()
    {

        $active = 1;
        $id = Auth::id();
        $notifications = DB::table('notifications')
        ->join('activities','notifications.activityID','=','activities.id')
        ->select('notifications.*','activities.title')
        ->where('toID','=',$id)->get();
        return view('home',['active'=>$active,'notifications'=>$notifications]);
    }

    public function acceptReschedule(Request $request,$notifID,$activityID)
    {
        $date = $request->get('date');
        DB::table('activities')->where('id','=',$activityID)
            ->update(['date'=>$date,'time'=>$time]);
        
        $time = $request->get('time');
        DB::table('activities')->where('id','=',$activityID)
            ->update(['date'=>$date,'time'=>$time]);

        DB::table('notifications')->where('id','=',$notifID)->delete();

        return redirect()->route('notification');
    }

    public function rejectReschedule($notifID,$activityID)
    {

        $notif = DB::table('notifications')->where('id','=',$notifID)->get();
        $title = "Reschedule Meeting Was Decline";
        $description = "Your tutor may not be available on your proposed schedule.";

        foreach($notif as $notify){
            Notification::create([
                'activityID'=>$activityID,
                'fromID'=> $notify->toID,
                'toID'=>$notify->fromID,
                'type'=>4, //[1] Assignment [2] Req Meeting [3] Meeting [4] announcement
                'title'=>$title,
                'description'=>$description,
                'status'=>1, //1 for unread
            ]);
        }
        DB::table('notifications')->where('id','=',$notifID)->delete();

        return redirect()->route('notification');
    }

    public function removeNotif($notifID){
        DB::table('notifications')->where('id','=',$notifID)->delete();
        return redirect()->route('notification');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    
    public function timeFormat($time)
    {
        $timeSplit = explode(":", $time);
        $hr = $timeSplit[0];
        $min = $timeSplit[1];
        $m;

        if($hr >= 12){
            $m = "PM";
            $hr -= 12;
        }
        elseif($hr < 12){
            $m = "AM";
            if($hr==0){
                $hr = 12;
            }
        }
        else{
            $m = "PM";
        }
        $time = "".$hr.":".$min." ".$m;

        return $time;
    }
}
