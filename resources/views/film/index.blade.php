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
        <a style="margin: 19px;" href="{{ route('film.create')}}" class="btn btn-primary">Add <i class="fa fa-plus" aria-hidden="true"></i></a>
    </div>


<table class="table table-striped">
    <thead>
      <tr>
        <th>Title</th>
        <th>Story</th>
        <th>Release Date</th>
        <th>Duration</th>
        <th>Producer</th>
        <th></th>
        <th></th>

      </tr>
    </thead>
    <tbody>
        @foreach ($films as $film)
        <tr>
            <td><a href="{{ route('film.show',$film->id) }}">{{ $film->title }}</a></td>
            <td>{{ $film->story }}</td>
            <td>{{ $film->release_date }}</td>
            <td>{{ $film->duration  }}</td>
            <th></th>


            @if($film->trashed())
            <td></td>
            <td><a href="{{ route('film.restore', $film->id) }}" class="btn btn-info btn-sm"><i class="fa fa-undo" aria-hidden="true" ></i></a></td>
                @else
                <td><a href="{{ route('film.edit', $film->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                <td>{!! Form::open(array('route' => array('film.destroy', $film->id),'method'=>'DELETE')) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>',['type' => 'submit', 'class'=>'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
            @endif
          </tr>
        @endforeach
    </tbody>
</table>

{{-- Pagination --}}
<div>{{$films->links()}}</div>
</div>
@endsection
