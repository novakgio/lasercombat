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
        
        
        $('.js-header-1').delay(100).fadeIn('slow'); 
        $('.js-header-2').delay(900).fadeIn('slow'); 
        $('.js-header-3').delay(1700).fadeIn('slow');
        $('.first-wave').delay(4000).fadeOut('slow');
        
         setTimeout(function(){
             $('.js-header-4').fadeIn('slow');
         },4800);
        
        setTimeout(function(){
             $('.js-header-5').slideToggle('slow');
         },5600);
        
        setTimeout(function(){
             $('.js-header-6').slideDown('slow');
         },6400);
        
        
    },1000);
    
    
    
    
    
    
    
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
    var profileHeight;
    
    $( "#contact-drop-line" ).click(function() {
        $( ".nav-container" ).fadeOut('slow');
        $( "#overlay" ).fadeIn('slow');
        $('#textus').fadeIn( 'slow' );
        $('#close-textus').css('display', 'none');
        windowOverlay = document.getElementById('overlay').offsetHeight;
        textusHeight = document.getElementById('textus').offsetHeight;
        $('#textus').css("margin-top", (windowOverlay - textusHeight)/2 );
    });
    
    $( "#prfile" ).click(function() {
        $( ".nav-container" ).fadeOut('slow');
        $( "#section1" ).fadeOut('slow');
        $( "#section2" ).fadeOut('slow');
        $( "#section3" ).fadeOut('slow');
        $( "#header-info" ).css('visibility', 'hidden');
        $( "#overlay" ).fadeIn('slow');
        $('#profile-popup').fadeIn( 'slow' );
        windowOverlay = document.getElementById('overlay').offsetHeight;
        profileHeight = document.getElementById('profile-popup').offsetHeight;
        $('#profile-popup').css("margin-top", (windowOverlay - profileHeight)/2 );
    });
    
    // $( "#my-tikcet" ).click(function() {
    //     $('#profile-popup').fadeOut( 'slow' );
    //     $('#user-ticket').fadeIn( 'slow' );
    //     windowOverlay = document.getElementById('overlay').offsetHeight;
    //     ticketHeight = document.getElementById('user-ticket').offsetHeight;
    //     $('#user-ticket').css("margin-top", (windowOverlay - ticketHeight)/2 );
    // });
    
    $( "#close-ticket" ).click(function() {
        $('#user-ticket').fadeOut( 'slow' );
        $('#profile-popup').fadeIn( 'slow' );
    });
    
    $( "#my-textus" ).click(function() {
        $('#profile-popup').css("display", "none");
        $('#textus').fadeIn( 'slow' );
        windowOverlay = document.getElementById('overlay').offsetHeight;
        textusHeight = document.getElementById('textus').offsetHeight;
        $('#textus').css("margin-top", (windowOverlay - textusHeight)/2 );
    });
    
    $( "#close-textus" ).click(function() {
        $('#textus').css("display", "none");
        $('#profile-popup').fadeIn( 'slow' );
    });
    
    
    // $( "#reserve" ).click(function() {
    //     $( ".nav-container" ).fadeOut('slow');
    //     $( "#overlay" ).fadeIn('slow');
    //     $('#reservepopup').fadeIn( 'slow' );
    //     windowOverlay = document.getElementById('overlay').offsetHeight;
    //     registrationHeight = document.getElementById('reservepopup').offsetHeight;
    //     $('#reservepopup').css("margin-top", (windowOverlay - registrationHeight)/2 );
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
        $( "#overlay" ).fadeOut('slow');
        $( "#registration-chooser" ).fadeOut('slow');
        $( "#login-form" ).fadeOut('slow');
        $( "#create-account-form" ).fadeOut('slow');
        
        $( "#profile-popup" ).fadeOut('slow');
        $( "#section1" ).fadeIn();
        $( "#section2" ).fadeIn();
        $( "#section3" ).fadeIn();
        $('#user-ticket').fadeOut( 'slow' );
        $('#textus').css("display", "none");
        
        $('#reservepopup').fadeOut( 'slow' );
        
        $( ".nav-container" ).fadeIn('slow');
        $('#close-textus').css('display', 'block');

        $( "#header-info" ).css('visibility', 'visible');
    })
    
    $( "#my-contact" ).click(function() {
        $( "#overlay" ).fadeOut('slow');
        $( "#registration-chooser" ).fadeOut('slow');
        $( "#login-form" ).fadeOut('slow');
        $( "#create-account-form" ).fadeOut('slow');
        
        $( "#profile-popup" ).fadeOut('slow');
        $( "#section1" ).fadeIn();
        $( "#section2" ).fadeIn();
        $( "#section3" ).fadeIn();
        $('#user-ticket').fadeOut( 'slow' );
        $('#textus').css("display", "none");
        
        $( ".nav-container" ).fadeIn('slow');
        
        $.fn.fullpage.moveTo(4, 0);
    })
    
});




$(document).ready(function() {
    
    if (window.screen.width < 1025) {
        $.fn.fullpage.destroy();
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
        //particles
        $( ".partickles-mine" ).css( "display", "none" );
        //gallery
        $( ".responsive-1-4-col" ).css( "width", "49%" );
        $( ".responsive-1-4-col" ).css( "margin", "0.5%" );
        $( ".responsive-1-4-col" ).css( "padding", "7px 0" );
        $( "#first-gallery" ).removeClass( "gallery-cube" );
        $( "#first-gallery" ).addClass( "big-gallery-cube" );
        $( "#fourth-gallery" ).removeClass( "gallery-cube" );
        $( "#fourth-gallery" ).addClass( "big-gallery-cube" );
        //contact
        $( ".responsive-1-2-col" ).css( "width", "99%" );
        $( ".responsive-1-2-col" ).css( "margin", "0.5%" );
        $( ".responsive-1-2-col" ).css( "padding", "7px 0" );
        $( ".responsive-1-2-col" ).css( "padding-bottom", "5%" );
        //profile
        $( ".responsive-1-3-col" ).css( "width", "99%" );
        $( ".responsive-1-3-col" ).css( "margin", "0.5%" );
        $( ".font-18" ).css( "font-size", "18px" );
        $( ".font-15" ).css( "font-size", "15px" );
        $( ".font-13" ).css( "font-size", "13px" );
        $( ".font-10" ).css( "font-size", "10px" );

        //header
        $( ".header-info-container" ).css( "margin-top", "0%" );
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













