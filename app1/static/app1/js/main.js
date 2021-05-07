

(function ($) {
"use strict";
// TOP Menu Sticky
$(window).on('scroll', function () {
	var scroll = $(window).scrollTop();
	if (scroll < 400) {
    $("#sticky-header").removeClass("sticky");
    $('#back-top').fadeIn(500);
	} else {
    $("#sticky-header").addClass("sticky");
    $('#back-top').fadeIn(500);
	}
});


$(document).ready(function(){

// mobile_menu
var menu = $('ul#navigation');
if(menu.length){
	menu.slicknav({
		prependTo: ".mobile_menu",
		closedSymbol: '+',
		openedSymbol:'-'
	});
};

  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });

});



$('.js--wp-3').waypoint(function(direction) {
    $('.js--wp-3').addClass('animated fadeIn');
}, {
    offset: '60%'
});

$('.about').waypoint(function(direction) {
	$('.glisse').addClass('animated fadeInRight');
	$('.glisse2').addClass('animated fadeInLeft');
}, {
    offset: '60%'
});

$('.footer').waypoint(function(direction) {
	$('.c3').addClass('animated fadeInRight');
	$('.c1').addClass('animated fadeInLeft');
	$('.c2').addClass('animated fadeInUp');
}, {
    offset: '60%'
});




})(jQuery);	