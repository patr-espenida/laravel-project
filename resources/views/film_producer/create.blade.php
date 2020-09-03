@extends('layouts.app')

@section('content')
{!! Form::open(['route' => 'filmprod.store']) !!}
@csrf
<div class="container">
    <h2>Film Producer</h2>
    <div class="form-group">
        {!! Form::select('film_id', $certificates, null,
        ['class'=>'custom-select', 'placeholder'=>'Select']) !!}
    </div>
    <div class="form-group">
        {!! Form::select('producer_id', $genres, null,
        ['class'=>'custom-select', 'placeholder'=>'Select']) !!}
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('film.index') }}" class="btn btn-danger" role="button">Cancel</a>
</div>
{!! Form::close() !!}
  @endsection



