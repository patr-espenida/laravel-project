@extends('layouts.app')

@section('content')
{!! Form::open(['route' => 'film.store']) !!}
@csrf
<div class="container">
    <h2>Create Movie</h2>
    <div class="form-group">
        Title: {!! Form::text('title', old('title'), ['class'=> 'form-control']) !!}
        @if($errors->has('title'))
            <small class='text-danger'>{{ $errors->first('title') }}</small>
        @endif
    </div>
    <div class="form-group">
        Story: {!! Form::textarea('story', old('story'), ['class'=> 'form-control']) !!}
        @if($errors->has('story'))
            <small class='text-danger'>{{ $errors->first('story') }}</small>
        @endif
    </div>
    <div class="form-group">
        Release Date: {!! Form::date('release_date',old('release_date'), ['class'=> 'form-control']) !!}
        @if($errors->has('release_date'))
            <small class='text-danger'>{{ $errors->first('release_date') }}</small>
        @endif
    </div>
    <div class="form-group">
        Duration: {!! Form::text('duration', old('duration'), ['class'=> 'form-control']) !!}
        @if($errors->has('duration'))
            <small class='text-danger'>{{ $errors->first('duration') }}</small>
        @endif
    </div>
    <div class="form-group">
        {!! Form::select('producer_id[]', $producers, null,
        ['class'=>'custom-select', 'multiple'=>true , 'placeholder'=>'Select']) !!}
        @if($errors->has('name'))
            <small class='text-danger'>{{ $errors->first('producer_id') }}</small>
        @endif
    </div>
    <div class="form-group">
        {!! Form::select('certificate_id', $certificates, null,
        ['class'=>'custom-select', 'placeholder'=>'Select']) !!}
        @if($errors->has('certificate_id'))
            <small class='text-danger'>{{ $errors->first('certificate_id') }}</small>
        @endif
    </div>
    <div class="form-group">
        {!! Form::select('genre_id', $genres, null,
        ['class'=>'custom-select', 'placeholder'=>'Select']) !!}
        @if($errors->has('genre_id'))
            <small class='text-danger'>{{ $errors->first('genre_id') }}</small>
        @endif

    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('film.index') }}" class="btn btn-danger" role="button">Cancel</a>
</div>
{!! Form::close() !!}

{{-- <div class="container">
    <h2>Create Movie</h2>
    <form method="post" action="{{route('film.store')}}" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label for="title" class="control-label">Title</label>
      <input type="text" class="form-control" id="title" name="title" >
    </div>
    <div class="form-group">
      <label for="story" class="control-label">Story</label>
      <input type="text" class="form-control " id="story" name="story">
    </div>
    <div class="form-group">
      <label for="release_date" class="control-label">Release Date</label>
      <input type="date" class="form-control " id="release_date" name="release_date" >
    </div>
    <div class="form-group">
      <label for="duration" class="control-label">Duration</label>
      <input type="text" class="form-control" id="duration" name="duration">
    </div>

    {!! Form::select('certificate_id', $certificates, null,
        ['class'=>'custom-select', 'placeholder'=>'Select']) !!}

    {!! Form::select('genre_id', $genres, null,
    ['class'=>'custom-select', 'placeholder'=>'Select']) !!}

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{url()->previous()}}" class="btn btn-danger" role="button">Cancel</a>
    </div>
  </div>
  </form> --}}
  @endsection



