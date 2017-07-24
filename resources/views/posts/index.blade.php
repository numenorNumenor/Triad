@extends('master')

@section('title', 'All posts')

@section('content')

  <div class="row">
    <div class="col-md-12">
      @if (count($posts) > 0)
        <a class="btn btn-success btn-lg" href="{{ url('posts/create') }}">Create another post</a>
      @endif
      <div class="page-header">
        <h1>
          All posts ({{ $posts->count() }})
        </h1>
      </div>
    @if (count($posts) > 0)
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>title</th>
            <th>created at</th>
            <th>body</th>
            <th>Author</th>
            <th>Category</th>
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
                @if (Auth::user()->id === $post->user_id)
                  <span>
                    {{ $post->user->name }}
                  </span>
                @else
                  {{ $post->user->name }}
                @endif
              </td>
              <td>
                @if ($post->category_id == true)
                  <a class="btn btn-info btn-sm" href="{{ route('show.category', $post->category_id) }}">{{ $post->category->category_name }}</a>
                @elseif ($post->category_id == null)
                  <a class="btn btn-info btn-sm" href="{{ route('posts.edit', $post->id) }}">Uncategorized</a>
                @endif
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
    @else
      <p class="alert alert-info">
        You haven't created any post yet.
        <a class="btn btn-success btn-lg" href="{{ url('posts/create') }}">Create one</a>
      </p>
    @endif
      <div class="text-center">
        {{ $posts->links() }}
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h1>All your posts ({{ Auth::user()->posts->count() }})</h1>
      </div>
      @if (count(Auth::user()->posts) > 0)
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>title</th>
              <th>created_at</th>
              <th>body</th>
              <th>category</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
            @foreach (Auth::user()->posts as $post)
              <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at->diffForHumans() }}</td>
                <td>
                  {{ substr($post->body,0,90) }}
                  {{ strlen($post->body) > 90 ? "..." : "" }}
                </td>
                <td>
                  @if ($post->category_id == true)
                    <a class="btn btn-info btn-sm" href="{{ route('show.category', $post->category_id) }}">{{ $post->category->category_name }}</a>
                  @elseif ($post->category_id == null)
                    <a class="btn btn-info btn-sm" href="{{ route('posts.edit', $post->id) }}">Uncategorized</a>
                  @endif
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
      @else
        <p class="alert alert-info">
          You haven't created any post yet.
          <a class="btn btn-success btn-lg" href="{{ url('posts/create') }}">Create one</a>
        </p>
      @endif
    </div>
  </div>

@stop
