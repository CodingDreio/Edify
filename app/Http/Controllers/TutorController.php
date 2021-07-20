<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Topic;
use App\Models\Subject;
use App\Models\TakenSubjects;

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
        return view('pages.tutor',['active'=>$active]);
    }

    public function subjectsTutor()
    {
        $active = 1;
        return view('pages.tutor',['active'=>$active]);
    }
    
    public function usersTutor()
    {
        $active = 2;
        return view('pages.tutor',['active'=>$active]);
    }
    
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

        return view('pages.searchResult',[
            'users'=>$users,
            'subjects'=>$subjects,
            'input'=>$input,
            'active'=>$active]);
    }

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
        // dd($subject);

        foreach($subject as $sub)
        {
            $subID = $sub->id;
            $topic = Topic::where('subjectID','=',$subID)->get();
            $topics->push($topic);
        }
        return view('profile.tutorProfile',['user'=>$user,'subject'=>$subject,
            'topics'=>$topics,'id'=>$userID]);
    }

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

    
    public function cancelSubject(Request $request)
    {
        DB::table('taken_subjects')
        ->where('subjectID', '=', $request->input('subjectID'))
        ->where('tutorID', '=', $request->input('tutorID'))
        ->where('tuteeID', '=', $request->input('userID'))
        ->delete();
        
        return redirect()->route('viewTutorProfile',$request->input('tutorID'));
    }

    
    public function completeSubject(Request $request)
    {
        DB::table('taken_subjects')
            ->where('tutorID', $request->input('tutorID'))
            ->where('tuteeID', $request->input('userID'))
            ->where('subjectID', $request->input('subjectID'))
            ->update(['status' => 3]);
        
        return redirect()->route('viewTutorProfile',$request->input('tutorID'));
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
}
