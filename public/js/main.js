$( function() {
	
	// item.add view scripts
	$('#item-link').keyup( function(e) {
		e.preventDefault();
		if(e.which==13) {
			$('.item-add-steps .step-2').css({opacity: 1});
		}
		return false;
	});

	$('.add-item-form').submit( function(e) {
		e.preventDefault();
		return false;
	})

	$('.item-category a').click( function(e) {
		e.preventDefault();

		var $this = $(this);
		var category = $this.attr('data-category');

		$('#item-category').val(category);
		$this.closest('li').addClass('selected').siblings('li.item-category').removeClass('selected');
		return false;
	});


});