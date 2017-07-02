@extends('admin.layouts.layout')


@section('content')

<?php use App\User;?>
<a href="{{url('useremailexcel')}}">გადმოწერე იმეილების ექსელი</a>
  {{ Form::open(array('files' => true,'route'=>'uploadphoto','class'=>'form-group')) }}

   {!! Form::file('image', null) !!}
  <input type="submit" name="submit">ატვირთე

  {{Form::close()}}
@stop