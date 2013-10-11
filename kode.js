// code pour liens sortants:

jQuery.noConflict();

// note - jQuery library comes from the ContactForm7 plugin...

/*
jQuery(document).ready(function(){
alert('jQuery is working');
});
*/

jQuery(document).ready(function(){
	jQuery('#menu ul li ul').hover(function() {
		jQuery(this).parent().addClass('current_page_parent2');
			}, function() {
		jQuery(this).parent().removeClass('current_page_parent2');
	});
});

/*
jQuery(document).ready(function(){
jQuery("a[@href^='http']").attr('target','_blank');
});
= Error: uncaught exception: Syntax error, unrecognized expression: [@href^='http']
*/