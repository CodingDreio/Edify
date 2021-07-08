<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Subject;
use App\Models\Topic;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $user = User::where('id','=', $id)->get();
        $subject = Subject::where('userID','=',$id)->get();
        $topics = collect();
        
        // $topic = Topic::where('subjectID','=',4)->get();
        // dd($topic);

        foreach($subject as $sub)
        {
            $subID = $sub->id;
            $topic = Topic::where('subjectID','=',$subID)->get();
            $topics->push($topic);
        }
        return view('profile.viewProfile',['user'=>$user,'subject'=>$subject,'topics'=>$topics]);
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
        $defImg = Auth::user()->image;
        $img = $request->imgInput;
        if($img == null){
            $imgName = $defImg;
        }else{ 
            $imgName = $id.'-'.time().'.'.$request->imgInput->extension();
            $request->imgInput->move(public_path('img'),$imgName);
            unlink("img/".$defImg);
        }

        // Update user information in the database
        $user = User::where('id',$id)
        ->update([
            'name' => $request->input('nameInput'),
            'address'=>$request->input('addressInput'),
            'email'=>$request->input('emailInput'),
            'mobile'=>$request->input('mobileInput'),
            'gender'=>$request->get('sexInput'),
            'description'=>$request->get('descInput'),
            'image' => $imgName,
        ]);
    
        return redirect('/profile');
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
