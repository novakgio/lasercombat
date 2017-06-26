<i class="ion-close-round close-inner-popup" id="close-ticket"></i>
                    <div class="row ticket-line">
                        <span class="ticket-title">Date:</span>
                        <span class="ticket-value">{{$date}}</span>
                    </div>
                    <div class="row ticket-line">
                        <span class="ticket-title">Start Time:</span>
                        <span class="ticket-value">{{$start_time}}</span>
                    </div>
                    <div class="row ticket-line">
                        <span class="ticket-title">End Time:</span>
                        <span class="ticket-value">{{$end_time}}</span>
                    </div>

                    @php
                   
                    $state= ($active==1) ? "ნაყიდი":"დაჯავშნილი";
                    @endphp
                    <div class="row ticket-line">
                        <span class="ticket-title">Type:</span>
                        <span class="ticket-value">{{$state}}</span>
                    </div>
                    
                    <div class="row ticket-line">
                        <span class="ticket-title">Number Of Players:</span>
                        <span class="ticket-value">{{$people}}</span>
                    </div>