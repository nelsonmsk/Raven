/* ----------------------------- 
Pre Loader
----------------------------- */
$(window).load(function() {
	'use strict';
	$('.loading-icon').delay(500).fadeOut();
	$('#preloader').delay(800).fadeOut('slow');
});


/*============================================== /*
		Navigation Bar
/*============================================== */

/* Change navbar class on scroll */

$(".wrapper").waypoint(function() {
    $(".navbar").toggleClass("js-navbar-top");
    $(".navbar.navbar-expand-lg").toggleClass("navbar-transparent navbar-bg");
    return false;
}, { offset: "-20px" });



/* ----------------------------- 
Scroll into viewPort Animation
----------------------------- */
$(document).ready(function() {	
	'use strict';
	$('.animated').appear(function() {
		var element = $(this),
			animation = element.data('animation'),
			animationDelay = element.data('animation-delay');
			if ( animationDelay ) {

				setTimeout(function(){
					element.addClass( animation + " visible");
				}, animationDelay);

			} else {
				element.addClass( animation + " visible");
			}
	});
});
/*==============================================/*
    Sliders
/*============================================== */
$(document).ready(function() {
	'use strict';
	
	let heroContainer = $('.hero-slider');
	let testimonialsContainer = $('.testimonials-slider');	
	
	const heroSlider = new Swiper('.hero-slider', {
		speed: 600,
		loop: true,
		autoplay: {
		  delay: 5000,
		  disableOnInteraction: false
		},
		slidesPerView: '1',
		pagination: {
		  el: '.swiper-pagination',
		  type: 'bullets',
		  clickable: true
		},
		breakpoints: {
		  320: {
			slidesPerView: 1,
			spaceBetween: 2
		  },
		  768: {
			slidesPerView: 1,
			spaceBetween: 2
		  },
		  1200: {
			slidesPerView: 1,
			spaceBetween: 2
		  }
		}
	  });	

     const testimonialsSlider = new Swiper('.testimonials-slider', {
		speed: 600,
		loop: true,
		autoplay: {
		  delay: 5000,
		  disableOnInteraction: false
		},
		slidesPerView: 'auto',
		pagination: {
		  el: '.swiper-pagination',
		  type: 'bullets',
		  clickable: true
		},
		breakpoints: {
		  320: {
			slidesPerView: 1,
			spaceBetween: 20
		  },
		  768: {
			slidesPerView: 2,
			spaceBetween: 20
		  },
		  1200: {
			slidesPerView: 3,
			spaceBetween: 20
		  }
		}
	  });

	   const specialsdetailsSlider = new Swiper('.specials-details-slider', {
		speed: 600,
		loop: true,
		autoplay: {
		  delay: 5000,
		  disableOnInteraction: false
		},
		pagination: {
		  el: '.swiper-pagination',
		  type: 'bullets',
		  clickable: true
		},
	  });		
});
/*==============================================/*
    Specials & Gallery isotope and filter
/*============================================== */ 

	/**
	* Easy selector helper function
	*/	
	const select = (el, all = false) => {
		el = el.trim()
		if (all) {
		  return [...document.querySelectorAll(el)]
		} else {
		  return document.querySelector(el)
		}
	}	
	/**
	* Easy event listener function
	*/
	const on = (type, el, listener, all = false) => {
		if (all) {
		  select(el, all).forEach(e => e.addEventListener(type, listener))
		} else {
		  select(el, all).addEventListener(type, listener)
		}
	}    
  
	let specialsContainer = select('.specials-container');
	let galleryContainer = select('.gallery-container');
	
	if (specialsContainer) {
		  let specialsIsotope = new Isotope(specialsContainer, {
			itemSelector: '.specials-item',
			layoutMode: 'fitRows'
		  });

		  let specialsFilters = select('.button-group .button', true);

		  on('click', '.button-group .button', function(e) {
			e.preventDefault();
			specialsFilters.forEach(function(el) {
			  el.classList.remove('is-checked');
			});
			this.classList.add('is-checked');

			specialsIsotope.arrange({
			  filter: this.getAttribute('data-filter')
			});
		  }, true);
	  
	} else {
		
		  let galleryIsotope = new Isotope(galleryContainer, {
			itemSelector: '.gallery-item',
			layoutMode: 'fitRows'
		  });

		  let galleryFilters = select('.button-group .button', true);

		  on('click', '.button-group .button', function(e) {
			e.preventDefault();
			galleryFilters.forEach(function(el) {
			  el.classList.remove('is-checked');
			});
			this.classList.add('is-checked');

			galleryIsotope.arrange({
			  filter: this.getAttribute('data-filter')
			});
		  }, true);		
		
	}
 			

/* ==============================================
        Owl Carousel
=============================================== */

		 $("#carousel-our-gallery").owlCarousel({
		stopOnHover: true,
        navigation: false,
		pagination:false,
        paginationSpeed: 1000,
        goToFirstSpeed: 3500,
		slideSpeed : 800,
        autoPlay: 3000,
        items : 4,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,3],
		itemsTablet :	[768,2],
		itemsMobile :	[479,1],

    });	
			
				
				
/* ----------------------------- 
MailCimp Plugin Script 
----------------------------- */
$(document).ready(function() {
	'use strict';
	$('#subscription-form').ajaxChimp({
		callback: mailchimpCallback,
		url: 'YOUR_URL' /* Replace it with your custom URL inside '' */
	});
	
	function mailchimpCallback(resp) {
		 if(resp.result === 'success') {
			$('.subscription-success')
				.html(resp.msg)
				.delay(500)
				.fadeIn(1000);

			$('.subscription-success').fadeOut(8000);
			
		} else if(resp.result === 'error') {
			$('.subscription-failed')
				.html(resp.msg)
				.delay(500)
				.fadeIn(1000);
				
			$('.subscription-failed').fadeOut(5000);
		}
		$('#subscription-form .input-email').val('');
	};
});

/* ---------------------------------------------- /*
 * Scroll top
/* ---------------------------------------------- */

	$(window).scroll(function() {
		if ($(this).scrollTop() > 300) {
			$('.scroll-up').addClass('scroll-top-show');
		} else {
			$('.scroll-up').removeClass('scroll-top-show');
		}
	});

	$('a[href="#totop"]').on('click', function() {
		$('html, body').animate({ scrollTop: 0 }, 'slow');
		return false;
	});		
			
/* ---------------------------------------------- /*
 * Off-canvas-sidebar toogle bar
/* ---------------------------------------------- */
var mobile_menu_visible = 0,
  mobile_menu_initialized = false,
  toggle_initialized = false,
  bootstrap_nav_initialized = false
  
 $(document).on('click', '.navbar-toggler', function() {
  $toggle = $(this);

  if (mobile_menu_visible == 1) {
    $('html').removeClass('nav-open');

    $('.close-layer').remove();
    setTimeout(function() {
      $toggle.removeClass('toggled');
    }, 400);

    mobile_menu_visible = 0;
  } else {
    setTimeout(function() {
      $toggle.addClass('toggled');
    }, 430);

    var $layer = $('<div class="close-layer"></div>');

    if (($('body').hasClass('off-canvas-sidebar'))) {
      $layer.appendTo(".wrapper-full-page");
    }

    setTimeout(function() {
      $layer.addClass('visible');
    }, 100);

    $layer.click(function() {
      $('html').removeClass('nav-open');
      mobile_menu_visible = 0;

      $layer.removeClass('visible');

      setTimeout(function() {
        $layer.remove();
        $toggle.removeClass('toggled');

      }, 400);
    });

    $('html').addClass('nav-open');
    mobile_menu_visible = 1;

  }

});
