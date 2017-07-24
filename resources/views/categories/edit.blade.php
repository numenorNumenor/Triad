@extends('master')

@section('title', 'Edit category')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <a class="btn btn-success btn-lg" href="{{ route('all.categories') }}">Back to categories</a>
      <div class="page-header">
        <h1>Edit category :</h1>
      </div>
      {!! Form::model($category, ['route' => ['update.category', $category->id], 'method' => 'PUT']) !!}
        <div class="form-group">
          {{ Form::label('category_name', 'Name :') }}
          {{ Form::text('category_name', null, array('class' => 'form-control')) }}
        </div>
        <div class="btn-group">
          {{ Form::submit('Edit', array('class' => 'btn btn-success btn-lg')) }}
        </div>
      {!! Form::close() !!}
    </div>
  </div>

@stop
