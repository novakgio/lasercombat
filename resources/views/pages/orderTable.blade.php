
@php $i=0;@endphp
@foreach($orders as $order)
    @if($i==0)
        <div class="col span-1-of-12 one-hour-distance">
        <div class="row one-hour-line">
    @endif
    @php
    $state="";
    if($order->booked==0) $state="free";
    else $state="bought";
    @endphp
    <div class="col span-1-of-6 ten-minute-distance {{$state}}-ten-minute start-time">
        <div class="popup-time">
            <p>Reserved</p>
            <p>{{$order->time}}</p>
        </div>
    </div>
    @php $i++; @endphp

     @if($i==6)   
         </div> 
         </div>
    @endif
    <?php if($i==6) $i=0;?>
    @if($order->time=="02:00")
        </div>
    @endif

@endforeach