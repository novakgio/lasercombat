
@php $i=0;@endphp
@php $previous_time=0; $headerDiv = false;@endphp
@foreach($orders as $order)
    
    @if($i==0 && $headerDiv==false)
        <div class="col span-1-of-12 one-hour-distance">
        <div class="row one-hour-line">
    @endif

    
    @php
    

    if($previous_time==$order->time){
            $headerDiv=true;
            continue;
    }
    else{
            $i++;
            $headerDiv=false;
    }
    



    $previous_time = $order->time;


    $state="";
    if($order->active==null) $state="free";
    else if($order->active==1) $state="bought";
    else $state="reserved";
      

    @endphp
    <div class="col span-1-of-6 ordertime ten-minute-distance {{$state}}-ten-minute" rel="{{$order->time}}">
        <div class="popup-time">
            <p>{{$state}}</p>
            <p>{{$order->time}}</p>
        </div>
        <div class="popup-selected"></div>
    </div>
    

     @if($i==6)   
         </div> 
         </div>
    @endif
    <?php if($i==6) $i=0;?>
    

@endforeach