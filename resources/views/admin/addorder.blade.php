@extends('layouts.layout')



@section('content')


<div class="form-group">
                      <label for="usr">სახელი:</label>
                      <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                  <label for="pwd">მობილური:</label>
                  <input type="text" class="form-control" id="phone">
                </div>

                <div class="form-group">
                  <label for="pwd">დაწყების დრო:</label>
                  <input type="text" class="form-control" id="start_time">
                </div>
                <div class="form-group">
                 <label>დღის არჩევა</label>
                <select id="week_id">

                @foreach($weekDayDates as $week_day)
                <option value="{{$week_day['id']}}">{{$week_day['day']}}</option>

                @endforeach

                </select>

                </div>


                <div class="form-group">
                  <label for="pwd">დასრულების დრო:</label>
                  <input type="text" class="form-control" id="end_time">
                </div>

                <div class="form-group">
                  <label for="pwd">რაოდენობა:</label>
                 <select id="people_range">

                 <option value="4">4</option>
                 <option value="5">5</option>
                 <option value="6">6</option>
                 <option value="7">7</option>
                 <option value="8">8</option>
                 <option value="9">9</option>
                 <option value="10">10</option>
                 <option value="11">11</option>
                 <option value="12">12</option>
                 <option value="13">13</option>
                 <option value="14">14</option>
                 <option value="15">15</option>
                 <option value="16">16</option>
                 </select>
                </div>

                <div class="form-group">

                <button type="button" id="addorder" class="btn btn-success">დაამატე შეკვეთა</button>
                </div>

@stop