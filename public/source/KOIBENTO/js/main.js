"use strict";
   
	jQuery(document).ready(function ($) {	

      
        $(window).load(function() {
            $('.preloader').fadeOut();
            
        });



		$('.navbar-collapse').find('a[href*=#]:not([href=#])').click(function () {
			if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
				if (target.length) {
					$('html,body').animate({
						scrollTop: (target.offset().top - 40)
					}, 1000);
					if ($('.headder').css('display') != 'none') {
						$(this).parents('.container').find(".headder").trigger("click");
					}
					return false;
				}
			}
		});
		
	
	jQuery(window).scroll(function () {
        var top = jQuery(document).scrollTop();
        var height = 100;
        //alert(batas);

        if (top > height) {
            jQuery('.main_header').addClass('menu-scroll');
            jQuery('.main_header').removeClass('headder');
           
            if(flag){
                jQuery(".list-item li a").hover(function(){
                       $(this).css("color", "black");
                      
                       }, function(){
                       $(this).css("color", "white");
                     
                });
                jQuery('.logon_fish').attr("src","http://localhost/web_developer/learn_laravel/koibento/public/source/KOIBENTO/images/logo1.png");
            }
          

        } else {
            jQuery('.main_header').removeClass('menu-scroll');
            jQuery('.main_header').addClass('headder');
            if(flag){
                jQuery(".list-item li a").hover(function(){
                       $(this).css("color", "#f33");
                      
                       }, function(){
                       $(this).css("color", "white");
                     
                });
                jQuery('.logon_fish').attr("src","http://localhost/web_developer/learn_laravel/koibento/public/source/KOIBENTO/images/logo.png");
            }
            
        }
    });
	
	// scroll Up

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn('slow');
        } else {
            $('.scrollup').fadeOut('slow');
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({scrollTop: 0}, 1000);
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

        // execute payment 
        $("#payment_method_bacs").click(function(){
               

            $(".bacs").css('display','block');
            $(".cheque").css('display','none');     

        });

        $("#payment_method_cheque").click(function(){
          

            $(".bacs").css('display','none');
            $(".cheque").css('display','block');
        });

        var count = 1;

        // add 1 product to cart
        $(".add_product").click(function(){
            
            count++;
          
            $(".add_more_product").val(count);

        });

        // delete 1 product to cart
        $(".sub_product").click(function(){

            if(count>1){
                count--;
                
                $(".add_more_product").val(count);

            }
           

        });
        

   });
 