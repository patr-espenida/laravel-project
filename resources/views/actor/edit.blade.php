@extends('layouts.app')

@section('content')
{!! Form::model($actor, ['route'=>['actor.update', $actor->id], 'file'=>true]) !!}
@csrf
@method('PATCH');

<div class="container">
    <h2>Edit Actor</h2>
    <div class="form-group">
        Name: {!! Form::text('name', null, ['class'=> 'form-control']) !!}
        @if($errors->has('name'))
            <small class='text-danger'>{{ $errors->first('name') }}</small>
        @endif
    </div>
    <div class="form-group">
        Note: {!! Form::textarea('note', null, ['class'=> 'form-control']) !!}
        @if($errors->has('note'))
        <small class='text-danger'>{{ $errors->first('note') }}</small>
        @endif
    </div>
    {!! Form::submit('Submit', ['class'=>'btn btn-success']) !!}
    <a href="{{ route('actor.index') }}" class="btn btn-danger" role="button">Cancel</a>
</div>
{!! Form::close() !!}
@endsection

