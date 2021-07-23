<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\TakenSubjects;
use App\Models\Activity;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\User;

class TuteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = 0;
        $tutorID = Auth::id();

        $tuteeRequest = DB::table('subjects')
            ->rightJoin('taken_subjects', 'taken_subjects.subjectID','=','subjects.id')
            ->rightJoin('users','taken_subjects.tuteeID','=','users.id')
            ->select('subjects.*','taken_subjects.*','users.name')
            ->where('taken_subjects.tutorID','=',$tutorID)
            ->where('taken_subjects.status','=',1)
            ->get();
        // dd($tuteeRequest);

        $myTutees = DB::table('subjects')
        ->rightJoin('taken_subjects', 'taken_subjects.subjectID','=','subjects.id')
        ->rightJoin('users','taken_subjects.tuteeID','=','users.id')
        ->select('subjects.*','taken_subjects.*','users.name','users.image')
        ->where('taken_subjects.tutorID','=',$tutorID)
        ->where('taken_subjects.status','=',2)
        ->get();
        // dd($myTutees);
        
        return view('pages.tutee',['active'=>$active,'tuteeRequest'=>$tuteeRequest,'myTutees'=>$myTutees]);
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
        TakenSubjects::find($id)->delete();
        return redirect()->route('tutee.index');
    }

    public function acceptTutee(Request $request){
        // dd('Hey');
        DB::table('taken_subjects')
            ->where('id', $request->input('requestID'))
            ->update(['status' => 2]);
        
        $subject = DB::table('taken_subjects')->select('subjectID')->where('id', $request->input('requestID'))->get();
        foreach($subject as $sub){
            $slot = DB::table('subjects')->select('slot')->where('id','=',$sub->subjectID)->get();
            foreach($slot as $slots){
                $cnt = $slots->slot - 1;
                DB::table('subjects')
                    ->where('id', $sub->subjectID)
                    ->update(['slot' => $cnt]);
            }
        }
        
        return redirect()->route('tutee.index');
    }

    public function myTuteesTimetable()
    {
        $active = 1;

        return view('pages.tutee',['active'=>$active]);
    }

    public function viewTuteeClass($classID)
    {   
        
        $takenSub = TakenSubjects::where('id','=',$classID)->get();
        $tutee;
        $subject;
        foreach($takenSub as $taken){
            $subject = Subject::where('id','=',$taken->subjectID)->get();
            $tutee = User::where('id','=',$taken->tuteeID)->get();
        }

        $topics;

        foreach($subject as $sub){
            $topics = Topic::where('subjectID','=',$sub->id)->get();
        }

        $activityList  = collect([]);
        $submitionList = collect([]);
        foreach($topics as $topic){
            $activities = Activity::where('topicID','=',$topic->id)->get();
            $activityList->push($activities);
            foreach($activities as $act){
                $submit = DB::table('submitions')->where('activityID','=',$act->id)->get();
                if($submit->isNotEmpty()){
                    $submitionList->push($submit);
                }
            }
        }
        // dd($submitionList);

        return view('pages.tuteeClass',['tutee'=>$tutee,'takenSubject'=>$takenSub,'subject'=>$subject,'topics'=>$topics,'activities'=>$activityList,'submissions'=>$submitionList,'classID'=>$classID]);
    }


    // ====================================================================================
    // View Forms
    // ====================================================================================

    public function addActivity($tutorID,$takenID)
    {   
        return view('pages.forms.addActivity',['topicID'=>$tutorID,'takenID'=>$takenID]);
    }
    
    public function viewSubmission($submissionID,$page,$classID)
    {   
        $submission = DB::table('submitions')->where('id','=',$submissionID)->get();
        $submited;
        foreach($submission as $sub){
            $submited = $sub;
        }
        return view('pages.forms.viewSubmission',['submission'=>$submited,'page'=>$page,'classID'=>$classID]);
    }
    
    public function uploadMaterial($tutorID,$takenID)
    {
        return view('pages.forms.uploadMaterial',['topicID'=>$tutorID,'takenID'=>$takenID]);
    }
    
    public function setMeeting($tutorID,$takenID)
    {
        return view('pages.forms.setMeeting',['topicID'=>$tutorID,'takenID'=>$takenID]);
    }

    
    // ====================================================================================
    // Store Data From Forms
    // ====================================================================================

    public function storeActivity(Request $request,$topicID,$takenID)
    {   
        $time = $this->timeFormat($request->get('time'));
        
        $file = $request->file('file');
        $fileName;
        if($file == null){
            $fileName = "NULL";
        }else{
            $fileName = "Assignment"." ".$request->get('title')."-".time().'-'.$takenID.'-'.$topicID.'.'.$request->file('file')->extension();
            $request->file('file')->move(public_path('files'),$fileName);
        }

        $store = Activity::create([
            'topicID'=>$topicID,
            'takenID'=>$takenID,
            'type'=>1,
            'title'=>$request->get('title'),
            'description'=>$request->get('description'),
            'date' => $request->get('date'),
            'time'=>$time,
            'file'=>$fileName,
        ]);

        return redirect()->route('viewTuteeClass',$takenID);
    }

    public function updateScore(Request $request,$submissionID,$classID){

        $score = $request->get('score')." out of ".$request->get('range');
        DB::table('submitions')->where('id','=',$submissionID)->update(['score'=>$score]);
        return redirect()->route('viewTuteeClass',[$classID]);
    }
    
    public function storeMaterial(Request $request,$topicID,$takenID)
    {
        $file = $request->file('file');
        
        $fileName;
        if($file == null){
            $fileName = NULL;
        }else{
            $fileName = "Learning Material"." ".$request->get('title')."-".time().'-'.$takenID.'-'.$topicID.'.'.$request->file('file')->extension();
            $request->file('file')->move(public_path('files'),$fileName);
        }

        $store = Activity::create([
            'topicID'=>$topicID,
            'takenID'=>$takenID,
            'type'=>2,
            'title'=>$request->get('title'),
            'description'=>$request->get('description'),
            'file'=>$fileName,
        ]);
        return redirect()->route('viewTuteeClass',$takenID);
    }
    
    public function storeMeeting(Request $request,$topicID,$takenID)
    {
        $time = $this->timeFormat($request->get('time'));

        $store = Activity::create([
            'topicID'=>$topicID,
            'takenID'=>$takenID,
            'type'=>3,
            'title'=>$request->get('title'),
            'description'=>$request->get('description'),
            'date' => $request->get('date'),
            'time'=>$time,
        ]);

        return redirect()->route('viewTuteeClass',$takenID);
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

    public function downloadSubmission(Request $request,$file){
        return response()->download(public_path("files/".$file));
    }
}
