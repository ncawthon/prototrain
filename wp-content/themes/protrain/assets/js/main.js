jQuery(document).ready(function($) {

  //initialize foundation
  $(document).foundation();


  //initialize google fonts
  WebFontConfig = {
    google: { families: [ 'Open+Sans:400,800:latin', 'Ubuntu::latin', 'Pacifico::latin' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();

  function setHeight() {
    windowHeight = $(window).innerHeight();
    $('.banner-home__warp > .row').css('min-height', windowHeight);
  };
  setHeight();

  $(window).resize(function() {
    setHeight();
  });


  //sticky navigation
  $( window ).scroll(function()  {
    if($(window).scrollTop()  > 240){
      $('#header').addClass("dark");
    }else if($(window).scrollTop()  < $(window).height()){
      $('#header').removeClass('dark');
    }
  });
  $( window ).scroll(function()  {
    if($(window).scrollTop()  > 240){
      $('#header-inside').addClass("dark");
    }else if($(window).scrollTop()  < $(window).height()){
      $('#header-inside').removeClass('dark');
    }
  });

  $('.post-holder').matchHeight();
  $('.equalheight').matchHeight();
  $('.services-home_list h3').matchHeight();
  $('.portfolio-case').matchHeight();

  new WOW().init();

  //masonry for projects on homepage
  $('.grid').masonry({
    itemSelector: '.portfolio-home',
    // columnWidth: 200
  });

  //overlay
  (function() {
    var triggerBttn = document.getElementById( 'trigger-overlay' ),
    overlay = document.querySelector( 'div.overlay' ),
    closeBttn = overlay.querySelector( 'button.overlay-close' );
    transEndEventNames = {
      'WebkitTransition': 'webkitTransitionEnd',
      'MozTransition': 'transitionend',
      'OTransition': 'oTransitionEnd',
      'msTransition': 'MSTransitionEnd',
      'transition': 'transitionend'
    },
    transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
    support = { transitions : Modernizr.csstransitions };

    function toggleOverlay() {
      if( classie.has( overlay, 'open' ) ) {
        classie.remove( overlay, 'open' );
        classie.add( overlay, 'close' );
        var onEndTransitionFn = function( ev ) {
          if( support.transitions ) {
            if( ev.propertyName !== 'visibility' ) return;
            this.removeEventListener( transEndEventName, onEndTransitionFn );
          }
          classie.remove( overlay, 'close' );
        };
        if( support.transitions ) {
          overlay.addEventListener( transEndEventName, onEndTransitionFn );
        }
        else {
          onEndTransitionFn();
        }
      }
      else if( !classie.has( overlay, 'close' ) ) {
        classie.add( overlay, 'open' );
      }
    }

    triggerBttn.addEventListener( 'click', toggleOverlay );
    closeBttn.addEventListener( 'click', toggleOverlay );
  })();



  //click button to show contact form
  $('.alternate.green').hide();
  $( "#click-btn" ).click(function() {
    $( ".alternate.green" ).slideToggle("400",function() {
    // Animation complete.
  });
  });
});