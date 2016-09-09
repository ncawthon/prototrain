jQuery( document ).ready(function($) {
	//initialize foundation
	$(document).foundation();
	
	$('#banner_carousel').owlCarousel({
		loop:true,
		margin:0,
		responsiveClass:true,
		items:1,
		autoplay:false,
		singleItem:true,
		autoplayTimeout:7000,
		dots:true,
		nav: true,
		navText: [ '<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>' ],
	});

	//custom scrollbar
	$(".post-tabs_scroll").mCustomScrollbar({
		theme:"dark"
	});

	$('post-course_content').matchHeight();

	// $('#paymentclose').foundation('close');
	

	//tabs active
	// $('.post-accomodation_location ul.tabs').find('li:first').addClass('in is-active');
	// $('.post-accomodation_location .tabs-content').find('.tabs-panel:first').addClass('is-active');

	// $('.post-accomodation_location ul li').click(function(){
	// 	$('.tabs-content #san-jose').attr('is-active');
	// 	var clicked_ID = $(this).children('a').attr('href');
	// 	console.log(clicked_ID);
	// 	console.log($('.tabs-content #san-jose').html());
	// 	//$('.tabs-content div').removeClass('is-active');
	// 	$('.tabs-content div'+clicked_ID).addClass('is-active');
	// });

});