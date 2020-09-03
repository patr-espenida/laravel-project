@extends('layouts.app')

<div class="col-sm-12">
@if (session('success'))
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading"></h4>
            <p>{{ session('success') }}</p>
            <p class="mb-0"></p>
        </div>
    @endif
</div>

@section('content')
<div class="container">
    <div>
        <a style="margin: 19px;" href="{{ route('actor.create')}}" class="btn btn-primary">Add <i class="fa fa-plus" aria-hidden="true"></i></a>
    </div>


<table class="table table-striped">
    <thead>
      <tr>
        <th>Actor Name</th>
        <th>Note</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($actors as $actor)
        <tr>
            <td><a href="{{ route('actor.show',$actor->id) }}">{{ $actor->name }}</a></td>
            <td>{{ $actor->note }}</td>
            {{-- <td><a href="{{ route('actor.edit', $actor->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
            <td>{!! Form::open(array('route' => array('actor.destroy', $actor->id),'method'=>'DELETE')) !!}
                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>',['type' => 'submit', 'class'=>'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}</td> --}}

            @if($actor->trashed())
            <td></td>
            <td><a href="{{ route('actor.restore', $actor->id) }}" class="btn btn-info btn-sm"><i class="fa fa-undo" aria-hidden="true" ></i></a></center></td>
                @else
                <td><a href="{{ route('actor.edit', $actor->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
            <td>{!! Form::open(array('route' => array('actor.destroy', $actor->id),'method'=>'DELETE')) !!}
                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>',['type' => 'submit', 'class'=>'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}</td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>

{{-- Pagination --}}
<div>{{$actors->links()}}</div>
</div>
@endsection
