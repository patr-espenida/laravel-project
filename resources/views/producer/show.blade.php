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
            <h5 class="card-title">{{ $producer->name }}</h5>
            {{-- LIST OF FILM UNDER THE SPECIFIC GENRE BEING SELECTED --}}
            <p class="card-text"><small class="text-muted">Website: {{ $producer->website  }}</small></p>
            <p class="card-text"><small class="text-muted">Email: {{ $producer->email  }}</small></p>

        </div>
        </div>
    </div>
    </div>
</div>
@endsection
