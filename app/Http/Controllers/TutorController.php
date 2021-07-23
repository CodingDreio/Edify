<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Topic;
use App\Models\Subject;
use App\Models\TakenSubjects;
use App\Models\Activity;
use App\Models\Submition;
use App\Models\Notification;
use Carbon\Carbon;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = 0;
        $id = Auth::id();
                
        $date = Carbon::now();
        $date->toDateTimeString();
        $date = $date."";
        $dateSplit = explode(" ", $date);
        $date = $dateSplit[0];
        // dd($date);
        
        $takenSub = TakenSubjects::where('tuteeID','=',$id)->get();

        $overDue  = collect([]);
        $comingDue  = collect([]);

        foreach($takenSub as $subTaken){
            $activities = DB::table('activities')
                            ->where('takenID','=',$subTaken->id)
                            ->where('status','=',1)
                            ->get();
            foreach($activities as $activity){
                if($activity->date != NULL){
                    if($activity->date > $date){
                        $comingDue->push($activity);
                    }else {
                        $overDue->push($activity);
                    }
                }
            }
        }
        // dd($overDue);

        return view('pages.tutor',['active'=>$active,'overDue'=>$overDue,'comingDue'=>$comingDue]);
    }

//==========================================================================================================================================================
//==========================================================================================================================================================
//==========================================================================================================================================================
  
    public function subjectsTutor()
    {
        $active = 1;
        $id = Auth::id();
        $page = 2;
        $subTaken = DB::table('taken_subjects')
        ->rightJoin('users', 'taken_subjects.tutorID', '=', 'users.id')
        ->leftJoin('subjects', 'taken_subjects.subjectID', '=', 'subjects.id')
        ->select("taken_subjects.*","users.name","subjects.*")
        ->where('taken_subjects.tuteeID','=',$id)
        ->get();
        // dd($subTaken);
        return view('pages.tutor',['active'=>$active,'subTaken'=>$subTaken,'page'=>$page]);
    }

