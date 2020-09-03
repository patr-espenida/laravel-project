@extends('layouts.app')

@section('content')

{!! Form::open(['route' => 'genre.store']) !!}
@csrf
<div class="container">
    <h2>Create Film Genre</h2>
    <div class="form-group">
        Genre: {!! Form::text('genre', old('genre'), ['class'=> 'form-control']) !!}
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('genre.index') }}" class="btn btn-danger" role="button">Cancel</a>
</div>
{!! Form::close() !!}
@endsection
