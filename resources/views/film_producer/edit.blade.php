@extends('layouts.app')

@section('content')
{!! Form::model($film_producer, ['route'=>['filmprod.update', $film->id], 'file'=>true]) !!}
@csrf
@method('PATCH')
@csrf
<div class="container">
    <h2>Film Producer</h2>
    <div class="form-group">
        {!! Form::select('film_id', $certificates, old('film_id'),
        ['class'=>'custom-select', 'placeholder'=>'Select']) !!}
    </div>
    <div class="form-group">
        {!! Form::select('producer_id', $genres, old('producer_id'),
        ['class'=>'custom-select', 'placeholder'=>'Select']) !!}
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('filmprod.index') }}" class="btn btn-danger" role="button">Cancel</a>
</div>
{!! Form::close() !!}
  @endsection



