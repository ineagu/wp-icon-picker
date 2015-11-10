var Library = wp.media.controller.Library,
    l10n = wp.media.view.l10n,
    models = wp.media.model,
    views = wp.media.view,
    IconPickerImg;

/**
 * wp.media.controller.IconPickerImg
 */
IconPickerImg = Library.extend( _.extend({
	defaults: _.defaults({
		id:            'image',
		baseType:      'image',
		syncSelection: false
	}, Library.prototype.defaults ),

	initialize: function( options ) {
		var selection = this.get( 'selection' );

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
		var options = _.extend({
			model:            this,
			controller:       this.frame,
			collection:       this.get( 'library' ),
			selection:        this.get( 'selection' ),
			sortable:         this.get( 'sortable' ),
			search:           this.get( 'searchable' ),
			filters:          this.get( 'filterable' ),
			dragInfo:         this.get( 'dragInfo' ),
			idealColumnWidth: this.get( 'idealColumnWidth' ),
			suggestedWidth:   this.get( 'suggestedWidth' ),
			suggestedHeight:  this.get( 'suggestedHeight' )
		}, this.ipGetSidebarOptions() );

		if ( 'svg' === this.id ) {
			options.AttachmentView = views.IconPickerSvgItem;
		}

		return new views.IconPickerImgBrowser( options );
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
	},

	/**
	 * Get image icon URL
	 *
	 * @param {$object}
	 * @return {$string}
	 */
	ipGetIconUrl: function( model ) {
		var url   = model.get( 'url' ),
		    sizes = model.get( 'sizes' );

		if ( sizes && sizes.thumbnail ) {
			url = sizes.thumbnail.url;
		}

		return url;
	}
}, wp.media.controller.IconPickerState ) );

module.exports = IconPickerImg;
