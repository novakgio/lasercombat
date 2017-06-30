<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Laser Combat</title>
        <meta name="description" content="Laser Combat">
        <meta name="author" content="Laser Combat">
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
        
        <div class="loading" id="loading">
            <div class="loading-container" id="loader-page">
                <div class="loader" id="loader-box">
                    <div class="background-loader"></div>
                    <div class="background-loader-second"></div>
                    <div class="background-loader-third"></div>
                    <div class="background-loader-fourth"></div>
                    <div class="background-loader-fifth"></div>
                     <img src="{{asset('public/img/logo.png')}}" class="load-image">
                </div>
            </div>
        </div>
        <div class="after-loading" id="after-loading">
            
            <div id="overlay" class="visable-mine">
                <div class="middle-alligned-container" id="middle-cont">
                    <h3 class="success">{{$error}}</h3>
                    <h3 class="success">თქვენი უნიკალური კოდია {{$key}}</h3>
                    <div class="row centered">
                        <a href="index.html"><span class="h3-link">დაბრუნდით მთავარ გვერდზე</span></a>
                    </div>
                </div>
            </div>
            
            
            <div id="fullpage">
                <div class="section " id="section0">
                    <!-- particles.js container -->
                    <div id="particles-js" class="partickles-mine"></div>
                    <div class="intro">
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.jssurls')
    </body>
</html>