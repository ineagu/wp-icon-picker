'use strict';

(function( $ ) {
	var frame, setIcon, unsetIcon, getFrame, updateField, updatePreview, $field;

	getFrame = function() {
		if ( ! frame ) {
			frame = new wp.media.view.MediaFrame.IconPicker();

			frame.target.on( 'change', updateField );
		}

		return frame;
	};

	updateField = function( model ) {
		_.each( model.get( 'inputs' ), function( $input, key ) {
			$input.val( model.get( key ) );
		});

		model.clear({ silent: true });
		$field.trigger( 'ipf:update' );
	};

	updatePreview = function( e ) {};

	setIcon = function( e ) {
		var frame = getFrame(),
			model = { inputs: {} };

		e.preventDefault();

		$field   = $( e.currentTarget ).closest( '.ipf' );
		model.id = $field.attr( 'id' );

		// Collect input fields and use them as the model's attributes.
		$field.find( 'input' ).each( function() {
			var $input = $( this ),
			    key    = $input.attr( 'class' ).replace( 'ipf-', '' ),
			    value  = $input.val();

			model[ key ]        = value;
			model.inputs[ key ] = $input;
		});

		frame.target.set( model, { silent: true } );
		frame.open();
	};

	$( document )
		.on( 'click', 'a.ipf-select', setIcon )
		.on( 'ipf:update', 'div.ipf', updatePreview );

	$( 'div.ipf' ).trigger( 'ipf:update' );
}( jQuery ) );
