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
      {{-- end of title --}}

      <p class="text-center alert alert-info">
        this post was created {{ $post->created_at->diffForHumans() }}, by <strong>{{ $post->user->name }}</strong>
      </p>
      {{-- end of user_id and created at --}}

      <p>
        Category :
        @if ($post->category_id == true)
          <a class="btn btn-info btn-sm" href="{{ route('show.category', $post->category_id) }}">{{ $post->category->category_name }}</a>
        @elseif ($post->category_id == null)
          <a class="btn btn-info btn-sm" href="{{ route('posts.edit', $post->id) }}">Uncategorized</a>
        @endif
      </p>
      {{-- end of category --}}

      <hr>

      <p class="lead">
        {{ $post->body }}
      </p>
      {{-- end of body --}}

      <div class="btn-group">
        <a class="btn btn-primary btn-lg" href="{{ route('posts.edit', $post->id) }}">Edit</a>
      </div>
      {{-- end of edit --}}

      <div class="btn-group">
        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE', 'onsubmit' => "return confirm('Are you sure you want to delete this post ?')"]) !!}
          <div class="btn-group">
            {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-lg'))}}
          </div>
        {!! Form::close() !!}
      </div>
      {{-- end of delete --}}

    </div>
  </div>

@stop
