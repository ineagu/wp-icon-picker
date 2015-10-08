/* globals wp: false */

(function( $, _ ) {
var View = wp.media.View,
    Attachment = wp.media.view.Attachment,
    Toolbar = wp.media.view.Toolbar,
    AttachmentFilters = wp.media.view.AttachmentFilters,
    Search = wp.media.view.Search,
    ipL10n = wp.media.view.l10n.iconPicker,
    FontItem, FontLibrary, FontFilter, FontBrowser;

/**
 * wp.media.view.IconPickerFontItem
 */
FontItem = Attachment.extend({
	className: 'attachment icon-picker-item',
	events:    {
		'click .attachment-preview': 'toggleSelectionHandler',
		'click a':                   'preventDefault'
	},

	initialize: function() {
		this.template = wp.media.template( 'icon-picker-' + this.options.baseType + '-item' );
		Attachment.prototype.initialize.apply( this, arguments );
	},

	render: function() {
		var options = _.defaults( this.model.toJSON(), {
			baseType: this.options.baseType,
			type:     this.options.type
		});

		this.$el.html( this.template( options ) );
		this.updateSelect();

		return this;
	}
});

wp.media.view.IconPickerFontItem = FontItem;

/**
 * wp.media.view.IconPickerFontLibrary
 */
FontLibrary = View.extend({
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
		var view = new FontItem({
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
		var $window       = $( window ),
		    docViewTop    = $window.scrollTop(),
		    docViewBottom = docViewTop + $window.height(),
		    elemTop       = $elem.offset().top,
		    elemBottom    = elemTop + $elem.height();

		return ( ( elemBottom <= docViewBottom ) && ( elemTop >= docViewTop ) );
	}
});

wp.media.view.IconPickerFontLibrary = FontLibrary;

/**
 * wp.media.view.IconPickerFontFilter
 */
FontFilter = AttachmentFilters.extend({
	createFilters: function() {
		var groups  = this.controller.state().get( 'groups' ),
		    filters = {};

		filters.all = {
			text:  ipL10n.allFilter,
			props: { group: 'all' }
		};

		groups.each( function( group ) {
			filters[ group.id ] = {
				text:  group.get( 'name' ),
				props: { group: group.id }
			};
		});

		this.filters = filters;
	},

	change: function() {
		var filter = this.filters[ this.el.value ];

		if ( filter ) {
			this.model.set( 'group', filter.props.group );
		}
	}
});

wp.media.view.IconPickerFontFilter = FontFilter;

/**
 * wp.media.view.IconPickerFontBrowser
 */
FontBrowser = View.extend({
	className: function() {
		var className = 'attachments-browser icon-picker-fonts-browser';

		if ( ! this.options.sidebar ) {
			className += ' no-sidebar';
		}

		return className;
	},

	initialize: function() {
		_.defaults( this.options, {
			sidebar: false
		});

		this.groups = this.options.groups;

		this.createToolbar();
		this.createLibrary();
	},

	createLibrary: function() {
		this.items = new FontLibrary({
			controller: this.controller,
			collection: this.collection,
			selection:  this.options.selection,
			baseType:   this.options.baseType,
			type:       this.options.type
		});

		this.views.add( this.items );
	},

	createToolbar: function() {
		this.toolbar = new Toolbar({
			controller: this.controller
		});

		this.views.add( this.toolbar );

		// Dropdown filter
		this.toolbar.set( 'filters', new FontFilter({
			controller: this.controller,
			model:      this.collection.props,
			priority:   -80
		}).render() );

		// Search field
		this.toolbar.set( 'search', new Search({
			controller: this.controller,
			model:      this.collection.props,
			priority:   60
		}).render() );
	}
});

wp.media.view.IconPickerFontBrowser = FontBrowser;

}( jQuery, _ ) );