//==========================================================================================================================================================
//==========================================================================================================================================================
//==========================================================================================================================================================
  
    public function tutorClass($subID,$tutorID,$tuteeID,$page){
        $takenSub = TakenSubjects::where('subjectID','=',$subID)
                    ->where('tutorID','=',$tutorID)
                    ->where('tuteeID','=',$tuteeID)
                    ->get();
        
        $tutor;
        $subject;
        foreach($takenSub as $taken){
            $subject = Subject::where('id','=',$taken->subjectID)->get();
            $tutor = User::where('id','=',$taken->tutorID)->get();
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
        return view('pages.tutorClass',['tutor'=>$tutor,'takenSubject'=>$takenSub,'subject'=>$subject,'topics'=>$topics,'activities'=>$activityList,'submitions'=>$submitionList,'page'=>$page,'tutorID'=>$tutorID]);
    }

//==========================================================================================================================================================
//==========================================================================================================================================================
//==========================================================================================================================================================
    
    public function usersTutor()
    {
        $active = 2;
        return view('pages.tutor',['active'=>$active]);
    }

//==========================================================================================================================================================
//==========================================================================================================================================================
//==========================================================================================================================================================
      
    public function search(Request $request)
    {
        $input = $request->get('search');
        $id = Auth::id();
        $active = $request->get('active');


        $users = User::where([
            ['name','LIKE','%'.$input.'%'],
            ['id','!=',$id],
        ])->get();

        // $subjects = Subject::where('subject','LIKE','%'.$input.'%')->get();
        $subjects = DB::table('subjects')
        ->rightJoin('users', 'subjects.userID', '=', 'users.id')
        ->select("subjects.*","users.name","users.id")
        ->where('subjects.subject','LIKE','%'.$input.'%')
        ->where('users.id','!=',$id)
        ->get();
        // dd($subjects);

        return view('pages.searchResult',[
            'users'=>$users,
            'subjects'=>$subjects,
            'input'=>$input,
            'active'=>$active]);
    }

//==========================================================================================================================================================
//==========================================================================================================================================================
//==========================================================================================================================================================
  
    public function viewTutorProfile($id)
    {
        $user = User::where('id','=', $id)->get();
        // $subject = Subject::where('userID','=',$id)->get();
        $topics = collect([]);
        $userID = Auth::id();

        $subject = DB::table('subjects')
            ->leftJoin('taken_subjects','subjects.id','=','taken_subjects.subjectID')
            ->select('subjects.*','taken_subjects.status')
            ->where('subjects.userID','=',$id)
            ->get();

        foreach($subject as $sub)
        {
            $subID = $sub->id;
            $topic = Topic::where('subjectID','=',$subID)->get();
            $topics->push($topic);
        }

        return view('profile.tutorProfile',['user'=>$user,'subject'=>$subject,
            'topics'=>$topics,'id'=>$userID]);
    }


//==========================================================================================================================================================
//==========================================================================================================================================================
//==========================================================================================================================================================
  
    public function applySubject(Request $request)
    {
        $subject = TakenSubjects::create([
            'tutorID'=>$request->input('tutorID'),
            'tuteeID'=>$request->input('userID'),
            'subjectID'=>$request->input('subjectID'),
        ]);
        
        $id = $request->input('tutorID');
        return redirect()->route('viewTutorProfile',$id);
    }


 //==========================================================================================================================================================
//==========================================================================================================================================================
//==========================================================================================================================================================
     
    public function cancelSubject(Request $request)
    {
        DB::table('taken_subjects')
        ->where('subjectID', '=', $request->input('subjectID'))
        ->where('tutorID', '=', $request->input('tutorID'))
        ->where('tuteeID', '=', $request->input('userID'))
        ->where('status', '=', 1)
        ->delete();
        
        return redirect()->route('viewTutorProfile',$request->input('tutorID'));
    }


//==========================================================================================================================================================
//==========================================================================================================================================================
//==========================================================================================================================================================
   
    public function completeSubject(Request $request)
    {
        // DB::table('taken_subjects')
        //     ->where('tutorID', $request->input('tutorID'))
        //     ->where('tuteeID', $request->input('userID'))
        //     ->where('subjectID', $request->input('subjectID'))
        //     ->update(['status' => 3]);
        
        DB::table('taken_subjects')
            ->where('subjectID', '=', $request->input('subjectID'))
            ->where('tutorID', '=', $request->input('tutorID'))
            ->where('tuteeID', '=', $request->input('userID'))
            ->where('status', '=', 2)
            ->delete();
        
        return redirect()->route('viewTutorProfile',$request->input('tutorID'));
    }


//==========================================================================================================================================================
//==========================================================================================================================================================
//==========================================================================================================================================================
  
    public function addSubmition($activityID,$page){
        $activity = DB::table('activities')->where('id','=',$activityID)->get();
        $taken;
        foreach($activity as $act){
            $take = DB::table('taken_subjects')->where('id','=',$act->takenID)->get();
            foreach($take as $t){
                $taken = $t;
            }
        }
        return view('pages.forms.submitActivity',['activity'=>$activity,'activityID'=>$activityID,'page'=>$page,'taken'=>$taken]);
    }


//==========================================================================================================================================================
//==========================================================================================================================================================
//==========================================================================================================================================================
  
    public function storeSubmission(Request $request,$activityID,$page,$takenID){
        $file = $request->file('file');
        $fileName;
        if($file == null){
            $fileName = NULL;
        }else{
            $fileName = $activityID." Submission"."-".time().".".$request->file('file')->extension();
            $request->file('file')->move(public_path('files'),$fileName);
        }

        $activity = Submition::create([
            'activityID'=>$activityID,
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'file'=>$fileName,
        ]);

        DB::table('activities')->where('id','=',$activityID)->update(['status' => 2]);
        $taken = DB::table('taken_subjects')->where('id','=',$takenID)->get();
        $takenSub;
        foreach($taken as $take){
            $takenSub = $take;
        }
        // dd($takenSub);

        switch($page){
            case 1:
                return redirect()->route('tutor.index');
                break;
            case 2:
                return redirect()->route('home');
                break;
            default:
                return redirect()->route('tutorClass',['subID'=>$takenSub->subjectID,'tutorID'=>$takenSub->tutorID,'tuteeID'=>$takenSub->tuteeID,'page'=>$page]);
        }
    }

//==========================================================================================================================================================
//==========================================================================================================================================================
//==========================================================================================================================================================
  
    public function viewMeeting($activityID,$page){
        $meeting = DB::table('activities')->where('id','=',$activityID)->get();
        return view('pages.forms.viewMeeting',['activityID'=>$activityID,'page'=>$page,'meeting'=>$meeting]);
    }

//==========================================================================================================================================================
//==========================================================================================================================================================
//==========================================================================================================================================================
   
public function requestResched(Request $request,$activityID,$page){
        
        $time = $this->timeFormat($request->get('time'));
        $title = "Reschedule Meeting";
        $description = $request->get('desc');
        $fromID;
        $toID;
        
        $activity = DB::table('activities')->where('id','=',$activityID)->get();
        
        foreach($activity as $act){
            $takenSub = DB::table('taken_subjects')->where('id','=',$act->takenID)->get();
            foreach($takenSub as $take){
                $fromID = $take->tuteeID;
                $toID = $take->tutorID;
            }
        }

        $notification = Notification::create([
            'activityID'=>$activityID,
            'fromID'=> $fromID,
            'toID'=>$toID,
            'type'=>2, //[1] Assignment [2] Req Meeting [3] Meeting
            'title'=>$title,
            'description'=>$description,
            'date'=>$request->input('date'),
            'time'=>$time,
            'status'=>1, //1 for unread
        ]);

        $meeting = DB::table('activities')->where('id','=',$activityID)->get();

        switch($page){
            case 1:
                return redirect()->route('tutor.index');
                break;
            // case 1:
            //     return view('pages.forms.viewMeeting',['activityID'=>$activityID,'page'=>$page,'meeting'=>$meeting]);
            //     break;
            case 2:
                return redirect()->route('home');
                break;
            default:
                return view('pages.forms.viewMeeting',['id'=>$id,'page'=>$page]);    
        }
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

    public function downloadFile(Request $request,$file){

        // if(Storage::disk('public')->path("files/$request->file")){
        //     $path = Storage::disk('public')->path("files/$request->file");
        //     $content = file_get_contents($path);
        //     return response($content)->withHeaders([
        //         'Content-Type'=>mime_content_type($path)
        //     ]);
        // }
        // return redirect('/404');

        return response()->download(public_path("files/".$file));
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
