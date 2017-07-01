@extends('layouts.layout')


@section('content')


<a href="{{url('useremailexcel')}}">გადმოწერე იმეილების ექსელი</a>
  {{ Form::open(array('files' => true,'route'=>'uploadphoto','class'=>'form-group')) }}

   {!! Form::file('image', null) !!}
  <input type="submit" name="submit">ატვირთე

  {{Form::close()}}
@stop