@extends('layouts.app')

@section('content')
{!! Form::model($film, ['route'=>['film.update', $film->id], 'file'=>true]) !!}
@csrf
@method('PATCH')

<div class="container">
<div class="form-group">
    Title: {!! Form::text('title',  null, ['class'=> 'form-control']) !!}
    @if($errors->has('title'))
        <small class='text-danger'>{{ $errors->first('title') }}</small>
    @endif
</div>
<div class="form-group">
    Story: {!! Form::textarea('story', null, ['class'=> 'form-control']) !!}
    @if($errors->has('story'))
        <small class='text-danger'>{{ $errors->first('story') }}</small>
    @endif
</div>
<div class="form-group">
    Release Date: {!! Form::date('release_date', null, ['class'=> 'form-control']) !!}
    @if($errors->has('release_date'))
        <small class='text-danger'>{{ $errors->first('release_date') }}</small>
    @endif
</div>
<div class="form-group">
    Duration: {!! Form::text('duration', null, ['class'=> 'form-control']) !!}
    @if($errors->has('duration'))
        <small class='text-danger'>{{ $errors->first('duration') }}</small>
    @endif
</div>
<div class="form-group">
        {!! Form::select('producer_id[]', $producers, $selected,
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
</div>
{!! Form::close() !!}
@endsection
