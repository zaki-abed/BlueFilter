(function($) {
	"use strict";

    // Script for OffCanvas Menu Activation
    $('.bar, .overlay').on('click', function() {
        $('.menu_area, .overlay').toggleClass('active');
	})

    $('.counter').counterUp({
        delay: 10,
        time: 1000
	});

})(jQuery);

$('#owl-carousel1').owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    dots: false,
    autoplay:true,
    autoplayHoverPause:true,
    autoplayTimeout:2000,
    rtl: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 3
        }
    }
});
$('#owl-carousel2').owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    dots: false,
    autoplay:true,
    autoplayHoverPause:true,
    autoplayTimeout:2000,
    rtl: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 3
        }
    }
});
