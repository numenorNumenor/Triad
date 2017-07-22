@extends('master')

@section('title', $message->subject)

@section('content')

  <div class="row">
    <div class="col-md-12">
      <a class="btn btn-success btn-lg" href="{{ route('all.messages') }}">Go back</a>
      <div class="page-header">
        <h1 class="text-center">Subject : {{ $message->subject }}</h1>
      </div>
      <p class="text-center alert alert-info">
        Client : {{ $message->name }}
      </p>
      <p class="lead">
        {{ $message->message }}
      </p>
      {!! Form::open(['route' => ['delete.message', $message->id], 'method' => 'delete', 'onsubmit' => "return confirm('Are you sure you want to delete this message ?')"]) !!}
        <div class="btn-group">
          {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-lg')) }}
        </div>
      {!! Form::close() !!}
    </div>
  </div>

@stop
