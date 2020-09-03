<?php

namespace App\Http\Controllers;

use App\genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $genres = genre::orderBy('updated_at','DESC')->paginate(10);

        return view('genre.index',compact("genres"));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $genre = new genre(request(['genre']));
        $genre->save();
        return redirect('/genre')->with('success','Genre Added Successfully!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(genre $genre)
    {
        return view('genre.show', compact("genre"));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(genre $genre)
    {
        return view('genre.edit', compact("genre"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, genre $genre)
    {
        $data=$request->all();
        $genre->update($data);
        return redirect('/genre')->with('success','Genre Edited Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(genre $genre)
    {
        $genre->delete();
        return redirect('/genre')->with('success','Film Genre Deleted!');
    }
}
