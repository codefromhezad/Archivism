function handleAjaxErrors(error) {
	alert(error);
}

$( function() {

	// item.add view scripts
	$('#item-link').keyup( function(e) {
		e.preventDefault();
		if(e.which==13) {
			$.post(
				'/ajax/provider-type', 
				{
					_token: $('input[name=_token]').val(), 
					url: $('#item-link').val()
				}, 
				function(data) {
					if( data.status == "ok" ) {
						$('#item-provider').val(data.slug);
					} else {
						handleAjaxErrors("Something wrong happened :/ Please try again.");
					}
					console.log($('.add-item-form').serialize());
					$('.item-add-steps .step-2').css({opacity: 1});
				},
				'json'
			);
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