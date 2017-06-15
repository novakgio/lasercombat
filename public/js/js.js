/*------Loader--------*/
var window = document.getElementById('loader-page').offsetHeight;
var loaderContainer  = document.getElementById('loader-box').offsetHeight;
$('#loader-box').css("margin-top", (window - loaderContainer)/2 );

$(window).on('load', function() {
    var window = document.getElementById('loader-page').offsetHeight;
    var loaderContainer  = document.getElementById('loader-box').offsetHeight;
    $('#loader-box').css("margin-top", (window - loaderContainer)/2 );
    setTimeout(function(){
        $('#loading').delay(3000).fadeOut('slow'); 
        $('#after-loading').css({'visibility':'visible'});
    },0);
});

$(document).ready(function(){ 
    var window = document.getElementById('loader-page').offsetHeight;
    var loaderContainer  = document.getElementById('loader-box').offsetHeight;
    $('#loader-box').css("margin-top", (window - loaderContainer)/2 );
});




$(document).ready(function() {
  var rangeSlider = function(){
  var slider = $('.range-slider'),
      range = $('.range-slider__range'),
      value = $('.range-slider__value');
    
  slider.each(function(){

    value.each(function(){
      var value = $(this).prev().attr('value');
      $(this).html(value);
    });

    range.on('input', function(){
      $('.range-slider__value').html(this.value);
    });
  });
};

rangeSlider();
});


$(document).ready(function(){
    
    var windowOverlay;
    var registrationHeight;
    var loginFormHeight;
    var createAccountHeight;
    
    
    
    $( "#sign-up" ).click(function() {
        $( ".nav-container" ).fadeOut('slow');
        $( "#overlay" ).fadeIn('slow');
        $('#registration-chooser').fadeIn( 'slow' );
        windowOverlay = document.getElementById('overlay').offsetHeight;
        registrationHeight = document.getElementById('registration-chooser').offsetHeight;
        $('#registration-chooser').css("margin-top", (windowOverlay - registrationHeight)/2 );
    });
    
    $( "#login-with-account" ).click(function() {
        $('#registration-chooser').css( 'display', 'none' );
        $('#login-form').fadeIn( 'slow' );
        windowOverlay = document.getElementById('overlay').offsetHeight;
        loginFormHeight = document.getElementById('login-form').offsetHeight;
        $('#login-form').css("margin-top", (windowOverlay - loginFormHeight)/2 );
    });
    
    $( "#create-account" ).click(function() {
        $('#login-form').css( 'display', 'none' );
        $('#create-account-form').fadeIn( 'slow' );
        windowOverlay = document.getElementById('overlay').offsetHeight;
        createAccountHeight = document.getElementById('create-account-form').offsetHeight;
        $('#create-account-form').css("margin-top", (windowOverlay - createAccountHeight)/2 );
    });
    
    $( ".close-icon" ).click(function() {
        console.log("bla");
        $( "#overlay" ).fadeOut('slow');
        $( "#registration-chooser" ).fadeOut('slow');
        $( "#login-form" ).fadeOut('slow');
        $( "#create-account-form" ).fadeOut('slow');
        $( ".nav-container" ).fadeIn('slow');
    })
    
});





















