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
        <a style="margin: 19px;" href="{{ route('filmprod.create')}}" class="btn btn-primary">Add <i class="fa fa-plus" aria-hidden="true"></i></a>
    </div>


<table class="table table-striped">
    <thead>
      <tr>
        <th>Film Title</th>
        <th>Producer</th>
        <th></th>
        <th></th>

      </tr>
    </thead>
    <tbody>
        @foreach ($film_producers as $film_producer)
        <tr>
            <td><a href="{{ route('filmprod.show',$film_producer->film_id) }}">{{ $film_producer->title }}</a></td>
            <td>{{ $film_producer->producer_id }}</td>

            <td><a href="{{ route('filmprod.show',$genre->id) }}">{{ $genre->genre }}</a></td>
            <td><a href="{{ route('filmprod.edit', $genre->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
            <td>{!! Form::open(array('route' => array('filmprod.destroy', $genre->id),'method'=>'DELETE')) !!}
                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>',['type' => 'submit', 'class'=>'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- Pagination --}}
<div>{{$films->links()}}</div>
</div>
@endsection
