function checkAndHandleAjaxError(payload) {
	if( payload ) {
		if( payload.error ) {
			// Laravel's DEBUG is certainly activated
			// so we can show the error contents

			console.error('AJAX: FATAL ERROR');
			console.log(payload.error.message);
			console.log('File: '+payload.error.file+' on line '+payload.error.line);

			return false;
		
		} else if( payload.status == "ok" ) {
			return true;
		}

		return false;
	}
}

$.fn.verticalCenter = function() {
	return $(this).each( function() {
		$(this).find('.vertical-center-please').each( function() {
			var $this = $(this);
			var centerTop = ($this.parent().height() - $this.height()) / 2;
			var thisCssPosition = $this.css('position');

			if( thisCssPosition == 'static' ) {
				$this.css({position: 'relative'});
			}
			
			$this.css({top: centerTop + 'px'});
		});
	});
}

$( function() {

	// General uncatched AJAX errors (Most probably because of a fatal server error
	// when the app is in production)
	$(document).ajaxError(function( event, jqxhr, settings, thrownError ) {
		checkAndHandleAjaxError(jqxhr.responseJSON);
	});


	// Layout helpers are defined on resize.
	// That helps
	$(window).resize( function() {
		$('body').verticalCenter();
	}).resize();


	// item.add view scripts
	$('#item-link-input').keyup( function(e) {
		e.preventDefault();

		if(e.which==13) {
			$.post(
				'/ajax/guess-item-provider-and-kind', 
				{
					_token: $('input[name=_token]').val(), 
					url: $('#item-link-input').val()
				}, 
				function(payload) {
					if( checkAndHandleAjaxError(payload) ) {

						$('#item-link').val(payload.url);
						$('#item-provider').val(payload.provider);
						var $itemKindSelector = $('.item-add-categories a[data-kind="'+payload.kind+'"]');

						if( $itemKindSelector.length ) {
							$itemKindSelector.click();
						}

						var $step2 = $('.item-add-steps .step-2');

						$step2.addClass('active');
						$('h2', $step2).html(payload.kindGuessMessage);
						$step2.verticalCenter();

						$('body').animate({scrollTop: $step2.offset().top}, 'fast');

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

	$('.item-kind a').click( function(e) {
		e.preventDefault();

		var $this = $(this);
		var kind = $this.attr('data-kind');

		$('#item-kind').val(kind);
		$this.closest('li').addClass('selected').siblings('li.item-kind').removeClass('selected');
		return false;
	});


});