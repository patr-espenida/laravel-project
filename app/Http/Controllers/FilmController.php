<?php

namespace App\Http\Controllers;

use App\certificate;
use App\film;
use App\film_producer;
use App\genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\redirect;
use App\producer;
use Illuminate\Support\Facades\Validator;


class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $films = film::orderBy('updated_at','DESC')->withTrashed()->paginate(10);

        return view('film.index',compact("films"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allProducers = producer::all();
        $allGenres = genre::all();
        $allCertificates = certificate::all();

        $producers = [];
        $genres = [];
        $certificates = [];


        foreach($allProducers as $producer){
            $producers[$producer->id] = $producer->name;
        }
        foreach($allGenres as $genre){
            $genres[$genre->id] = $genre->genre;
        }
        foreach($allCertificates as $certificate){
            $certificates[$certificate->id] = $certificate->certificate;
        }
        return view('film.create',compact('producers','genres','certificates'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // $data = $request->all();
        // DB::table('films')->insert(
        //     ['title'=> $data['title'],
        //     'story'=>$data['story'],
        //     'release_date'=>$data['release_date'],
        //     'duration'=>$data['duration']
        //     ]);



        $data = $request->all();
        $rules = [
            'title' => 'required|min:3|max:50',
            'story' => 'required|string|max:300',
            'release_date'=> 'required|date',
            'duration'=> 'required|date_format:G:i:s',
            'producer_id' => 'required|array',
            'certificate_id'=>'required|exists:certificates,id',
            'genre_id' =>'required|exists:genres,id'

        ];
        $messages = [
            'title.required' => 'Input Film Title.',
            'title.max' => 'max of 50 characters only.',
            'story.required' => 'Input Film Summary.',
            'story.max' => 'max 300 characters only.',
            'release_date.required' => 'Select Release Date.',
            'release_date.max' => 'Please input Film Release Date',
            'duration.required' => 'Input Film Duration.',
            'producer_id.required'=> 'Select Film Producer.',
            'certificate_id.required'=> 'Select Film Certifcate.',
            'genre_id.required'=> 'Select Film Genre.',

        ];

        $validation=Validator::make($data,$rules,$messages);

        if ($validation->passes()) {
            $film = new film(request(['title','story','release_date','duration','producer_id','genre_id', 'certificate_id']));
            // dd($data);
            $film->save();
                foreach($data['producer_id'] as $producer_id){
                    $filmProducer = new film_producer();
                    $filmProducer->film()->associate($film);
                    $filmProducer->producer()->associate($producer_id);
                    $filmProducer->save();

                }
                 return redirect('/film')->with('success','Film Added Successfully!');
        }
        $errors = $validation->messages();

        return back()->withErrors($errors)->withInput($data);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(film $film)
    {
        return view('film.show',compact("film"));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(film $film)
    {

        $allProducers = producer::all();
        $allGenres = genre::all();
        $allCertificates = certificate::all();


        $producers = [];
        $genres = [];
        $certificates = [];
        $selected = [];

        $filmProducers = $film->filmProducers->toArray();
        //  dd($filmProducers);
        foreach($filmProducers as $prod){
            $selected[] = $prod['producer_id'];
        }
        foreach($allProducers as $producer){
            $producers[$producer->id] = $producer->name;
        }
        foreach($allGenres as $genre){
            $genres[$genre->id] = $genre->genre;
        }
        foreach($allCertificates as $certificate){
            $certificates[$certificate->id] = $certificate->certificate;
        }

        return view('film.edit',compact('film','producers','genres','certificates', 'selected'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, film $film)
    {
        $data = $request->all();
        $rules = [
            'title' => 'required|min:3|max:50',
            'story' => 'required|string|max:300',
            'release_date'=> 'required|date',
            'duration'=> 'required|date_format:G:i:s',
            'producer_id.required'=> 'Select Film Producer.',
            'certificate_id'=>'required|exists:certificates,id',
            'genre_id' =>'required|exists:genres,id'


        ];
        $messages = [
            'title.required' => 'Input Film Title.',
            'title.max' => 'max of 50 characters only.',
            'story.required' => 'Input Film Summary.',
            'story.max' => 'max 300 characters only.',
            'release_date.required' => 'Select Release Date.',
            'release_date.max' => 'Please input Film release date',
            'producer_id' => 'required|array',
            'duration.required' => 'Input Film Duration.',
            'certificate_id.required'=> 'Select Film certifcate.',
            'genre_id.required'=> 'Select Film genre.',

        ];

        $validation=Validator::make($data,$rules,$messages);

        if ($validation->passes()) {
            $film->update($data);
            $producers = film_producer::where('film_id', '=', $film->id);
            $producers->delete();

            foreach($data['producer_id'] as $producer_id){
                $filmProducer = new film_producer();
                $filmProducer->film()->associate($film);
                $filmProducer->producer()->associate($producer_id);
                $filmProducer->save();
            }
            return redirect('/film')->with('success','Film Edited Successfully!');
        }
        $errors = $validation->messages();

        return back()->withErrors($errors)->withInput($data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(film $film)
    {
         //
        // $film = film::find($id);
        // DB::table('films')->where('film_id',$id)->delete();

        // $film->delete();

        // return redirect('/film')->with('success','Film Deleted!');

        // $films = film::findOrFail($id);
        $film->delete();
        return redirect('/film')->with('success','Film Deleted!');

    }

    public function restore($id)
    {
        film::withTrashed()->where('id',$id)->restore();
        return redirect('/film')->with('success',' Restored Successfully!');
    }

}
