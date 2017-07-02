@extends('admin.layouts.layout')


@section('content')
<?php use App\User;?>
<a href="{{url('useremailexcel')}}">გადმოწერე იმეილების ექსელი</a>
<table class="table table-bordered">
    <thead>
      <tr>
       <th>შეკვეთის აიდი</th>
       <th>ტრანზაქციის აიდი</th>
        <th>შეკვეთის დრო</th>
        <th>შეკვეთის ხანგრძლივობა</th>
        <th>ხალხის რაოდენობა</th>
        <th>იუზერის სახელი</th>
         <th>იუზერის მობილური</th>
         <th>უნიკალური კოდი</th>
         <th>გადახდილი ფასი</th>
         <th>დარჩენილი ფასი</th>
         <th>ორდერის წაშლა</th>
         <th>ორდერის გაუქმება</th>
         <th>დადასტურება</th>

      </tr>
    </thead>
   <tbody>
    @php $rememberOrders=array(); @endphp
    @foreach($orders as $order)
    <tr>
        @if(!in_array($order->order_id,$rememberOrders))
            <td>{{$order->order_id}}</td>
            @if($order->trans_id!=NULL)
                <td>{{$order->trans_id}}</td>
            @else
                <td>დაჯავშნილი</td>

            @endif
            <td>{{substr($order->order_time,0,10)}}</td>
            <?php
            $user = User::where('id','=',$order->user_id)->first();//findOrFail($order->user_id);
            $timeArray = $ordersArray[$order->order_id];
            $i=1;
            foreach($timeArray as $time){
                if($i==1) $start_time = $time;
               
                if($i==count($timeArray)) $end_time = $time;
                 $i++;
            }
            
            ?>

            <td>{{$start_time}} : {{$end_time}}</td>
            <td>{{$order->people}}</td>
            <td><?php echo ($user==null) ?  $order->name : $user->name;?></td>
            <td><?php echo ($user==null) ?  $order->phone : $user->phone;?></td>
            <td>{{$order->userkey}}</td>
            @if($order->price==NULL)
                <td>{{$order->paid}}</td>
                <td>{{$order->remaining}}</td>
            @else
                <td>ჯავშანი</td>
                <td>{{$order->price}}</td>

            @endif
            
            <td><a   href="{{ url('/deleteOrder', [$order->id]) }}" class="btn btn-danger">წაშალე ორდერი</a></td>


            @if($order->active!=0)
            <td><a  href="{{ url('/disableOrder', [$order->id]) }}" class="btn btn-danger">გააუქმე ორდერი</a></td>
            @else
            <td>გაუქმებულია</td>
            @endif



            @if($order->success!=1)
            <td><a  href="{{ url('/successpayment', [$order->id]) }}" class="btn btn-danger">დაადასტურე გადახდა</a></td>
            @else
           <td>გადახდილია</td>
           @endif
        @endif
         @php array_push($rememberOrders,$order->order_id);@endphp
        </tr>
    @endforeach
    </tbody>
  </table>


@stop