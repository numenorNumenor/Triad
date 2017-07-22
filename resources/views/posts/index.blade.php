@extends('master')

@section('title', 'All posts')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h1>
          All posts
        </h1>
      </div>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>title</th>
          <th>created at</th>
          <th>body</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
          <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->created_at->diffForHumans() }}</td>
            <td>
              {{ substr($post->body,0,90) }}
              {{ strlen($post->body) > 90 ? "..." : "" }}
            </td>
            <td>
              <div class="btn-group">
                <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $post->id) }}">Edit</a>
              </div>
              <div class="btn-group">
                <a class="btn btn-default btn-sm" href="{{ route('posts.show', $post->id) }}">View</a>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>

@stop
