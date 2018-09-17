"use strict";
	jQuery(document).ready(function ($) {	
		$('.navbar-collapse').find('a[href*=#]:not([href=#])').click(function () {
			if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
				if (target.length) {
					$('html,body').animate({
						scrollTop: (target.offset().top - 40)
					}, 1000);
					if ($('.navbar-toggle').css('display') != 'none') {
						$(this).parents('.container').find(".navbar-toggle").trigger("click");
					}
					return false;
				}
			}
		});
		
	
	jQuery(window).scroll(function () {
        var top = jQuery(document).scrollTop();
        var height = 300;
        //alert(batas);

        if (top > height) {
            jQuery('.navbar-fixed-top').addClass('menu-scroll');
        } else {
            jQuery('.navbar-fixedtop').removeClass('menu-scroll');
        }
    });
	
	// scroll Up

    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.scrollup').fadeIn('slow');
        } else {
            $('.scrollup').fadeOut('slow');
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({scrollTop: 0}, 3000);
        return false;
    });
 
 

	//tab menu
	
	// Portfoliowork init
    jQuery('#portfoliowork').mixItUp({
        selectors: {
            target: '.tile',
            filter: '.filter'
                    //           sort: '.sort-btn'
        },
        animation: {
            animateResizeContainer: false,
            effects: 'fade scale'
        }

    });

   });
 