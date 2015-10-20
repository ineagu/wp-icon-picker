/* globals wp: false */

(function( $, _ ) {

var State = wp.media.controller.State,
    Library = wp.media.controller.Library,
    l10n = wp.media.view.l10n,
    models = wp.media.model,
    Font, Img;

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
		var data = this.get( 'data' );

		this.set( 'groups', new Backbone.Collection( data.groups ) );
		this.set( 'library', new models.IconPickerFonts( data.items ) );
		this.set( 'selection', new models.Selection( null, {
			multiple: this.get( 'multiple' )
		}) );
	},

	activate: function() {
		this.frame.on( 'open', this.refresh, this );
		this.refresh();
	},

	deactivate: function() {
		this.frame.off( 'open', this.refresh, this );
	},

	refresh: function() {
		this.resetFilter();
		this.updateSelection();
	},

	resetFilter: function() {
		var library = this.get( 'library' ),
		    groups  = this.get( 'groups' ),
		    target  = this.frame.target,
		    groupId = target.get( 'group' ),
		    group   = groups.findWhere({ id: groupId });

		if ( ! group ) {
			groupId = target.defaults.group;
		}

		library.props.set( 'group', groupId );
	},

	updateSelection: function() {
		var selection = this.get( 'selection' ),
		    library   = this.get( 'library' ),
		    target    = this.frame.target,
		    icon      = target.get( 'icon' ),
		    type      = target.get( 'type' ),
		    selected;

		if ( this.id === type ) {
			selected = library.findWhere({ id: icon });
		}

		selection.reset( selected ? selected : null );
	},

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

/**
 * wp.media.controller.IconPickerImage
 */
Img = Library.extend({
	defaults: _.defaults({
		id:            'image',
		syncSelection: false
	}, Library.prototype.defaults ),

	initialize: function( options ) {
		var selection = this.get( 'selection' ),
		    fields;

		this.options = options;

		this.set( 'library', wp.media.query({ type: options.data.mimeTypes }) );

		this.routers = {
			upload: {
				text:     l10n.uploadFilesTitle,
				priority: 20
			},
			browse: {
				text:     l10n.mediaLibraryTitle,
				priority: 40
			}
		};

		if ( ! ( selection instanceof models.Selection ) ) {
			this.set( 'selection', new models.Selection( selection, {
				multiple: false
			}) );
		}

		Library.prototype.initialize.apply( this, arguments );
	},

	activate: function() {
		Library.prototype.activate.apply( this, arguments );
		this.get( 'library' ).observe( wp.Uploader.queue );
		this.frame.on( 'open', this.updateSelection, this );
		this.updateSelection();
	},

	deactivate: function() {
		Library.prototype.deactivate.apply( this, arguments );
		this.get( 'library' ).unobserve( wp.Uploader.queue );
		this.frame.off( 'open', this.updateSelection, this );
	},

	getContentView: function( mode ) {
		var content = ( 'upload' === mode ) ? this.uploadContent() : this.browseContent();

		this.frame.$el.removeClass( 'hide-toolbar' );

		return content;
	},

	/**
	 * Media library content
	 *
	 * TODO: sidebar view
	 */
	browseContent: function() {
		var state = this,
		    options;

		options = {
			controller:       state.frame,
			collection:       state.get( 'library' ),
			selection:        state.get( 'selection' ),
			model:            state,
			sortable:         state.get( 'sortable' ),
			search:           state.get( 'searchable' ),
			filters:          state.get( 'filterable' ),
			sidebar:          false,
			display:          false,
			dragInfo:         state.get( 'dragInfo' ),
			idealColumnWidth: state.get( 'idealColumnWidth' ),
			suggestedWidth:   state.get( 'suggestedWidth' ),
			suggestedHeight:  state.get( 'suggestedHeight' ),
			AttachmentView:   state.get( 'AttachmentView' )
		};

		return new wp.media.view.AttachmentsBrowser( options );
	},

	/**
	 * Render callback for the content region in the `upload` mode.
	 */
	uploadContent: function() {
		return new wp.media.view.UploaderInline({
			controller: this.frame
		});
	},

	updateSelection: function() {
		var selection = this.get( 'selection' ),
		    target    = this.frame.target,
		    icon      = target.get( 'icon' ),
		    type      = target.get( 'type' ),
		    selected;

		if ( this.id === type ) {
			selected = models.Attachment.get( icon );
			this.dfd = selected.fetch();
		}

		selection.reset( selected ? selected : null );
	}
});

wp.media.controller.IconPickerImg = Img;

}( jQuery, _ ) );
