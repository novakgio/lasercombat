/*------Loader--------*/
var window = document.getElementById('loader-page').offsetHeight;
var loaderContainer  = document.getElementById('loader-box').offsetHeight;
$('#loader-box').css("margin-top", (window - loaderContainer)/2 );

$(window).on('load', function() {
    var window = document.getElementById('loader-page').offsetHeight;
    var loaderContainer  = document.getElementById('loader-box').offsetHeight;
    $('#loader-box').css("margin-top", (window - loaderContainer)/2 );
    setTimeout(function(){
        $('#loading').delay(0).fadeOut('slow'); 
        $('#after-loading').css({'visibility':'visible'});
    },0);
    
    
     /* Navigation scroll */
    $(function() {
      $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
    });
    
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
    
    // $( "#reserve" ).click(function() {
    //     $( ".nav-container" ).fadeOut('slow');
    //     $( "#overlay" ).fadeIn('slow');
    //     $('#registration-chooser').fadeIn( 'slow' );
    //     windowOverlay = document.getElementById('overlay').offsetHeight;
    //     registrationHeight = document.getElementById('registration-chooser').offsetHeight;
    //     $('#registration-chooser').css("margin-top", (windowOverlay - registrationHeight)/2 );
    // });
    
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




$(document).ready(function() {
    
    if (window.screen.width < 420) {
      console.log(window.screen.width);
      $.fn.fullpage.destroy();
      $('.count-particles').css("display", "none" );
      $('.particles-myjs').css("display", "none" );
        
            $('.main-nav').css("display", "none" );
            $('.mobile-nav-icon').css("display", "block" );
            $('.main-nav').css("float", "left" );
            $('.main-nav').css("margin-top", "30px" );
            $('.main-nav').css("margin-left", "10%" );
            $('.main-nav li').css("display", "block" );
            $('.main-nav li a:link').css("display", "block" );
            $('.main-nav li a:link').css("padding", "10px 0" );
            $('.main-nav li a:visited').css("display", "block" );
            $('.main-nav li a:visited').css("padding", "10px 0" );
            $('.sticky .main-nav').css("margin-top", "10px" );
            $('.sticky .main-nav li a:link').css("padding", "10px 0" );
            $('.sticky .main-nav li a:visited').css("padding", "10px 0" );
            $('.sticky .mobile-nav-icon').css("margin-top", "15px" );
            $('.sticky .mobile-nav-icon i').css("color", "white" );
        
        
      $( "#section1" ).addClass( "fp-auto-height" );
      $( "#section2" ).addClass( "fp-auto-height" );
      $( "#section3" ).addClass( "fp-auto-height" );
      $( ".intro" ).addClass( "extended-intro" );
      $( "#section3 .intro" ).addClass( "extended-intro-second" );
    }
    
    /* Mobile navigation */
    $('.js--nav-icon').click(function() {
        var nav = $('.js--main-nav');
        var icon = $('.js--nav-icon i');
        
        nav.slideToggle(200);
        
        if (icon.hasClass('ion-navicon-round')) {
            icon.addClass('ion-close-round');
            icon.removeClass('ion-navicon-round');
        } else {
            icon.addClass('ion-navicon-round');
            icon.removeClass('ion-close-round');
        }        
    });
    
});












