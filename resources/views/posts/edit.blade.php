@extends('master')

@section('title', 'Edit post')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <a class="btn btn-success btn-lg" href="{{ url('posts') }}">Back to posts</a>
      <div class="page-header">
        <h1 class="text-center">Edit post</h1>
      </div>
      {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
        <div class="form-group">
          {{ Form::label('title', 'Post title :') }}
          {{ Form::text('title', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
          {{ Form::label('body', 'Post body :') }}
          {{ Form::textarea('body', null, array('class' => 'form-control')) }}
        </div>
        <div class="btn-group">
          {{ Form::submit('Send', array('class' => 'btn btn-success btn-lg')) }}
        </div>
      {!! Form::close() !!}
    </div>
  </div>

@stop
