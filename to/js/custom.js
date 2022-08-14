(function ($) {

  "use strict";

    // PRE LOADER
    $(window).load(function(){
      $('.preloader').fadeOut(1000); // set duration in brackets    
    });


    // MENU
    $('.menu-burger').on('click', function() {
      $('.menu-bg, .menu-items, .menu-burger').toggleClass('fs');
      $('.menu-burger').text() == "☰" ? $('.menu-burger').text('✕') : $('.menu-burger').text('☰');
    });


    // ABOUT SLIDER
    
    
    $('body').vegas({
         overlay: 'overlays/09.png',
        slides: [
            { src: '../images/tloslide.jpg' },
            { src: '../images/tloslide2.jpg' },
            { src: '../images/tloslide3.jpg' }
        ],
        timer: false,
       
        transition: ['blur','flash','burn']
    });
    
    
})(jQuery);
