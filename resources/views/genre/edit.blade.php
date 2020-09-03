@extends('layouts.app')

@section('content')
{!! Form::model($genre, ['route'=>['genre.update', $genre->id], 'file'=>true]) !!}
@csrf
@method('PATCH');

<div class="container">
    <h2>Edit Film Genre</h2>
    <div class="form-group">
        Genre: {!! Form::text('genre', null, ['class'=> 'form-control']) !!}
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('genre.index') }}" class="btn btn-danger" role="button">Cancel</a>
</div>
{!! Form::close() !!}
@endsection
