
<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>The HTML5 Herald</title>
        <meta name="description" content="The HTML5 Herald">
        <meta name="author" content="SitePoint">
        
        <link rel="stylesheet" type="text/css" href="{{asset('css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/loading.css')}}">
        <link rel="stylesheet" href="{{asset('css/grid.css')}}">
        <link rel="stylesheet" href="{{asset('css/overlay.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
            <link rel="stylesheet" href="{{asset('css/particles.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.fullpage.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <img src="img/logo.png" class="load-image">
                </div>
            </div>
        </div>
        <div class="after-loading" id="after-loading">
            @include('includes.registration')
            
            
            <div id="fullpage">
                <div class="section " id="section0">
                    <div class="count-particles" id="particles-myfirst">
                        <span class="js-count-particles">--</span> particles
                    </div>
                    <!-- particles.js container -->
                    <div  class="particles-myjs" id="particles-js"></div>
                    <div class="intro">
                        <div class="nav-container">
                            <nav class="sticky">
                                <div class="row">
                                    <img src="resource/img/logo.png" alt="Laser Combat logo" class="logo-black">
                                    <img src="resource/img/LaserCombatText.png" alt="Laser Combat logo" class="logo-text">
                                    <div>
                                        <ul class="main-nav js--main-nav">
                                            <li><a href="#section1">Services</a></li>
                                            <li><a href="#section2">Gallery</a></li>
                                            <li><a href="#section3">Contact</a></li>
                                            <li><a href="#" id="sign-up">Sign up</a></li>
                                        </ul>
                                    </div>
                                    <a class="mobile-nav-icon js--nav-icon"><i class="ion-navicon-round"></i></a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="section " id="section1">
                    <div class="intro">
                        <div class="row">
                            <h2>Services</h2>
                        </div>
                        <div class="table-container">
                            <div class="row">
                                <div class="col span-1-of-5 days">
                                @foreach($weekDayDates as $date)
                                    <div class="day-cube" rel="{{$date['id']}}">
                                        
                                        <p class="cube-label">{{$date['date']}}</p>
                                        <p class="cube-label day-label">{{$date['day']}}</p>
                                    </div>
                                @endforeach
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
                                                        <p class="guid-label free-text"> -   Free</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col span-1-of-3 guid-column">
                                                <div class="row">
                                                    <div class="col span-1-of-4 text-right">
                                                        <div class="guid-cube Reserved-cube"></div>
                                                    </div>
                                                    <div class="col span-3-of-4 text-left">
                                                        <p class="guid-label Reserved-text"> -   Reserved</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col span-1-of-3 guid-column">
                                                <div class="row">
                                                    <div class="col span-1-of-4 text-right">
                                                        <div class="guid-cube Bought-cube"></div>
                                                    </div>
                                                    <div class="col span-3-of-4 text-left">
                                                        <p class="guid-label Bought-text"> -   Bought</p>
                                                    </div>
                                                </div>
                                            </div>
<!--
                                            <div class="col span-1-of-4 guid-column">
                                                <div class="row">
                                                    <div class="col span-1-of-4 text-right">
                                                        <div class="guid-cube Your-cube"></div>
                                                    </div>
                                                    <div class="col span-3-of-4 text-left">
                                                        <p class="guid-label Your-text"> -   Your</p>
                                                    </div>
                                                </div>
                                            </div>
