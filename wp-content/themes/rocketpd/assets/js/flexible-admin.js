/* global rpd_flex_admin */
( function ( $ ) {
	'use strict';

	$( '#rpd-flex-randomize-btn' ).on( 'click', function () {
		if ( ! confirm( 'This will replace all current sections with a new randomized layout. Continue?' ) ) {
			return;
		}

		var btn = $( this );
		btn.prop( 'disabled', true ).text( 'Generating…' );

		$.post( rpd_flex_admin.ajax_url, {
			action:  'rpd_flex_randomize',
			nonce:   rpd_flex_admin.nonce,
			post_id: rpd_flex_admin.post_id,
		} )
			.done( function ( response ) {
				if ( response.success && response.data.redirect ) {
					window.location.href = response.data.redirect;
				} else {
					btn.prop( 'disabled', false ).text( 'Generate Randomized Page' );
					alert( 'Something went wrong. Please try again.' );
				}
			} )
			.fail( function () {
				btn.prop( 'disabled', false ).text( 'Generate Randomized Page' );
				alert( 'Request failed. Please try again.' );
			} );
	} );
} )( jQuery );
