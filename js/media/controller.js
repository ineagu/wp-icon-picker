/* globals wp: false */

(function( $, _ ) {

var State = wp.media.controller.State,
    models = wp.media.model,
    Font;

/**
 * wp.media.controller.IconPickerFont
 */
Font = State.extend({
	defaults: {
		multiple: false,
		menu:     'default',
		toolbar:  'select',
		baseType: 'font'
	},

	initialize: function() {
		this.set( 'groups', new Backbone.Collection( this.get( 'groups' ) ) );
		this.set( 'library', new models.IconPickerFonts( this.get( 'library' ) ) );
		this.set( 'selection', new models.Selection( null, {
			multiple: this.get( 'multiple' )
		}) );
	},

	activate: function() {
		this.frame.on( 'open', this.refresh, this );
		this.updateSelection();
	},

	deactivate: function() {
		this.frame.off( 'open', this.refresh, this );
	},

	refresh: function() {
		this.resetFilter();
		this.updateSelection();
	},

	resetFilter: function() {},

	updateSelection: function() {},

	getContentView: function() {
		return new wp.media.view.IconPickerFontBrowser({
			controller: this.frame,
			model:      this,
			groups:     this.get( 'groups' ),
			collection: this.get( 'library' ),
			selection:  this.get( 'selection' ),
			baseType:   this.get( 'baseType' ),
			type:       this.get( 'id' )
		});
	}
});

wp.media.controller.IconPickerFont = Font;

}( jQuery, _ ) );
