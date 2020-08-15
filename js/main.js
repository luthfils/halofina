jQuery(function($) {'use strict';

  // Collapse Navbar
  var navbarCollapse = function() {
    if ($("#mainNav").offset().top > 100) {
      $("#mainNav").addClass("navbar-shrink");
    } else {
      $("#mainNav").removeClass("navbar-shrink");
    }
  };

  // Collapse now if page is not at top
  navbarCollapse();
  // Collapse the navbar when page is scrolled
  $(window).scroll(navbarCollapse);


// Blog slider
$('#lifeplan-feature-slider').owlCarousel({
	navigation: true, // Show next and prev buttons
	slideSpeed: 800,
	paginationSpeed: 400,
	autoPlay: true,
	navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
	pagination : false,
	items : 2,
	itemsCustom : false,
	itemsDesktop : [1199,2],
	itemsDesktopSmall : [980,2],
	itemsTablet: [768,1],
	itemsTabletSmall: false,
	itemsMobile : [767,1],
});

//Testimonial Slider
$(document).ready(function(){
	/*=== Testimonial ====*/
    $('#testimonial-slider').owlCarousel({
    navigation: false, // Show next and prev buttons
    slideSpeed: 800,
    paginationSpeed: 400,
    pagination : true, 
    autoPlay: true,
    items : 2,
        itemsCustom : false,
        itemsDesktop : [1199,2],
        itemsDesktopSmall : [980,1],
        itemsTablet: [768,1],
        itemsTabletSmall: false,
        itemsMobile : [479,1],
    });
});

//Article Slider
$(document).ready(function(){
	/*=== Article ====*/
    $('#article-slider').owlCarousel({
    navigation: true, // Show next and prev buttons
    slideSpeed: 800,
    paginationSpeed: 400,
    autoPlay: true,
    navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    pagination : false,
    items : 2,
        itemsCustom : false,
        itemsDesktop : [1199,1],
        itemsDesktopSmall : [980,1],
        itemsTablet: [768,1],
        itemsTabletSmall: false,
        itemsMobile : [479,1],
    });

});

//investation-product-slider
$(document).ready(function(){
	/*=== investation-product-slider ====*/
    $('#investation-product-slider').owlCarousel({
    navigation: false, // Show next and prev buttons
    slideSpeed: 800,
    paginationSpeed: 400,
	  pagination : true,
    autoPlay: true,
    items : 5,
        itemsCustom : false,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [980,3],
        itemsTablet: [768,2],
        itemsTabletSmall: false,
        itemsMobile : [479,1],
    });

});

//media-partner-slider
$(document).ready(function(){
	/*=== media-partner-slider ====*/
    $('#media-partner-slider').owlCarousel({
    navigation: true, // Show next and prev buttons
    slideSpeed: 800,
    paginationSpeed: 400,
	  pagination : false,
    autoPlay: true,
    navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    items : 5,
        itemsCustom : false,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [980,3],
        itemsTablet: [768,2],
        itemsTabletSmall: false,
        itemsMobile : [479,1],
    });

});


	//Initiat WOW JS
	new WOW().init();

  // Mixpanel track landing page loaded
  $(document).ready(function() {
    mixpanel.track("landing page loaded");
  })

  // Mixpanel track button playstore
  $('#button-playstore').click(function(){
    mixpanel.track("Playstore Button Clicked");
  })

  // Mixpanel track button ios
  $('#button-ios').click(function(){
    mixpanel.track("Appstore Button Clicked");
  })

  // Mixpanel track logo header
  $('#logo-header').click(function(){
    mixpanel.track("Logo Header Clicked");
  })

  // Mixpanel track Feature Rencanakan Seen
  $('#feature-rencanakan').click(function(){
    mixpanel.track("Feature Rencanakan Seen");
  })

  // Mixpanel track Feature Dapatkan Rekomendasi Seen
  $('#feature-dapatkan-rekomendasi').click(function(){
    mixpanel.track("Feature Dapatkan Rekomendasi Seen");
  })

  // Mixpanel track Feature Pantau Investasi Seen
  $('#feature-pantau-investasi').click(function(){
    mixpanel.track("Feature Pantau Investasi Seen");
  })

  // Mixpanel track Feature Raih Impian Seen
  $('#feature-raih-impian').click(function(){
    mixpanel.track("Feature Raih Impian Seen");
  })

  // Mixpanel track Middle Appstore Clicked
  $('.middle-appstore-button').click(function(){
    mixpanel.track("Middle Appstore Clicked");
  })

  // Mixpanel track Middle Playstore Clicked
  $('.middle-playstore-button').click(function(){
    mixpanel.track("Middle Playstore Clicked");
  })

  // Mixpanel track Calculator Download Clicked
  $('#button-rekomendasi').click(function(){
    mixpanel.track("Calculator Download Clicked");
  })

  // Mixpanel track FAQ 1
  $('#faq-1').click(function(){
    mixpanel.track("FAQ 1");
  })

  // Mixpanel track FAQ 2
  $('#faq-2').click(function(){
    mixpanel.track("FAQ 2");
  })

  // Mixpanel track FAQ 3
  $('#faq-3').click(function(){
    mixpanel.track("FAQ 3");
  })

  // Mixpanel track FAQ 4
  $('#faq-4').click(function(){
    mixpanel.track("FAQ 4");
  })

  // Mixpanel track FAQ 5
  $('#faq-5').click(function(){
    mixpanel.track("FAQ 5");
  })

  // Mixpanel track Media Coverage Bisnis
  $('#bisnis').click(function(){
    mixpanel.track("Media Coverage Bisnis Selected ");
  })

  // Mixpanel track Media Coverage dailysocial
  $('#dailysocial').click(function(){
    mixpanel.track("Media Coverage Dailysocial Selected ");
  })

  // Mixpanel track Media Coverage duniafintech
  $('#duniafintech').click(function(){
    mixpanel.track("Media Coverage Duniafintech Selected ");
  })

  // Mixpanel track Media Coverage indonesiatatler
  $('#indonesiatatler').click(function(){
    mixpanel.track("Media Coverage Indonesiatatler Selected ");
  })

  // Mixpanel track Media Coverage infobanknews
  $('#infobanknews').click(function(){
    mixpanel.track("Media Coverage Infobanknews Selected ");
  })

  // Mixpanel track Media Coverage jakartakita
  $('#jakartakita').click(function(){
    mixpanel.track("Media Coverage Jakartakita Selected ");
  })

  // Mixpanel track Media Coverage BeritaSatu
  $('#beritaSatu').click(function(){
    mixpanel.track("Media Coverage BeritaSatu Selected ");
  })

  // Mixpanel track Media Coverage wartaekonomi
  $('#wartaekonomi').click(function(){
    mixpanel.track("Media Coverage Wartaekonomi Selected ");
  })

  // Mixpanel track Media Coverage kompas
  $('#kompas').click(function(){
    mixpanel.track("Media Coverage Kompas Selected ");
  })

  // Mixpanel track Media Coverage kontan
  $('#kontan').click(function(){
    mixpanel.track("Media Coverage Kontan Selected ");
  })

  // Mixpanel track Media Coverage investing
  $('#investing').click(function(){
    mixpanel.track("Media Coverage Investing Selected ");
  })

  // Mixpanel track Media Coverage Kumparan
  $('#kumparan').click(function(){
    mixpanel.track("Media Coverage Kumparan Selected ");
  })

  // Mixpanel track Media Coverage liputan6
  $('#liputan6').click(function(){
    mixpanel.track("Media Coverage Liputan6 Selected ");
  })

  // Mixpanel track Media Coverage techinasia
  $('#techinasia').click(function(){
    mixpanel.track("Media Coverage Techinasia Selected ");
  })

  // Mixpanel track Media Coverage Media Indonesia
  $('#mediaindonesia').click(function(){
    mixpanel.track("Media Coverage Media Indonesia Selected ");
  })

  // Mixpanel track Media Coverage metrotv
  $('#metrotv').click(function(){
    mixpanel.track("Media Coverage Metrotv Selected");
  })

  // Mixpanel track Other Verbatim Seen
  $('#testimonial-slider').click(function(){
    mixpanel.track("Other Verbatim Seen");
  })

  // Mixpanel track Product Partner Tanamduit Selected
  $('#tanamduit').click(function(){
    mixpanel.track("Product Partner Tanamduit Selected");
  })

  // Mixpanel track Product Partner indogold Selected
  $('#indogold').click(function(){
    mixpanel.track("Product Partner Indogold Selected");
  })

  // Mixpanel track Product Partner danain Selected
  $('#danain').click(function(){
    mixpanel.track("Product Partner Danain Selected");
  })

  // Mixpanel track Product Partner tamasia Selected
  $('#tamasia').click(function(){
    mixpanel.track("Product Partner Tamasia Selected");
  })

  // Mixpanel track Product Partner mekar Selected
  $('#mekar').click(function(){
    mixpanel.track("Product Partner Mekar Selected");
  })
  
  


});


