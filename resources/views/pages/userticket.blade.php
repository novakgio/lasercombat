<i class="ion-close-round close-inner-popup" id="close-ticket"></i>
                    <div class="row ticket-line">
                        <span class="ticket-title">თარიღი:</span>
                        <span class="ticket-value">{{substr($date,0,10)}}</span>
                    </div>
                    <div class="row ticket-line">
                        <span class="ticket-title">დაწყების დრო:</span>
                        <span class="ticket-value">{{$start_time}}</span>
                    </div>
                    <div class="row ticket-line">
                        <span class="ticket-title">დასრულების დრო:</span>
                        <span class="ticket-value">{{$end_time}}</span>
                    </div>

                    @php
                   
                    $state= ($active==1) ? "ნაყიდი":"დაჯავშნილი";
                    @endphp
                    <div class="row ticket-line">
                        <span class="ticket-title">ტიპი:</span>
                        <span class="ticket-value">{{$state}}</span>
                    </div>
                    
                    <div class="row ticket-line">
                        <span class="ticket-title">მოთამაშეების რაოდენობა:</span>
                        <span class="ticket-value">{{$people}}</span>
                    </div>
                    <div class="row ticket-line">
                        <span class="ticket-title">უნიკალური კოდი:</span>
                        <span class="ticket-value">{{$code}}</span>
                    </div>


                    @if($active==2)
                     <div class="row ticket-line">
                       <button class="button-gauqmeba"  rel="{{$id}}" id="deactivateorder">ჯავშნის გაუქმება</button>
                    </div>
                    @endif
