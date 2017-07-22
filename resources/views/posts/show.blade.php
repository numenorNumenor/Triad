@extends('master')

@section('title', $post->title)

@section('content')

  <div class="row">
    <div class="col-md-12">
      <a class="btn btn-success btn-lg" href="{{ url('posts') }}">Back to posts</a>
      <div class="page-header">
        <h1 class="text-center">
          {{ $post->title }}
        </h1>
      </div>
      <p class="alert alert-info">
        this post was created {{ $post->created_at->diffForHumans() }}
      </p>
      <p class="lead">
        {{ $post->body }}
      </p>
      <div class="btn-group">
        <a class="btn btn-primary btn-lg" href="{{ route('posts.edit', $post->id) }}">Edit</a>
      </div>
      <div class="btn-group">
        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE', 'onsubmit' => "return confirm('Are you sure you want to delete this post ?')"]) !!}
          <div class="btn-group">
            {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-lg'))}}
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>

@stop
