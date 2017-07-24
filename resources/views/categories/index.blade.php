@extends('master')

@section('title', 'All categories | create')

@section('content')

  <div class="row">
    <div class="col-md-6">
      <div class="page-header">
        <h1>All categories</h1>
      </div>
      @if (count($categories) > 0)
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>name</th>
              <th>created at</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
              <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->created_at->diffForHumans() }}</td>
                <td>
                  <div class="btn-group">
                    <a class="btn btn-default btn-sm" href="{{ route('show.category', $category->id) }}">View</a>
                  </div>
                  <div class="btn-group">
                    <a class="btn btn-primary btn-sm" href="{{ route('edit.category', $category->id) }}">Edit</a>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @else
        <p class="alert alert-info">
          You haven't created any category yet.
        </p>
      @endif
    </div>
    <div class="col-md-5 col-md-offset-1">
      <div class="page-header">
        <h1>Create category</h1>
      </div>
      {!! Form::open(['route' => 'store.category']) !!}
        <div class="form-group">
          {{ Form::label('category_name', 'Name :') }}
          {{ Form::text('category_name', null , array('class' => 'form-control')) }}
        </div>
        <div class="btn-group">
          {{ Form::submit('Create', array('class' => 'btn btn-success btn-lg')) }}
        </div>
      {!! Form::close() !!}
    </div>
  </div>

@stop
