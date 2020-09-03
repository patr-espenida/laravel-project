@extends('layouts.app')

@section('content')

{!! Form::open(['route' => 'producer.store']) !!}
@csrf
<div class="container">
    <h2>Create Film Producer</h2>
    <div class="form-group">
        Producer Name: {!! Form::text('name', old('name'), ['class'=> 'form-control']) !!}
    </div>
    <div class="form-group">
        Email: {!! Form::text('email', old('email'), ['class'=> 'form-control']) !!}
    </div>
    <div class="form-group">
        Website: {!! Form::text('website', old('website'), ['class'=> 'form-control']) !!}
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('producer.index') }}" class="btn btn-danger" role="button">Cancel</a>
</div>
{!! Form::close() !!}
@endsection
