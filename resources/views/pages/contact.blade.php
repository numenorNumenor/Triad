@extends('master')

@section('title', 'contact')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h1>Contact me</h1>
      </div>
      {!! Form::open(['route' => 'all.messages']) !!}
        <div class="form-group">
          {{ Form::label('name', 'Your name :') }}
          {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
          {{ Form::label('subject', 'Your subject :') }}
          {{ Form::text('subject', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
          {{ Form::label('message', 'Your message :') }}
          {{ Form::textarea('message', null, array('class' => 'form-control')) }}
        </div>
        <div class="btn-group">
          {{ Form::submit('Send', array('class' => 'btn btn-success btn-lg')) }}
        </div>
      {!! Form::close() !!}
    </div>
  </div>

@stop
