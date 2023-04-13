/**
 * Script fort the customizer tabs control focus function.
 *
 * @since    0.1
 * @package honeypress

 */

/* global wp */

var honeypress_customize_tabs_focus = function ( $ ) {
	'use strict';
	$(
		function () {
				var customize = wp.customize;
				$( '.customize-partial-edit-shortcut' ).live(
					'DOMNodeInserted', function () {
						$( this ).on(
							'click', function() {
								var controlId     = $( this ).attr( 'class' );
								var tabToActivate = '';

								if ( controlId.indexOf( 'widget' ) !== -1 ) {
									tabToActivate = $( '.honeypress-customizer-tab>.widgets' );
								} else {
									var controlFinalId = controlId.split( ' ' ).pop().split( '-' ).pop();
									tabToActivate      = $( '.honeypress-customizer-tab>.' + controlFinalId );
								}

								customize.preview.send( 'tab-previewer-edit', tabToActivate );
							}
						);
					}
				);
		}
	);
};

honeypress_customize_tabs_focus( jQuery );
