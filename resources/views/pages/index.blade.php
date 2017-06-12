
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

        <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.fullpage.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body>
        
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
                    <div class="intro">
                        <div class="nav-container">
                            <nav class="sticky">
                                <div class="row">
                                    <img src="resource/img/logo.png" alt="Laser Combat logo" class="logo-black">
                                    <div>
                                        <ul class="main-nav js--main-nav">
                                            <li><a href="#features">Main</a></li>
                                            <li><a href="#works">Services</a></li>
                                            <li><a href="#section2">Contact</a></li>
                                            @if(!Auth::user())
                                            <li><a href="#plans" id="sign-up">Sign up</a></li>
                                            @else
                                            <li><a href="{{route('logout')}}" id="sign-up">Log out</a></li>
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
                    <div class="intro">
                        <div class="row">
                            <h2>Serivces</h2>
                        </div>
                        <div class="table-container">
                            <div class="row">
                                <div class="col span-1-of-5 days">
                                    <div class="day-cube">
                                        <p class="cube-label">11/12/2015</p>
                                        <p class="cube-label day-label">Monday</p>
                                    </div>
                                    <div class="day-cube selected-day">
                                        <p class="cube-label">11/12/2015</p>
                                        <p class="cube-label day-label">Monday</p>
                                    </div>
                                    <div class="day-cube">
                                        <p class="cube-label">11/12/2015</p>
                                        <p class="cube-label day-label">Monday</p>
                                    </div>
                                    <div class="day-cube">
                                        <p class="cube-label">11/12/2015</p>
                                        <p class="cube-label day-label">Monday</p>
                                    </div>
                                    <div class="day-cube">
                                        <p class="cube-label">11/12/2015</p>
                                        <p class="cube-label day-label">Monday</p>
                                    </div>
                                    <div class="day-cube">
                                        <p class="cube-label">11/12/2015</p>
                                        <p class="cube-label day-label">Monday</p>
                                    </div>
                                    <div class="day-cube">
                                        <p class="cube-label">11/12/2015</p>
                                        <p class="cube-label day-label">Monday</p>
                                    </div>
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
                                        </div>
                                        <div class="row time-line-container">
                                            <div class="col span-1-of-12 one-hour-distance">
                                                <div class="row one-hour-line">
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute start-time">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col span-1-of-12 one-hour-distance">
                                                <div class="row one-hour-line">
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col span-1-of-12 one-hour-distance">
                                                <div class="row one-hour-line">
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div><div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col span-1-of-12 one-hour-distance">
                                                <div class="row one-hour-line">
                                                    <div class="col span-1-of-6 ten-minute-distance reserved-ten-minute">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance reserved-ten-minute">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance reserved-ten-minute">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance reserved-ten-minute">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance reserved-ten-minute">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance reserved-ten-minute">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col span-1-of-12 one-hour-distance">
                                                <div class="row one-hour-line">
                                                    <div class="col span-1-of-6 ten-minute-distance bought-ten-minute">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance bought-ten-minute">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance bought-ten-minute">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance bought-ten-minute">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance bought-ten-minute">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance bought-ten-minute">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col span-1-of-12 one-hour-distance">
                                                <div class="row one-hour-line">
                                                    <div class="col span-1-of-6 ten-minute-distance reserved-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance reserved-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance reserved-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance reserved-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance reserved-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance reserved-ten-minute">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col span-1-of-12 one-hour-distance">
                                                <div class="row one-hour-line">
                                                    <div class="col span-1-of-6 ten-minute-distance reserved-ten-minute">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance reserved-ten-minute">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance reserved-ten-minute">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance reserved-ten-minute">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance reserved-ten-minute">
                                                        <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance reserved-ten-minute">
                                                       <div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div><div class="popup-time">
                                                            <p>Reserved</p>
                                                            <p>14:00 - 15:00</p>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col span-1-of-12 one-hour-distance">
                                                <div class="row one-hour-line">
                                                    <div class="col span-1-of-6 ten-minute-distance bought-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance bought-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance bought-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance bought-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance bought-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col span-1-of-12 one-hour-distance">
                                                <div class="row one-hour-line">
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col span-1-of-12 one-hour-distance">
                                                <div class="row one-hour-line">
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col span-1-of-12 one-hour-distance">
                                                <div class="row one-hour-line">
                                                    <div class="col span-1-of-6 ten-minute-distance bought-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance bought-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance bought-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance bought-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance bought-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance bought-ten-minute">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col span-1-of-12 one-hour-distance">
                                                <div class="row one-hour-line">
                                                    <div class="col span-1-of-6 ten-minute-distance bought-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance bought-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance bought-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute">
                                                        
                                                    </div>
                                                    <div class="col span-1-of-6 ten-minute-distance free-ten-minute end-time">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row times-line-container">
                                            <div class="row">
                                                <div class="col span-1-of-2">
                                                    <div class="row">
                                                        <div class="col span-1-of-2">
                                                            <input type="text" placeholder="" class="small-iput">
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
                                                            <input type="text" placeholder="" class="small-iput">
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
                                                        <input class="range-slider__range" type="range" value="0" min="0" max="10">
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
                                                    <button class="button" id="reserve">Reserve</button>
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
        
        <script type="text/javascript">
            $(document).ready(function() {
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });
                var homeURL = "{{url('')}}";

                $( ".nav-container" ).fadeOut('slow');
        $( "#overlay" ).fadeIn('slow');
        $('#registration-chooser').fadeIn( 'slow' );
        windowOverlay = document.getElementById('overlay').offsetHeight;
        registrationHeight = document.getElementById('registration-chooser').offsetHeight;
        $('#registration-chooser').css("margin-top", (windowOverlay - registrationHeight)/2 );

        
                $('#fullpage').fullpage({
                    anchors: ['firstPage', 'secondPage', '3rdPage'],
                    scrollBar: true
                });


                $('#createaccount').on('click',function(){
                    var name = $('#username').val();
                    var email = $('#email').val();
                    var phone = $('#phone').val();
                    var pass = $('#password').val();
                    var confirmpass = $('#confirmpass').val();
                    if(name=="" || phone=="" || pass=="" || confirmpass==""){
                        sweetAlert("Oops...", "Please,Fill Out All Fields", "error");
                        
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
                               window.location.href = homeURL;
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



            });



        </script>
        
    </body>
</html>