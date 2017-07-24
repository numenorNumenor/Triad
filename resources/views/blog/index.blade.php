@extends('master')

@section('title', 'All blog posts')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h1>All blog posts</h1>
      </div>
      @if (count($posts) > 0)
        @foreach ($posts as $post)
          <h3>
            <a href="{{ route('blog.post',$post->slug) }}">{{ $post->title }}</a>
          </h3>
          <hr>
        @endforeach
      @else
        <p class="alert alert-info">
          There is no blog post yet to be found.
        </p>
      @endif
      <div class="text-center">
        {{ $posts->links() }}
      </div>
    </div>
  </div>

@stop
