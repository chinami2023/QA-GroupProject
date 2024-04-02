$(function(){
	
	$(".hamburger").on("click", function(){	
		$('.mobile-menu ul').slideToggle();
		$('.fa-bars').toggle(); /* toggles hamburger icon */
		$('.fa-xmark').toggle(); /* toggles close (x) icon */
	});
	
	/* adds a line through clicked li items*/
	$('.mobile-menu ul li').on("click", function(){
		$(this).toggleClass("complete");
	});
});