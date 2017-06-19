
@php $i=0;@endphp
@php $k=0;@endphp
@foreach($orders as $order)
   
    @if($i==0)
        <div class="col span-1-of-12 one-hour-distance">
        <div class="row one-hour-line">
    @endif
    @php
    $state="";
    
     if($order->active==null) $state="free";
    else if($order->active==1) $state="bought";
    else $state="reserved";
      

    @endphp
    <div class="col span-1-of-6 ten-minute-distance {{$state}}-ten-minute">
        <div class="popup-time">
            <p>{{$state}}</p>
            <p>{{$order->time}}</p>
        </div>
    </div>
    @php $i++; @endphp

     @if($i==6)   
         </div> 
         </div>
    @endif
    <?php if($i==6) $i=0;?>
    

@endforeach