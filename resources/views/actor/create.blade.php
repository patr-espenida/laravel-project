@extends('layouts.app')

@section('content')
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

{!! Form::open(['route' => 'actor.store']) !!}
@csrf
<div class="container">
    <h2>Create Actor</h2>
    <div class="form-group">
        Name: {!! Form::text('name', old('name'), ['class'=> 'form-control']) !!}
        @if($errors->has('name'))
            <small class='text-danger'>{{ $errors->first('name') }}</small>
        @endif
    </div>
    <div class="form-group">
        Note: {!! Form::textarea('note', old('note'), ['class'=> 'form-control']) !!}
        @if($errors->has('note'))
        <small class='text-danger'>{{ $errors->first('note') }}</small>
        @endif
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('actor.index') }}" class="btn btn-danger" role="button">Cancel</a>
</div>
{!! Form::close() !!}
@endsection
