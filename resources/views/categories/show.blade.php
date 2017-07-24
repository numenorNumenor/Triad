@extends('master')

@section('title', $category->category_name )

@section('content')

  <div class="row">
    <div class="col-md-12">
      <a class="btn btn-success btn-lg" href="{{ route('all.categories') }}">Back to categories</a>
      <div class="page-header">
        <h1>Category name :</h1>
      </div>
      <h3>{{ $category->category_name }}</h3>
      <hr>
      <div class="btn-group">
        <a class="btn btn-primary btn-lg" href="{{ route('edit.category', $category->id) }}">Edit</a>
      </div>
      <div class="btn-group">
        {!! Form::open(['route' => ['delete.category', $category->id], 'method' => 'DELETE', 'onsubmit' => "return confirm('Are you sure you want to delete this category ?')"]) !!}
          {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-lg')) }}
        {!! Form::close() !!}
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h1>All <span>{{ $category->category_name }}</span> posts </h1>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>title</th>
            <th>created at</th>
            <th>body</th>
            <th>author</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($category->posts as $category)
            <tr>
              <td>{{ $category->id }}</td>
              <td>{{ $category->title }}</td>
              <td>{{ $category->created_at->diffForHumans() }}</td>
              <td>
                {{ substr($category->body,0,90) }}
                {{ strlen($category->body) > 90 ? "..." : "" }}
              </td>
              <td>{{ $category->user->name }}</td>
              <td>
                <div class="btn-group">
                  <a class="btn btn-default btn-sm" href="{{ route('posts.show', $category->id) }}">View</a>
                </div>
                <div class="btn-group">
                  <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $category->id) }}">Edit</a>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@stop
