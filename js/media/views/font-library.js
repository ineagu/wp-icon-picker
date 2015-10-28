/**
 * wp.media.view.IconPickerFontLibrary
 */
var IconPickerFontLibrary = wp.media.View.extend({
	tagName:   'ul',
	className: 'attachments icon-picker-items clearfix',

	initialize: function() {
		this._viewsByCid = {};

		this.collection.on( 'reset', this.refresh, this );
		this.controller.on( 'open', this.scrollToSelected, this );
	},

	render: function() {
		this.collection.each( function( model ) {
			this.views.add( this.renderItem( model ), {
				at: this.collection.indexOf( model )
			} );
		}, this );

		return this;
	},

	renderItem: function( model ) {
		var view = new wp.media.view.IconPickerFontItem({
			controller: this.controller,
			model:      model,
			collection: this.collection,
			selection:  this.options.selection,
			baseType:   this.options.baseType,
			type:       this.options.type
		});

		return this._viewsByCid[ view.cid ] = view;
	},

	clearItems: function() {
		_.each( this._viewsByCid, function( view ) {
			delete this._viewsByCid[ view.cid ];
			view.remove();
		}, this );
	},

	refresh: function() {
		this.clearItems();
		this.render();
	},

	ready: function() {
		this.scrollToSelected();
	},

	scrollToSelected: function() {
		var single = this.options.selection.single(),
		    singleView;

		if ( ! single ) {
			return;
		}

		singleView = this.getView( single );
		if ( singleView && ! this.isInView( singleView.$el ) ) {
			this.$el.scrollTop( singleView.$el.offset().top - this.$el.offset().top + this.$el.scrollTop() - parseInt( this.$el.css( 'paddingTop' ), 10 ) );
		}
	},

	getView: function( model ) {
		return _.findWhere( this._viewsByCid, { model: model } );
	},

	isInView: function( $elem ) {
		var $window       = jQuery( window ),
		    docViewTop    = $window.scrollTop(),
		    docViewBottom = docViewTop + $window.height(),
		    elemTop       = $elem.offset().top,
		    elemBottom    = elemTop + $elem.height();

		return ( ( elemBottom <= docViewBottom ) && ( elemTop >= docViewTop ) );
	}
});

module.exports = IconPickerFontLibrary;
