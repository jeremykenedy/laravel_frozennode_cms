$(document).ready(function() {
	removeMobileHoverTap();
	backToTop1();
	$(".player").mb_YTPlayer();
});


//FUNCTION TO REMOVE MOBILE DEVICE DOUBLE TAP FOR ANCHOR TAGS WITH HOVER STATES - ADD .remove_tap CLASS TO ANCHOR TAG
function removeMobileHoverTap(){	
	$('.remove_tap a').on('click touchend', function(e) {
		var el = $(this);
		var link = el.attr('href');
		window.location = link;
	});
	//FUNCTION TO ALLOW MOBILE SUB NAVIGATION TO WORK CORRECTLY WITH REMOVE TAP FUNCTION ABOVE.
	function mediaQuerySpecificJS() {
		if(Modernizr.mq('screen and (min-width:640px)')) {
			// action for screen widths including and above 640 pixels 
			$('nav').addClass('remove_tap');
			$('nav ul li').addClass('remove_tap');
		}
	  	else if(Modernizr.mq('screen and (max-width:640px)')) {
			// action for screen widths below 640 pixels 
			$('nav').removeClass('remove_tap');
			$('nav ul li').removeClass('remove_tap');
	  	}
	}
	var id;
	$(window).resize(function() {
		clearTimeout(id);
		id = setTimeout(mediaQuerySpecificJS, 0);
	});
	mediaQuerySpecificJS();
}

//BACK TO TOP 1 FUNCTION 
function backToTop1(){
	var offset = 300,
		offset_opacity = 1200,
		scroll_top_duration = 700,
		$back_to_top = $('.back-to-top-1');

	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('back-to-top-1-visible') : $back_to_top.removeClass('back-to-top-1-visible back-to-top-1-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('back-to-top-1-fade-out');
		}
	});

	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});
}

//FUNCTION TO ACCEPT ONLY NUMBERS IN INPUT BOX
function isNumberKey(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
	return false;
	return true;
}