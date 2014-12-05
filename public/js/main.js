$( function() {
	
	// item.add view scripts
	$('#paste-link-form').submit( function(e) {
		e.preventDefault();

		$('#item-link-input').val( $('#arch-link').val() );
		$('.item-add-steps .step-2').css({opacity: 1});

		return false;
	});

	$('.item-category a').click( function(e) {
		e.preventDefault();

		var $this = $(this);
		var category = $this.attr('data-category');

		$('#item-category-input').val(category);
		$this.closest('li').addClass('selected').siblings('li.item-category').removeClass('selected');
		return false;
	});


});