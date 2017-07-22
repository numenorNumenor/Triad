@extends('master')

@section('title', 'All messages')

@section('content')

  <div class="row">
    <div class="col-md-12">
      @if (count($messages) == 1)
        <div class="page-header">
          <h1> You have ({{ $messages->count() }}) message.</h1>
        </div>
      @elseif (count($messages) == 0)
          <div class="page-header">
            <h1>You haven't received any message yet. ({{ $messages->count() }})</h1>
          </div>
      @else
        <div class="page-header">
          <h1>You have {{ $messages->count() }} messages.</h1>
        </div>
      @endif
      @if (count($messages) > 0)
        @foreach ($messages as $message)
          <div class="message">
            <a href="{{ route('show.message', $message->id) }}">
              <h3>{{ $message->subject }} | <small>{{ $message->created_at }}</small></h3>
            </a>
            <hr>
          </div>
        @endforeach
      @else
        <p class="alert alert-info">
          You haven't received any message yet.
        </p>
      @endif
    </div>
  </div>

@stop
