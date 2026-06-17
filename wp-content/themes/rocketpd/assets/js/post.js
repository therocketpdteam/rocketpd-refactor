/**
 * Post page JS — FAQ accordion.
 *
 * Targets .rpd-post-faq__toggle buttons and toggles their associated
 * .rpd-post-faq__answer panels using aria-expanded / hidden attributes.
 */
( function () {
	'use strict';

	function initFaq() {
		var toggles = document.querySelectorAll( '.rpd-post-faq__toggle' );

		if ( ! toggles.length ) {
			return;
		}

		toggles.forEach( function ( btn ) {
			btn.addEventListener( 'click', function () {
				var expanded = btn.getAttribute( 'aria-expanded' ) === 'true';
				var panelId  = btn.getAttribute( 'aria-controls' );
				var panel    = panelId ? document.getElementById( panelId ) : null;

				if ( ! panel ) {
					return;
				}

				btn.setAttribute( 'aria-expanded', String( ! expanded ) );

				if ( expanded ) {
					panel.hidden = true;
				} else {
					panel.hidden = false;
				}
			} );
		} );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', initFaq );
	} else {
		initFaq();
	}
}() );
