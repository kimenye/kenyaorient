jQuery(function($){

	var elements = jQuery('.category-nav li a').map(function() {
		var id = jQuery(this).attr('id');
		jQuery('.' + id).addClass('hide');
		return id;
	});

	jQuery('.category-nav li:first').addClass('active');
	var first = elements[0];
	jQuery('.' + first).toggleClass('hide');

	function hideAll() {
		elements.each(function() {
			jQuery('.' + this).addClass('hide');
			jQuery('#' + this).parent().removeClass('active');

		});
	}	

	jQuery('.category-nav li a').click(function() {
		var id = jQuery(this).attr('id');
		hideAll();
		jQuery('.' + id).toggleClass('hide');
		jQuery('#' + id).parent().addClass('active');
	});
});