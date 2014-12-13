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

	$('.item-kind a').click( function(e) {
		e.preventDefault();

		var $this = $(this);
		var kind = $this.attr('data-kind');

		$('#item-kind').val(kind);
		$this.closest('li').addClass('selected').siblings('li.item-kind').removeClass('selected');
		return false;
	});


});