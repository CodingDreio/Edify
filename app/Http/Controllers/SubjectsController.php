<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subject;
use App\Models\Topic;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject.addSubject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $id = Auth::id();
        $sched = $request->get('dayInput').' '.$request->get('fromInput').' to '.$request->get('toInput');


        $subject = Subject::create([
            'userID'=>$id,
            'subject'=>$request->input('subjectInput'),
            'schedule'=>$sched,
            'description'=>$request->get('descInput'),
            'slot'=>$request->input('slotInput'),
        ]);
        return redirect()->route('subject.edit',$subject->id);
        // return redirect()->route('topic.addTopic',$subject->id);
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
        $subject = Subject::where('id','=', $id)->get();
        $topics = Topic::where('subjectID','=',$id)->get();
        return view('subject.updateSubject',['subject'=>$subject, 'topics'=>$topics]);
        // return view('subject.updateSubject');
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
        $sched = $request->get('dayInput').' '.$request->get('fromInput').' to '.$request->get('toInput');

        $subject = Subject::where('id',$id)
        ->update([
            'subject'=>$request->input('subjectInput'),
            'schedule'=>$sched,
            'description'=>$request->get('descInput'),
            'slot'=>$request->input('slotInput'),
        ]);

        return redirect(route("subject.edit",$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id)->delete();

        return redirect(route("profile.index"));
    }
}
