(function ($) {
	"use strict";

	/*=========================
	PRELOADER JS
	===========================*/
	$(window).on('load', function (event) {
		$('.preloader').delay(500).fadeOut(500);
	});


	/*=========================
	product-slider
	===========================*/
	$('.product-slider').slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		dots: false,
		arrows: true,
		rtl:true,
		prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-angle-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fas fa-angle-right"></i></button>',

		responsive: [{
				breakpoint: 1200,
				settings: {
					slidesToShow: 5,
				}
			},
			{
				breakpoint: 991,
				settings: {
					slidesToShow: 4,
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 3,
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 2,
				}
			}
		]
	});

 // sidebar menu
    // if has child
    const listItem = document.querySelectorAll(".sidebar-menu ul li");
    listItem.forEach((item) => {
        if (item.contains(item.querySelector("ul"))) {
            item.classList.add("has-child");
            item.querySelector("a").addEventListener("click", (e) => {
                e.preventDefault();
            });
        }
    });
    // sidebar menu clicking event
    const sidebarMenuLink = document.querySelectorAll(
        ".sidebar-menu ul li.has-child"
    );
    const resBar = document.querySelectorAll(
        ".humberger-bar, .sidebar-slide-overlay"
    );
    const resBarLink = document.querySelectorAll(
        ".sidebar-menu ul li:not(.has-child)"
    );

    sidebarMenuLink.forEach((link) => {
        link.addEventListener("click", () => {
            let submenu = document.querySelector(".submenu");
            link.classList.toggle("active");
            submenu.classList.toggle("active");
            if (submenu.style.maxHeight) {
                submenu.style.maxHeight = null;
            } else {
                submenu.style.maxHeight = submenu.scrollHeight + 10 + "px";
            }
        });
    });
    resBar.forEach((btn) => {
        btn.addEventListener("click", () => {
            sidebarMenuAction();
        });
    });
    resBarLink.forEach((link) => {
        link.addEventListener("click", () => {
            sidebarMenuAction();
        });
    });
    function sidebarMenuAction() {
        for (let i = 0; i < resBar.length; i++) {
            resBar[i].classList.toggle("active");
        }
        document.querySelector(".sidebar-slide").classList.toggle("active");
    }


	// sticky
	var wind = $(window);
	var sticky = $('.header-area');
	var holder = $('.header-holder');
	wind.on('resize', function () {
		holder.css('height', sticky.outerHeight())
	});
	wind.on('load', function () {
		holder.css('height', sticky.outerHeight())
	});
	wind.on('scroll', function () {
		var scroll = wind.scrollTop();
		if (scroll < 200) {
			sticky.removeClass('sticky');
		} else {
			sticky.addClass('sticky');
		}
	});

	

	/*=========================
	SCROLL-UP JS
	===========================*/
	$.scrollUp({
		scrollName: 'scrollUp', // Element ID
		topDistance: '300', // Distance from top before showing element (px)
		topSpeed: 300, // Speed back to top (ms)
		animation: 'fade', // Fade, slide, none
		animationInSpeed: 200, // Animation in speed (ms)
		animationOutSpeed: 200, // Animation out speed (ms)
		scrollText: '<i class="fas fa-arrow-up"></i>', // Text for element
		activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	});

	// skrollr activation
	var s = skrollr.init({
		forceHeight: false,
		smoothScrollingDuration: 500,
	});
	if (s.isMobile()) {
			s.destroy();
	}

		
	// One Page Nav
	var top_offset = $('.header-area').height();
	$('.mainmenu ul, .sidebar-menu ul').onePageNav({
		scrollOffset: top_offset,
	});

	$(function () {
		$('[data-toggle="tooltip"]').tooltip({
			animated: 'fade',
			html: true
		})
	})
})(jQuery);