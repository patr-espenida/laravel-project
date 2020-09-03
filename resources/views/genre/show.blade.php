@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="row"></div>
    <div class="card text-white bg-info mx-auto">
    <div class="row no-gutters">
        <div class="col-md-4">
        <img src="..." class="card-img" alt="...">
        </div>
        <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title">{{ $genre->genre }}</h5>
            {{-- LIST OF ILM UNDER THE SPECIFIC GENRE BEING SELECTED --}}
            {{-- <p class="card-text">{{ $actor->note }}</p> --}}
            {{-- <p class="card-text"><small class="text-muted">Release Date: {{ $film->release_date }}</small></p>
            <p class="card-text"><small class="text-muted">Duration: {{ $film->duration  }}</small></p>
            <p class="card-text"><small class="text-muted">Genre: {{ $film->film_genre  }}</small></p>
            <p class="card-text"><small class="text-muted">Certificate: {{ $film->film_certificate  }}</small></p> --}}
        </div>
        </div>
    </div>
    </div>
</div>
@endsection
