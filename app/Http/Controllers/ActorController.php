<?php

namespace App\Http\Controllers;

use App\actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $actors = actor::orderBy('updated_at','DESC')->withTrashed()->paginate(10);

        return view('actor.index',compact("actors"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('actor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $rules = [
            'name' => 'required|min:3| max:100',
            'note' => 'required|string|max:300',
        ];
        $messages = [
            'name.required' => 'Input Actor Name',
            'name.max' => 'max of 50 characters only',
            'note.required' => 'Fill out the Note',
            'note.max' => 'max 300 characters only',
        ];

        $validation=Validator::make($data,$rules,$messages);

        if ($validation->passes()) {
            $actor = new actor(request(['name','note']));
            $actor->save();
            return redirect('/actor')->with('success','Actor Added Successfully!');
        }
        $errors = $validation->messages();

        return back()->withErrors($errors)->withInput($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function show(actor $actor)
    {

        return view('actor.show',compact("actor"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function edit(actor $actor)
    {

        return view('actor.edit', compact("actor"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, actor $actor)
    {

        $data =$request->all();
        $rules = [
            'name' => 'required|min:3| max:100',
            'note' => 'required|string|max:300',
        ];
        $messages = [
            'name.required' => 'Input Actor Name',
            'name.max' => 'max of 50 characters only',
            'note.required' => 'Fill out the Note',
            'note.max' => 'max 300 characters only',
        ];

        $validation=Validator::make($data,$rules,$messages);

        if ($validation->passes()) {
            $actor->update($data);
            return redirect('/actor')->with('success','Actor Edited Successfully!');
        }
        $errors = $validation->messages();

        return back()->withErrors($errors)->withInput($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function destroy(actor $actor)
    {
        $actor->delete();
        return redirect('/actor')->with('success','Actor Deleted!');
    }

    public function restore($id)
    {
        actor::withTrashed()->where('id',$id)->restore();
        return redirect('/actor')->with('success','Actor Restored Successfully!');
    }
}
