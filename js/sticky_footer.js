jQuery(document).ready(function() {
	var windowht = jQuery(window).height();
	var contentht = jQuery("#page-wrapper").outerHeight();
	
	if(contentht < windowht) {
		var newht = windowht - contentht;
		jQuery(".footer-bottom-wrapper").css("margin-top", newht);
	}
	else {
		jQuery(".footer-bottom-wrapper").css("margin-top", "0");
	}
}); 
