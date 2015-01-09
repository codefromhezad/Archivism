function checkAndHandleAjaxError(payload) {
	if( payload.status === undefined ) {
		if( payload.error ) {
			// Laravel's DEBUG is certainly activated
			// so we can show the error contents

			console.error('AJAX: FATAL ERROR');
			console.log(payload.error.message);
			console.log('File: '+payload.error.file+' on line '+payload.error.line);

		} else {

			// We have no idea about the contents of this payload :/ There's no
			// standard status returned in the JSON data nor any fatal
			// errors reported (when DEBUG is NOT active server-side, we can't see
			// any data nor fatal error status) 
			// 
			// That should never happen, but you know ... You can't be too careful.
			//
			// Well .. The part about being too careful is true when handling critical 
			// stuff (Like a website, a webapp, a you-name-it in production). In 
			// *real* life, being *too* careful only leads to unnecessary stress.
			//
			// Sometimes, it's nice to go with the flow :)
			//
			// Anyway, have a wonderful day, whoever you are.

			console.error('AJAX: Couldn\'t get any status for this request. Something went wrong :/');
		}

		return false;

	} else if( payload.status == "ok" ) {

		return true;

	} else {
		// Damn, something wrong happened but we have some data back from the
		// server. It shouldn't be any sensible data about the app so we can return
		// it. (Most of the time, it will be form validation data)

		return false;
	}
}

$( function() {

	// General uncatched AJAX errors (Most probably because of a fatal server error
	// when the app is in production)
	$( document ).ajaxError(function( event, jqxhr, settings, thrownError ) {
		checkAndHandleAjaxError(jqxhr.responseJSON);
	});


	// item.add view scripts
	$('#item-link').keyup( function(e) {
		e.preventDefault();
		if(e.which==13) {
			$.post(
				'/ajax/guess-item-provider-and-kind', 
				{
					_token: $('input[name=_token]').val(), 
					url: $('#item-link').val()
				}, 
				function(payload) {

					if( checkAndHandleAjaxError(payload) ) {
						$('#item-provider').val(payload.provider);

						var $itemKindSelector = $('.item-add-categories a[data-kind="'+payload.kind+'"]');

						if( $itemKindSelector.length ) {
							$itemKindSelector.click();
						}

						$('.item-add-steps .step-2').addClass('active');
						$('.item-add-steps .step-2 h2').html(payload.kindGuessMessage);

						$('body').animate({scrollTop: $('.item-add-steps .step-2').offset().top}, 'fast');

					} else {
						// TODO: Handle nicely the error ?
						// => Can't find or think of any possible/displayable error here
						//	  excepted server errors which are already handled by the
						//	  validateAjaxPayload function.
					}
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