@extends('admin.layouts.layout')


@section('content')
<?php use App\User;?>

<a href="{{url('useremailexcel')}}">გადმოწერე იმეილების ექსელი</a>
  <table class="table table-bordered">
    <thead>
      <tr>
       <th>სურათი</th>
        <th>წაშლა</th>
      
      </tr>
    </thead>
   <tbody>
  <style>
   .img{
    width:70px;
    height:70px;
   }
   </style>
        @foreach($photos as $photo)
        <tr>
        <td><img class="img" src="public/galleryimages/<?php echo $photo->img;?>"></td>
        <td><a  href="{{ url('/deletephoto', [$photo->id]) }}" class="btn btn-danger">წაშალე სურათი</a></td>
        </tr>
        @endforeach
   
    
    </tbody>
  </table>

  @stop