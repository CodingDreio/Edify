<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\TakenSubjects;

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
        
        return redirect()->route('tutee.index');
    }

    public function myTuteesTimetable()
    {
        $active = 1;

        return view('pages.tutee',['active'=>$active]);
    }

    public function viewTuteeClass($classID)
    {
        
        return view('pages.tuteeClass',[]);
    }


    // View Forms

    public function addActivity($tutorID,$takenID)
    {   
        return view('pages.forms.addActivity',['topicID'=>$tutorID,$takenID]);
    }
    
    public function uploadMaterial($tutorID,$takenID)
    {
        return view('pages.forms.uploadMaterial',['topicID'=>$tutorID,'takeID'=>$takenID]);
    }
    
    public function setMeeting($tutorID,$takenID)
    {
        return view('pages.forms.setMeeting',['topicID'=>$tutorID,'takeID'=>$takenID]);
    }

    
    // Store Data From Forms

    public function storeActivity($tutorID,$takenID)
    {   
        return view('pages.forms.addActivity',['topicID'=>$tutorID,'takeID'=>$takenID]);
    }
    
    public function storeMaterial($tutorID,$takenID)
    {
        return view('pages.forms.uploadMaterial',['topicID'=>$tutorID,'takeID'=>$takenID]);
    }
    
    public function storeMeeting($tutorID,$takenID)
    {
        return view('pages.forms.setMeeting',['topicID'=>$tutorID,'takeID'=>$takenID]);
    }

}
