@extends('layouts.app')

@section('content')
{!! Form::model($role, ['route'=>['role.update', $role->id], 'file'=>true]) !!}
@csrf
@method('PATCH');

<div class="container">
    <h2>Edit Film Role</h2>
    <div class="form-group">
       Role: {!! Form::text('role', null, ['class'=> 'form-control']) !!}
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('role.index') }}" class="btn btn-danger" role="button">Cancel</a>
</div>
{!! Form::close() !!}
@endsection