-->
                                        </div>
                                       
                                        <div class="row  time-line-container no-padding-bottom">
                                        <div class="show_order_table">
                                            {!!$orderTable!!}
                                            </div>


                                           
                                        </div>
                                        <div class="row time-value-continer">
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value">14:00</p>
                                            </div>
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value">15:00</p>
                                            </div>
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value">16:00</p>
                                            </div>
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value">17:00</p>
                                            </div>
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value">18:00</p>
                                            </div>
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value">19:00</p>
                                            </div>
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value">20:00</p>
                                            </div>
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value">21:00</p>
                                            </div>
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value">22:00</p>
                                            </div>
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value">23:00</p>
                                            </div>
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value">24:00</p>
                                            </div>
                                            <div class="col span-1-of-12 border-left">
                                                <p class="time-value">01:00</p>
                                               
                                            </div>
                                             <div class="col span-1-of-12 border-left">
                                                <p class="time-value">02:00</p>
                                               
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
                                                            <p class="input-label"> - Start Time</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col span-1-of-2">
                                                    <div class="row">
                                                        <div class="col span-1-of-2">
                                                            <input type="text" placeholder="15:10" id="end_time" class="small-iput">
                                                        </div>
                                                        <div class="col span-1-of-2 text-left">
                                                            <p class="input-label"> - End Time</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row people-range-container">
                                            <div class="row">
                                                <div class="range-slider">
                                                    <div class="col span-1-of-4">
                                                        <input class="range-slider__range" id="people_range" type="range" value="0" min="0" max="10">
                                                    </div>
                                                    <div class="col span-3-of-2 text-left">
                                                        <span class="range-slider__value">0</span>
                                                        <p class="value-label"> - Poeple Range</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row button-line-container">
                                            <div class="row">
                                                <div class="col span-1-of-4">
                                                    <button class="button" rel="{{$today_id}}" id="reserve">Reserve</button>
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
                            <h2>Gallery</h2>
                        </div>
                        <div class="row gallery-container">
                            <div class="col span-1-of-4">
                                <div class="gallery-cube">
                                    
                                </div>
                            </div>
                            <div class="col span-1-of-4">
                                <div class="big-gallery-cube">
                                    
                                </div>
                            </div>
                            <div class="col span-1-of-4">
                                <div class="big-gallery-cube">
                                    
                                </div>
                            </div>
                            <div class="col span-1-of-4">
                                <div class="gallery-cube">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section " id="section3">
                    <div class="intro">
                        <div class="row">
                            <h2>Contact</h2>
                        </div>
                        <div class="row contact-form-container">
                            <div class="col span-1-of-2">
                                <div class="row contact-line">
                                    <div class="icon-big-container address">
                                        <i class="ion-checkmark-round icon-big"></i>
                                    </div>
                                    <div class="icon-text-right address">
                                        <span class="contact-label">Mithskevichi N5</span>
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
                                            <span class="contact-label googleplus">Google+</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="row contact-line">
                                    <a href="https://www.google.ge/">
                                        <div class="icon-big-container address instagram">
                                            <i class="ion-social-instagram-outline icon-big"></i>
                                        </div>
                                        <div class="icon-text-right address">
                                            <span class="contact-label instagram">Instagram</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col span-1-of-2">
                                <div class="map-container">
                                    <div id="map" style="width:100%;height:100%;"></div>
                                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbiVr96GbZnwnSs4nc1Yggn63X7V-idMQ&callback&libraries&libraries=places&callback=initMap"></script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row footer-row">
                        <p class="long-copy-footer">
                            <span>This</span> Webpage was created by <span class="yellow"> Laser Combat.</span>
                        </p>
                        <p class="long-copy-footer">
                            Build with<span class="red"> <i class="ion-heart footer-icon "></i> </span> in 2017,   all rights <span class="blue"> reserved.</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('js/js.js')}}"></script>
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="{{asset('js/scrolloverflow.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/jquery.fullPage.js')}}"></script>
         <script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
         <script type="text/javascript" src="{{asset('js/particles.js')}}"></script>
          <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
           <script type="text/javascript" src="{{asset('js/stats.js')}}"></script>
           <script>
            var count_particles, stats, update;
            stats = new Stats;
            stats.setMode(0);
            stats.domElement.style.position = 'absolute';
            stats.domElement.style.left = '0px';
            stats.domElement.style.top = '0px';
            document.body.appendChild(stats.domElement);
            count_particles = document.querySelector('.js-count-particles');
            update = function() {
                stats.begin();
                stats.end();
                if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
                  count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
                }
                requestAnimationFrame(update);
            };
            requestAnimationFrame(update);
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });
                var homeURL = "{{url('')}}";

                 
                // $('#fullpage').fullpage({
                //     anchors: ['firstPage', 'secondPage', '3rdPage'],
                //     scrollBar: true
                // });


                $('#createaccount').on('click',function(){
                    var error = "";
                    var name = $('#username').val();
                    var email = $('#email').val();
                    var phone = $('#phone').val();
                    var pass = $('#password').val();
                    var confirmpass = $('#confirmpass').val();
                    if(name=="" || phone=="" || pass=="" || confirmpass==""){
                        error = "Please,Fill Out All Fields  ";
                    }
                    else if(pass!=confirmpass){
                        error = "Passwords don't match   ";
                    }
                    else if(!Number.isInteger(parseInt(phone)) || phone.length<9){
                        error = "phone format is wrong.  "
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
                                      text: "You Have Registered Successfully.Click OK To Move On",
                                      type: "success",
                                      showConfirmButton: true,
                                      confirmButtonColor: "#DD6B55",
                                      confirmButtonText: "Click Me",
                                     
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
                        sweetAlert("Oops...", "Please,Fill Out All Fields", "error");
                        
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
                            }
                            else{
                                sweetAlert("Oops...", data.error, "error");
                            }
                        });
                    }


                });
                 function timeValidation(start_time,end_time){
                    
                    var start_firstTime =   parseInt(start_time.split(":")[0]); // like 14,15,16
                    var start_secondTime = parseInt(start_time.split(":")[1]); // like minutes,20,40,50

                    var end_firstTime = parseInt(end_time.split(":")[0]);
                    var end_secondTime = parseInt(end_time.split(":")[1]);
                    console.log(start_firstTime);
                    console.log(start_secondTime);
                    console.log(end_firstTime);
                    console.log(end_secondTime); 
                    if((start_firstTime==01 || start_firstTime==02)) return true;
                    else if(start_firstTime>end_firstTime) return false;
                    else if(start_firstTime<14 || start_firstTime>24 || end_firstTime>=60 || end_secondTime>=60) return false;


                    var getFirstTime = end_firstTime - start_firstTime;
                    var getSecondTime = end_secondTime - start_secondTime;
                    
                    if(getFirstTime==0 && getSecondTime<40){
                        return "Minimal Play Time 40 Minutes";
                    }
                    else if(getFirstTime==1 && getSecondTime>20){
                        return "Max Play Time 1:20 Minutes";
                    }
                    else { return true;}






                }

                function goToOrder(){
                    var start_time = $('#start_time').val();
                    var end_time = $('#end_time').val();
                    var people_range=$('#people_range').val();
                    var week_id = $('#reserve').attr('rel');
                    var validateTime = timeValidation(start_time,end_time);
                    if(start_time=="" || end_time=="" || people_range==0){
                        alert('save all fields');
                    }
                    else if(validateTime==false){
                        sweetAlert("Oops...", "rules how to enter time", "error");
                        
                    }
                    else if(validateTime!=true && validateTime!=false){
                        sweetAlert("Oops...", validateTime, "error");
                        
                    }
                    else{
                     $.ajax({
                            method: "POST",
                            url: "{{url('checkOrder')}}",
                            data:{start_time:start_time,end_time:end_time,people_range:people_range,week_id:week_id}
                        }) 
                        .done(function (data){

                            sweetAlert("Oops...", data.error, "error");
                        });
                    }

                    
                }

               



                function showRegister(){
                    $( ".nav-container" ).fadeOut('slow');
                    $( "#overlay" ).fadeIn('slow');
                    $('#registration-chooser').fadeIn( 'slow' );
                    windowOverlay = document.getElementById('overlay').offsetHeight;
                    registrationHeight = document.getElementById('registration-chooser').offsetHeight;
                    $('#registration-chooser').css("margin-top", (windowOverlay - registrationHeight)/2 );
                }

                $( "#reserve" ).click(function() {
                    
                   
                    if(user!=true){
                        showRegister();
                    }
                    else{
                        goToOrder();
                    }
                });

                $('.day-cube').on('click',function(){
                    var week_id =$(this).attr('rel');
                    $('#reserve').attr('rel',week_id);
                    $.ajax({
                            method: "POST",
                            url: "{{url('dayOrder')}}",
                            data:{week_id:week_id}
                        }) 
                        .done(function (data){
                            $('.show_order_table').html(data.orderTable);
                            
                    });

                });

                

                








            });



        </script>
        
    </body>
</html>