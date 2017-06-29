
<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Laser Combat</title>
        <meta name="description" content="The HTML5 Herald">
        <meta name="author" content="SitePoint">
        
       @include('layouts.cssurls')
    <script>
          function initMap() {
            var uluru = {lat: 41.721349, lng: 44.789097};
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 15,
              center: uluru
            });
            var marker = new google.maps.Marker({
              position: uluru,
              map: map
            });
          }
        </script>
        
    </head>

    <body>
     @if(Auth::check())
                                            <script>{{ 'var user = true;' }}</script>
                                        @else
                                            <script>{{ 'var user = false;' }}</script>
                                        @endif
        
        <div class="loading" id="loading">
            <div class="loading-container" id="loader-page">
                <div class="loader" id="loader-box">
                    <div class="background-loader"></div>
                    <div class="background-loader-second"></div>
                    <div class="background-loader-third"></div>
                    <div class="background-loader-fourth"></div>
                    <div class="background-loader-fifth"></div>
                    <img src="public/img/logo.png" class="load-image">
                </div>
            </div>
        </div>
        <div class="after-loading" id="after-loading">
            @include('includes.registration')
            
              <div class="profile-form" id="profile-popup">
                    <div class="row distance-big">
                        <h3 class="header-third">ჩემი ბილეთები</h3>
                    </div>
                    <div class="row profile-row">
                        <div class="col span-1-of-3 responsive-1-3-col">
                            <div class="row centered-row">
                                <div class="large-icon-container" id="seeticket">
                                    <i class="ion-pricetag icon-large-mine"></i>
                                </div>
                            </div>
                            <div class="row centered-row">
                                <div class="ticket" id="seeticket">
                                    <h4 class="icon-large-text">ჩემი ბილეთები</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col span-1-of-3 responsive-1-3-col">
                            <div class="row centered-row">
                                <div class="large-icon-container" id="my-textus">
                                    <i class="ion-chatbox-working icon-large-mine"></i>
                                </div>
                            </div>
                            <div class="row centered-row">
                                <h4 class="icon-large-text">მოგვწერეთ</h4>
                            </div>
                        </div>
                        <div class="col span-1-of-3 responsive-1-3-col">
                            <div class="row centered-row">
                                <div class="large-icon-container" id="my-contact">
                                    <i class="ion-android-mail icon-large-mine"></i>
                                </div>
                            </div>
                            <div class="row centered-row">
                                <h4 class="icon-large-text">კონტაქტი</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="user-ticket-section" id="user-ticket">
                    
                </div>
                <div class="user-textus-section" id="textus">
                    <i class="ion-close-round close-inner-popup" id="close-textus"></i>
                    <h2 class="header-textus">მოგვწერეთ</h2>
                    <div class="row butons-container">
                        <div class="row button-container">
                            <input type="text" placeholder="About" id="emailabout" class="big-input">
                        </div>
                        <div class="row button-container">
                            <textarea rows="5" class="textarea" id="emailtext" placeholder="Tour Expression..."></textarea>
                        </div>
                        <div class="row button-container">
                            <div class="button-login account-button" id="emailsend">Send</div>
                        </div>
                    </div>
                </div>

                <div class="user-textus-section" id="mobile-us">
                    <i class="ion-close-round close-inner-popup" id="close-textus"></i>
                    <h2 class="header-textus">შეიყვანეთ ტელეფონის ნომერი</h2>
                    <div class="row butons-container">
                        <div class="row button-container">
                            <input type="text" placeholder="მიუთითეთ ნომერი" id="mobileus" class="big-input">
                        </div>
                        <div class="row button-container">
                            <div class="button-login account-button" id="mobilesend">Send</div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div id="fullpage">
                <div class="section " id="section0">
                    <div class="row header-info-container" id="header-info">
                        <div class="first-wave">
                            <h3 class="header-info js-header-1">მოემზადე</h3>
                            <h3 class="header-info js-header-2">დატენე შენი ბლასტერი</h3>
                            <h3 class="header-info js-header-3">ისთ ფოინთში ლაზერული ომები იწყება!</h3>
                        </div>
                        <h3 class="header-info js-header-4">დაიწყე თამაში ახლავე</h3>
                        <div class="row centered-second js-header-5">
                            <i class="ion-arrow-down-c js--header-icon"></i>
                        </div>
                        <a href="#section1">
                            <h3 class="header-info buttonich js-header-6">დაჯავშნე</h3>
                        </a>
                    </div>
                    <!-- particles.js container -->
                    <div  class="partickles-mine" id="particles-js"></div>
                    <div class="intro">
                        <div class="nav-container">
                            <nav class="sticky">
                                <div class="row">
                                    <img src="public/resource/img/logo.png" alt="Laser Combat logo" class="logo-black">
                                    <img src="public/resource/img/LaserCombatText.png" alt="Laser Combat logo" class="logo-text">
                                    <div>
                                        <ul class="main-nav js--main-nav">
                                            <li><a href="#section1">დაჯავშნა</a></li>
                                            <li><a href="#section2">გალერეა</a></li>
                                            <li><a href="#section3">კონტაქტი</a></li>

                                            @if(!Auth::check())

                                            <li><a href="#" id="sign-up">შესვლა</a></li>
                                            @else
                                             <li><a href="#section0" id="prfile">პროფილი</a></li>
                                            <li><a href="{{url('logout')}}" id="sign-up">გამოსვლა</a></li>
                                            @endif

                                        </ul>
                                    </div>
                                    <a class="mobile-nav-icon js--nav-icon"><i class="ion-navicon-round"></i></a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                 <div class="section " id="section1">
                    <div class="intro responsive-section-two">
                        <div class="row">
                            <h2>დაჯავშნა</h2>
                        </div>
                        <div class="table-container">
                            <div class="row">
                                <div class="col span-1-of-5 days">
                                @php $selected = true;  $className="";@endphp
                                
                                <?php foreach($weekDayDates as $date){

                                    if($selected){
                                        $className = "selected-day";
                                        $selected=false;
                                    }
                                    else{
                                        
                                        $className="";
                                    }
                                ?>


                                    <div class="day-cube <?php echo $className;?>" rel="{{$date['id']}}">
                                        
                                        <p class="cube-label">{{$date['date']}}</p>
                                        <p class="cube-label day-label font-18">{{$date['day']}}</p>
                                    </div>


                                <?php }?>
                                </div>
                               <div class="col span-4-of-5">
                                    <div class="board">
                                        <div class="row guid-container">
                                            <div class="col span-1-of-3 guid-column">
                                                <div class="row">
                                                    <div class="col span-1-of-4 text-right">
                                                        <div class="guid-cube free-cube"></div>
                                                    </div>
                                                    <div class="col span-3-of-4 text-left">
                                                        <p class="guid-label free-text font-15"> -   თავისუფალი</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col span-1-of-3 guid-column">
                                                <div class="row">
                                                    <div class="col span-1-of-4 text-right">
                                                        <div class="guid-cube Reserved-cube"></div>
                                                    </div>
                                                    <div class="col span-3-of-4 text-left">
                                                        <p class="guid-label Reserved-text font-15"> -   დაჯავშნილი</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col span-1-of-3 guid-column">
                                                <div class="row">
                                                    <div class="col span-1-of-4 text-right">
                                                        <div class="guid-cube Bought-cube"></div>
                                                    </div>
                                                    <div class="col span-3-of-4 text-left">
                                                        <p class="guid-label Bought-text font-15"> -   ნაყიდი</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="row  time-line-container no-padding-bottom">
                                        <div class="show_order_table">
                                            {!!$orderTable!!}
                                            </div>


                                           
                                        </div>
                                        <div class="row time-value-continer">
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value font-10">14:00</p>
                                            </div>
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value font-10">15:00</p>
                                            </div>
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value font-10">16:00</p>
                                            </div>
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value font-10">17:00</p>
                                            </div>
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value font-10">18:00</p>
                                            </div>
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value font-10">19:00</p>
                                            </div>
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value font-10">20:00</p>
                                            </div>
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value font-10">21:00</p>
                                            </div>
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value font-10">22:00</p>
                                            </div>
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value font-10">23:00</p>
                                            </div>
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value font-10">24:00</p>
                                            </div>
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value font-10">01:00</p>
                                                <p class="time-value-right font-10">02:00</p>
                                            </div>
                                        </div>
                                        <div class="row times-line-container">
                                            <div class="row">
                                                <div class="col span-1-of-2">
                                                    <div class="row">
                                                        <div class="col span-1-of-2">
                                                            <input type="text" placeholder="14:20" id="start_time" class="small-iput">
                                                        </div>
                                                        <div class="col span-1-of-2 text-left">
                                                            <p class="input-label font-13"> - დაწყების დრო</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col span-1-of-2">
                                                    <p class="usual-text font-13">ფასი ერთ ადამიანზე: <span id="1person">X</span>
                                                    ლარი</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col span-1-of-2">
                                                    <div class="row">
                                                        <div class="col span-1-of-2">
                                                            <input type="text" placeholder="15:10" id="end_time" class="small-iput">
                                                        </div>
                                                        <div class="col span-1-of-2 text-left">
                                                            <p class="input-label font-13"> - დასრულების დრო</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col span-1-of-2">
                                                    <p class="usual-text font-13">ფასი <span id="howmanypeople"> 4 </span> ადამიანზე: <span id="morepeople">X</span>ლარი</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row people-range-container">
                                            <div class="row">
                                                <div class="range-slider">
                                                    <div class="col span-1-of-4">
                                                        <input class="range-slider__range" id="people_range" type="range" value="4" min="4" max="14">
                                                    </div>
                                                    <div class="col span-3-of-2 text-left">
                                                        <span class="range-slider__value">4</span>
                                                        <p class="value-label font-13"> - ხალხის რაოდენობა</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row button-line-container">
                                            <div class="row">
                                                <div class="col span-1-of-4">
                                                    <button class="button font-13" rel="{{$today_id}}" id="reserve">დაჯავშნე</button>
                                                </div>
                                                 
                                            </div>

                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section " id="section2">
                    <div class="intro">
                        <div class="row">
                            <h2>გალერეა</h2>
                        </div>
                        <div class="row gallery-container">
                            <!-- Start WOWSlider.com BODY section -->
                            <div id="wowslider-container1">
                            <div class="ws_images"><ul>
                            @php $i=0;@endphp
                            @foreach($imgs as $img)

                                    <li><img src="public/galleryimages/<?php echo $img->img;?>" alt="first - Copy (2)" title="first - Copy (2)" id="wows1_$i"/></li>
                                    $i++;
                            @endforeach
                                </ul></div>
                            </div>  
                            
                            <!-- End WOWSlider.com BODY section -->
                        </div>
                    </div>
                </div>
                        <div class="section " id="section3">
                    <div class="intro">
                        <div class="row">
                            <h2>კონტაქტი</h2>
                        </div>
                        <div class="row contact-form-container">
                            <div class="col span-1-of-2 responsive-1-2-col">
                                <div class="row contact-line">
                                    <div class="icon-big-container address">
                                        <i class="ion-checkmark-round icon-big"></i>
                                    </div>
                                    <div class="icon-text-right address">
                                        <span class="contact-label">სავაჭრო ცენტრი "ისთ ფოინთი", თვალჭრელიძის 2</span>
                                    </div>
                                </div>
                                <div class="row contact-line">
                                    <div class="icon-big-container address">
                                        <i class="ion-ios-telephone icon-big"></i>
                                    </div>
                                    <div class="icon-text-right address">
                                        <span class="contact-label">593 245 123</span>
                                    </div>
                                </div>
                                <div class="row contact-line">
                                    <a href="#section4" id="contact-drop-line" class="contact-drop-us-a-line">
                                        <div class="icon-big-container address instagram">
                                            <i class="ion-android-mail icon-big"></i>
                                        </div>
                                        <div class="icon-text-right address">
                                            <span class="contact-label instagram">მოგვწერეთ</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="row contact-line">
                                    <a href="https://www.google.ge/">
                                        <div class="icon-big-container address facebook">
                                            <i class="ion-social-facebook icon-big-slim"></i>
                                        </div>
                                        <div class="icon-text-right address">
                                            <span class="contact-label facebook">Facebook</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="row contact-line">
                                    <a href="https://www.google.ge/">
                                        <div class="icon-big-container address googleplus">
                                            <i class="ion-social-googleplus icon-big"></i>
                                        </div>
                                        <div class="icon-text-right address">
                                            <span class="contact-label googleplus">Info@lasercombat.com</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col span-1-of-2  responsive-1-2-col">
                                <div class="map-container">
                                    <div id="map" style="width:100%;height:100%;"></div>
                                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbiVr96GbZnwnSs4nc1Yggn63X7V-idMQ&callback&libraries&libraries=places&callback=initMap"></script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row footer-row">
                        <p class="long-copy-footer">
                            <span>Laser</span> Combat <span class="yellow">@2017</span>
                        </p>
                        <!-- <p class="long-copy-footer">
                            Build with<span class="red"> <i class="ion-heart footer-icon "></i> </span> in 2017,   all rights <span class="blue"> reserved.</span>
                        </p> -->
                    </div>
                </div>
            </div>
        </div>

       @include('layouts.jssurls')
          

        <script type="text/javascript">
            $(document).ready(function() {
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });
                console.log($('.buyfivepercent').text());
                var homeURL = "{{url('')}}";

                $(document).on("keyup", "#end_time", function(){
                        getPrices();
                });

                $(document).on('focusout','#end_time',function(){
                    if($(this).val().split(":")[1]!="0" && $(this).val().split(":")[1]!="00")
                        var final;
                        var value = $(this).val().split(":")[0]+":";
                        var round = Math.round(parseInt($(this).val().split(":")[1])/ 10) * 10;
                        if(round==0){
                            final = value+"0"+round;
                            $('#end_time').val(final);
                        }
                        else{

                            $('#end_time').val(value+round);
                        }

                });

                $('#people_range').on('change',function(){
                    getPrices();
                });

            

                function getPrices(){
                    var start_time = $('#start_time').val();
                    var end_time = $('#end_time').val();
                    var people_range = $('#people_range').val();
                    var week_id = $('#reserve').attr('rel');
                   
                    if(start_time!="" && end_time!=""){
                        $.ajax({
                            method: "POST",
                            url: "{{url('pricegetter')}}",
                            data:{start_time:start_time,end_time:end_time,people_range:people_range,week_id:week_id}
                        }) 
                        .done(function (data){
                            $('#1person').text(data.onePerson);
                            $('#morepeople').text(data.onePerson * people_range);
                            $('#howmanypeople').text(people_range);

                        });
                    }


                }



                $('#createaccount').on('click',function(){
                    var error = "";
                    var name = $('#username').val();
                    var email = $('#email').val();
                    var phone = $('#phone').val();
                    var pass = $('#password').val();
                    var confirmpass = $('#confirmpass').val();
                    if(name=="" || phone=="" || pass=="" || confirmpass==""){
                        error = "გთხოვთ შეავსოთ ყველა ველი";
                    }
                    else if(pass!=confirmpass){
                        error = "პაროლები არ ემთხვევა";
                    }
                    else if(!Number.isInteger(parseInt(phone)) || phone.length<9){
                        error = "მობილურის ფორმატი არასწორია"
                    }
                    if(error!=""){
                        sweetAlert("Oops...", error, "error");
                    }
                    else 
                    {
                        $.ajax({
                            method: "POST",
                            url: "{{url('register')}}",
                            data:{name:name,email:email,phone:phone,pass:pass,confirmpass:confirmpass}
                        }) 
                        .done(function (data){
                            if(data.error == "") {
                                swal({
                                      title: "Congratulations!",
                                      text: "თქვენ წარმატებით დარეგისტრირდით ! და დაეთანხმეთ ღილაკზე თითის დაჭერით",
                                      type: "success",
                                      showConfirmButton: true,
                                      confirmButtonColor: "#DD6B55",
                                      confirmButtonText: "დამკლიკე",
                                     
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = homeURL;
                                  } 
                                });
                              
                            }
                            else{
                                sweetAlert("Oops...", data.error, "error");
                            }
                        });
                    }


                });
                $('#loginuser').on('click',function(){
                    var email = $('#logemail').val();
                    var pass = $('#logpassword').val();
                    if(email=="" ||  pass==""){
                        sweetAlert("Oops...", "გთხოვთ შეავსოთ ორივე ველი", "error");  
                    }
                    else
                    {
                        $.ajax({
                            method: "POST",
                            url: "{{url('login')}}",
                            data:{email:email,pass:pass}
                        }) 
                        .done(function (data){
                            if(data.error == "") {
                               window.location.href = homeURL;
                                $('html, body').animate({
                                    scrollTop: $("#section1").offset().top
                                }, 2000);
                            }
                            else{
                                sweetAlert("Oops...", data.error, "error");
                            }
                        });
                    }


                });






               
                $(document).on("click", ".ordertime", function(){
                    var start_time = $('#start_time').val();
                    var end_time = $('#end_time').val();
                    var value = $(this).attr('rel');

                    if(end_time=="" && start_time==""){
                        $('#start_time').val(value);
                        endTimeSet(value);
                    }
                    else if(end_time!="" && start_time!=""){
                        $('#start_time').val(value);
                        endTimeSet(value);
                    }
                    getPrices();

                    $(".popup-selected").css( "visibility", "hidden" );
                    $(this).children(".popup-selected").css( "visibility", "visible" );

                    
                    

                });
                $(document).on("click", "#section1", function(){
                   if(user!=true)
                        showRegister();

                });
                


                 function getDifferenceTime(start_time,second_time){
                    var timeStart = new Date("Mon Jan 01 2007 "+start_time+ " GMT+0530").getTime();
                    var timeEnd = new Date("Mon Jan 01 2007 "+second_time+" GMT+0530").getTime();
                    var hourDiff = timeStart - timeEnd; //in ms
                    var secDiff = hourDiff / 1000; //in s
                    var minDiff = hourDiff / 60 / 1000; //in minutes
                    var hDiff = hourDiff / 3600 / 1000; //in hours
                    var humanReadable = {};
                    humanReadable.hours = Math.floor(hDiff);
                    humanReadable.minutes = minDiff - 60 * humanReadable.hours;
                    return humanReadable;
                }


                 function timeValidation(start_time,end_time){

                    var start_firstTime =   parseInt(start_time.split(":")[0]); // like 14,15,16
                    var start_secondTime = parseInt(start_time.split(":")[1]); // like minutes,20,40,50
                    $min40 = "მინიმუმ შეგიძლიათ შეუკვეთოთ 30 წუთი";
                    $max80 = "მაქსიმუმ შეგიძლიათ შეუკვეთოთ 80 წუთი";

                    var end_firstTime = parseInt(end_time.split(":")[0]);
                    var end_secondTime = parseInt(end_time.split(":")[1]);
                    if(start_time.length!=5 || end_time.length!=5) return false;
                    else if(isNaN(start_secondTime) || isNaN(end_secondTime)) return false;
                    
                    if( (start_firstTime>=14 && start_firstTime<=23) || start_firstTime==00 || start_firstTime==01){
                        if( (end_firstTime>=14 && end_firstTime<=23) || end_firstTime==00 || end_firstTime==01 || (end_firstTime==02 && end_secondTime==00)){
                            if(end_firstTime<start_firstTime && start_firstTime!=23) return false;
                            if(start_secondTime>=60 || end_secondTime>=60) return false;
                            var humanReadable = getDifferenceTime(end_time,start_time);
                            if(start_firstTime==23 && end_firstTime==00){
                                var difference = start_secondTime-end_secondTime;
                                difference = (difference>0) ? difference : -difference;
                                if(difference>20) return $max80;
                                else return true;
                            }
                            if(humanReadable.hours==1 && humanReadable.minutes>20) return $max80;
                            else if(humanReadable.hours==1 && humanReadable.minutes<=20) return true;


                            else if(humanReadable.hours==0 && humanReadable.minutes<30) return $min40;
                            else if(humanReadable.hours==0 && humanReadable.minutes>=30) return true;

                            else return $max80;
                        } else { return false;}
                    } else{return false;}

                    return true;
                }

                $('#start_time').on('focusout',function(){
                        if($(this).val().length==5){
                            var final;
                            if($(this).val().split(":")[1]!="0" && $(this).val().split(":")[1]!="00"){
                                var value = $(this).val().split(":")[0]+":";
                                var round = Math.round(parseInt($(this).val().split(":")[1])/ 10) * 10;
                                if(round==0){
                                    final = value+"0"+round;
                                    $('#start_time').val(final);
                                }
                                else{

                                    $('#start_time').val(value+round);
                                }
                                
                            }
                            endTimeSet($(this).val());

                                
                        }

                    });




                function endTimeSet(time){
                        
                        var end_time_minutes = 0;
                        var first = parseInt(time.split(":")[0]);
                        var second =parseInt(time.split(":")[1]);
                        var minutes = 60-second;
                        if(second<30) {

                            end_time_minutes=second+30;
                            if(first<10) first="0"+first;
                            $('#end_time').val(first+":"+end_time_minutes);
                        }else{
                            if(first==23){ var first_time = "0";}
                            else { var first_time = first+1;}
                            if(first_time<10) first_time="0"+first_time;
                            end_time_minutes=second+30-60;
                            if(end_time_minutes<10) end_time_minutes="0"+end_time_minutes
                            $('#end_time').val(first_time+":"+end_time_minutes);
                        }
                         

                    }



                function goToOrder(){
                    var start_time = $('#start_time').val();
                    var end_time = $('#end_time').val();
                    var people_range=$('#people_range').val();
                    var week_id = $('#reserve').attr('rel');
                    var validateTime = timeValidation(start_time,end_time);
                    var differenceTime = getDifferenceTime(end_time,start_time);

                    
                    if(start_time=="" || end_time=="" || people_range==0){
                        sweetAlert("Oops...", "შეავსეთ ყველა ველი,რათა დაჯავშნოთ", "error");
                    }
                    else if(validateTime==false){
                        sweetAlert("Oops...", "დროს შეყვანის წესები: მიუთითეთ დროები 14:00 საათიდან ღამის 02:00 საათამდე,ნებისმიერი სხვა დროის ჩანაწერით ვერ მოახერხებთ დაჯავშნას.მაგალითად . 14:00  და 15:00", "error");
                        
                    }
                    else if(validateTime!=true && validateTime!=false){
                        sweetAlert("Oops...", validateTime, "error");
                        
                    }

                    else{
                        $.ajax({
                            method: "POST",
                            url: "{{url('getpriceorders')}}",
                            data:{start_time:start_time,end_time:end_time,people_range:people_range,week_id:week_id,differenceTime:differenceTime}
                        }) 
                        .done(function (data){
                            if(data.userPhone!=0){

                            }
                            else if(data.error==""){
                             showBuyButton(data.personPrice,data.fivePercent,data.tenPercent,data.total);
                            }
                            else{
                                sweetAlert("Oops...", data.error, "error");
                            }
                        });
                    }
                }


                $('#buyfivepercent_button').on('click',function(){

                    var price = $(this).attr('rel');
                    var start_time = $('#start_time').val();
                    var end_time = $('#end_time').val();
                    var week_id = $('#reserve').attr('rel');
                    var people = $('#people_range').val();
                    var buyfivepercent = homeURL+"/"+price+"/"+start_time+"/"+end_time+"/"+week_id+"/"+people;
                    window.location.href= buyfivepercent;

                });

                // $.ajax({
                //             method: "POST",
                //             url: "{{url('getpriceorders')}}",
                //             data:{start_time:start_time,end_time:end_time,people_range:people_range,week_id:week_id,differenceTime:differenceTime}
                //         }) 
                //         .done(function (data){
                //             var result = data.error;
                //             console.log(data);
                //             if(Number.isInteger(parseInt(result))){
                //                 showBuyButton(data.fivePercent,data.tenPercent,data.total,result,data.key);
                //             }
                //             else{
                //                 sweetAlert("Oops...", result, "error");
                //             }
                //         });
                //     }


                $(document).on("click", "#deactivateorder", function(){

                        var id = $(this).attr('rel');
                        $.ajax({
                            method: "POST",
                            url: "{{url('deactiveorderajax')}}",
                            data:{id:id}
                        }) 
                        .done(function (data){
                            swal({
                                      title: "შეტყობინება!",
                                      text: "თქვენ წარმატებით გააუქმეთ ჯავშანი",
                                      type: "success",
                                      showConfirmButton: true,
                                      confirmButtonColor: "#DD6B55",
                                      confirmButtonText: "დამკლიკე",
                                     
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = homeURL;
                                  } 
                                });
                            
                        });

                });
                $('#reservebutton').on('click',function(){

                    var start_time = $('#start_time').val();
                    var end_time = $('#end_time').val();
                    var people_range=$('#people_range').val();
                    var week_id = $('#reserve').attr('rel');
                     var differenceTime = getDifferenceTime(end_time,start_time);
                    $.ajax({
                            method: "POST",
                            url: "{{url('checkOrder')}}",
                            data:{start_time:start_time,end_time:end_time,people_range:people_range,week_id:week_id,differenceTime:differenceTime}
                        }) 
                        .done(function (data){
                            var result = data.error;
                            
                            if(Number.isInteger(parseInt(result))){
                                

                                swal({
                                      title: "თქვენი უნიკალური კოდი! "+ data.key,
                                      text: "თქვენ წარმატებით დაჯავშნეთ,თქვენი უნიკალური კოდია "+data.key,
                                      type: "success",
                                      showConfirmButton: true,
                                      confirmButtonColor: "#DD6B55",
                                      confirmButtonText: "დამკლიკე",
                                     
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = homeURL;
                                  } 
                                });



                            }
                            else{
                                sweetAlert("Oops...", result, "error");
                            }
                        });
                    });

                



                $('#buybutton').on('click',function(){
                    var order_id = $('#orderid').val();
                    window.location.href=homeURL+"/tbcpayment/"+order_id;

                });




                function showBuyButton(personPrice,fivePercent,tenPercent,total,key){
                    console.log(personPrice);
                    console.log(fivePercent);
                    console.log(tenPercent);
                    console.log(total);
                    console.log($('.buyfivepercent').text());
                    $('.buyfivepercent').text(personPrice);
                    $('.buyfivepercent_final').text(fivePercent);

                    $('.buytenpercent').text(total);
                    $('.buytenpercent_final').text(tenPercent);


                    $('#buytenpercent_button').attr('rel',tenPercent);
                    $('#buyfivepercent_button').attr('rel',personPrice);
                    $('#reserve-price').text(total);
                    
                   
                    $( ".nav-container" ).fadeOut('slow');
                    $( "#overlay" ).fadeIn('slow');
                    $('#reservepopup').fadeIn( 'slow' );
                    windowOverlay = document.getElementById('overlay').offsetHeight;
                    registrationHeight = document.getElementById('reservepopup').offsetHeight;
                    $('#reservepopup').css("margin-top", (windowOverlay - registrationHeight)/2 );
                }

               



                // მომხმარებელი აჭერს პროდუქტზე BUY (/buy)-ს. რომელსაც აკონტროლებს პირველი კონტროლერი რაც გამოგიგზავნე. ეგ კონტროლერი თავისით ამისამართებს view-ზე, რომელიც ისევ თავისით ამისამართებს tbc-ს url-ზე, სადაც ხდება ბარათის ნომრის ჩაწერა და გადახდა. სერვერული შეცდომის გარდა ყველა ვარიანტში, თიბისი აბრუნებს შენ /ok ურლ-ზე, თავისი $_REQUEST['trans_id']-ით. რომელსაც შენ ისევ curl-ში აგზავნი და რესპონსად გიბრუნდება ტრანზაქციის აიდის სტატუსი, შესრულდა თუარა ტრანზაქცია წარმატებით.

               



                function showRegister(){
                    $( ".nav-container" ).fadeOut('slow');
                    $( "#overlay" ).fadeIn('slow');
                    $('#registration-chooser').fadeIn( 'slow' );
                    windowOverlay = document.getElementById('overlay').offsetHeight;
                    registrationHeight = document.getElementById('registration-chooser').offsetHeight;
                    $('#registration-chooser').css("margin-top", (windowOverlay - registrationHeight)/2 );
                }

                $( "#reserve" ).click(function() {
                    if(user!=true)
                      showRegister();
                    else{
                        $.ajax({
                            method: "POST",
                            url: "{{url('checkUserMobile')}}",
                            
                        }) 
                        .done(function (data){
                            if(data.error==0){
                                showMobileUs();
                            }
                            else{
                                goToOrder();
                            }
                            
                        });
                       
                    }

                     
                    

                    
                });


                $('#mobilesend').on('click',function(){

                    var phone = $('#mobileus').val();
                    if(phone=="" || phone.length<9 || phone.length>9){
                        sweetAlert("Oops...", "შეიყვანეთ ვალიდური მობილურის ნომერი", "error");
                    }
                    else{
                        $.ajax({
                            method: "POST",
                            url: "{{url('savemobile')}}",
                            data:{phone:phone}
                        }) 
                        .done(function (data){
                           if(data.error==1){
                                goToOrder();
                           }
                            
                    });
                    }

                });

                function showMobileUs(){
                    $( "#overlay" ).fadeIn('slow');
                    $('#mobile-us').fadeIn( 'slow' );
                    windowOverlay = document.getElementById('overlay').offsetHeight;
                    registrationHeight = document.getElementById('mobile-us').offsetHeight;
                    $('#mobile-us').css("margin-top", (windowOverlay - registrationHeight)/2 );
                }

                $('.day-cube').on('click',function(){
                    var week_id =$(this).attr('rel');
                    $('.day-cube').removeClass("selected-day");
                    $(this).addClass("selected-day");
                    $('#reserve').attr('rel',week_id);
                    $.ajax({
                            method: "POST",
                            url: "{{url('dayOrder')}}",
                            data:{week_id:week_id}
                        }) 
                        .done(function (data){
                            $('.show_order_table').html(data.orderTable);
                            getPrices();
                            
                    });


                });


                $('#logfacebook').on('click',function(){

                    window.location.href=homeURL+"/loginfacebook";
                })

                $('#emailsend').on('click',function(){
                    var emailabout = $('#emailabout').val();
                    var emailtext = $('#emailtext').val();

                    if(emailabout=="" || emailtext==""){
                         sweetAlert("Oops...", "შეავსეთ ორივე ველი", "error");
                    }
                    else{
                         $.ajax({
                            method: "POST",
                            url: "{{url('emailsend')}}",
                            data:{emailabout:emailabout,emailtext:emailtext}
                        }) 
                        .done(function (data){
                            swal({
                                      title: "შეტყობინება!",
                                      text: data.error,
                                      type: "success",
                                      showConfirmButton: true,
                                      confirmButtonColor: "#DD6B55",
                                      confirmButtonText: "დამკლიკე",
                                     
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = homeURL;
                                  } 
                                });
                            
                        });
                    }

                });



                $('#seeticket').on('click',function(){

                   
                     $.ajax({
                            method: "POST",
                            url: "{{url('getUserOrder')}}"
                        }) 
                        .done(function (data){
                            if(data.error){
                                sweetAlert("Oops...", data.error, "error");
                            }
                            else{
                                $('#profile-popup').fadeOut( 'slow' );
                                $('#user-ticket').fadeIn( 'slow' );
                                windowOverlay = document.getElementById('overlay').offsetHeight;
                                ticketHeight = document.getElementById('user-ticket').offsetHeight;
                                $('#user-ticket').css("margin-top", (windowOverlay - ticketHeight)/5 );
                                $('#user-ticket').html(data.userOrder);
                            }
                            
                        });

                });
                

                








            });



        </script>
        
    </body>
</html>