<?php

namespace App\Http\Controllers;

use App\film;
use App\film_producer;
use App\producer;
use Illuminate\Http\Request;

class FilmProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $film_producer = film_producer::orderBy('updated_at','DESC')->paginate(10);

        $films = film_producer::with('producers')->orderBy('updated_at','DESC')->withTrashed()->paginate(10);
        return view('filmprod.index',compact("film_producers"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allFilms = film::all();
        $allProducers = producer::all();

        $films = [];
        $producers = [];

        foreach($allFilms as $film){
            $films[$film->id] = $film->title;
        }
        foreach($allProducers as $producer){
           $producers[$producer->id] = $producer->name;
        }
        return view('filmprod.create',compact('films','producers'));

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
     * @param  \App\film_producer  $film_producer
     * @return \Illuminate\Http\Response
     */
    public function show(film_producer $film_producer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\film_producer  $film_producer
     * @return \Illuminate\Http\Response
     */
    public function edit(film_producer $film_producer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\film_producer  $film_producer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, film_producer $film_producer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\film_producer  $film_producer
     * @return \Illuminate\Http\Response
     */
    public function destroy(film_producer $film_producer)
    {
        //
    }
}
