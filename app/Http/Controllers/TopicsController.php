<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Topic;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject.topic.addTopic');
    }

    public function addTopic($id)
    {
        $subject = Subject::where('id','=', $id)->get();
        $topic = Topic::where('subjectID','=',$id)->get();
        return view('subject.topic.addTopic',['subject'=>$subject,'topic'=>$topic]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subjectID = $request->get('idInput');
        $topic = Topic::create([
            'subjectID'=>$request->get('idInput'),
            'topic'=>$request->get('topicInput'),
            'description'=>$request->get('topicDescInput'),
        ]);
        return redirect()->route('subject.edit',$subjectID);
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
<<<<<<< HEAD
        $topic = Topic::where('id','=',$id)->get();
        return view('subject.topic.updateTopic',['topic'=>$topic]);
=======
        //
>>>>>>> f828708f6e6bbeb2d3160828a8c701339fc57c53
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
<<<<<<< HEAD
        $subID = $request->get('subIDInput');
        $topic = Topic::where('id',$id)->update([
            'topic'=>$request->get('topicInput'),
            'description'=>$request->get('descInput'),
        ]);

        return redirect(route("subject.edit",$subID));
=======
        //
>>>>>>> f828708f6e6bbeb2d3160828a8c701339fc57c53
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
<<<<<<< HEAD
        
        $tpc = Topic::where('id','=',$id)->get();
        $subID;
        foreach($tpc as $t){
            $subID = $t->subjectID;
        }
        $topic = Topic::find($id)->delete();

        return redirect(route("subject.edit",$subID));
=======
        //
>>>>>>> f828708f6e6bbeb2d3160828a8c701339fc57c53
    }
}
