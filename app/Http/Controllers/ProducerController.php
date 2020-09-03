<?php

namespace App\Http\Controllers;

use App\producer;
use Illuminate\Http\Request;

class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producers = producer::orderBy('updated_at','DESC')->paginate(10);

        return view('producer.index',compact("producers"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producer = new producer(request(['name', 'email', 'website']));
        //   dd($role);
        $producer->save();
        return redirect('/producer')->with('success','Film Producer Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function show(producer $producer)
    {
        return view('producer.show', compact("producer"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function edit(producer $producer)
    {
        return view('producer.edit', compact("producer"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, producer $producer)
    {
        $data=$request->all();
        $producer->update($data);
        return redirect('/producer')->with('success','Film Producer Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function destroy(producer $producer)
    {
        $producer->delete();
        return redirect('/producer')->with('success','Film Producer Deleted!');
    }
}
