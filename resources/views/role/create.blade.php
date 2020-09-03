@extends('layouts.app')

@section('content')

{!! Form::open(['route' => 'role.store']) !!}
@csrf
<div class="container">
    <h2>Create Film Role</h2>
    <div class="form-group">
        Role: {!! Form::text('role', old('role'), ['class'=> 'form-control']) !!}
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('role.index') }}" class="btn btn-danger" role="button">Cancel</a>
</div>
{!! Form::close() !!}
@endsection
