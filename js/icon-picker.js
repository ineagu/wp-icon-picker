(function( $, _, Backbone ) {

var Target, Fonts;

/**
 * wp.media.model.IconPickerTarget
 *
 * A target where the picked icon should be sent to
 *
 * @augments Backbone.Model
 */
Target = Backbone.Model.extend({
	defaults: {
		type:  '',
		group: 'all',
		icon:  ''
	}
});

wp.media.model.IconPickerTarget = Target;

/**
 * wp.media.model.IconPickerFonts
 */
Fonts = Backbone.Collection.extend({
	initialize: function( models ) {
		this.items = new Backbone.Collection( models );
		this.props = new Backbone.Model({
			group:  'all',
			search: ''
		});

		this.props.on( 'change', this.refresh, this );
	},

	/**
	 * Refresh library when props is changed
	 *
	 * @param {Backbone.Model} props
	 */
	refresh: function( props ) {
		var library = this,
		    items   = this.items.toJSON();

		_.each( props.toJSON(), function( value, filter ) {
			if ( library.filters[ filter ] ) {
				items = _.filter( items, _.bind( library.filters[ filter ], this ), value );
			}
		}, this );

		this.reset( items );
	},
	filters: {
		/**
		 * @static
		 * @param {object} item
		 *
		 * @this wp.media.model.IconPickerFonts
		 *
		 * @returns {Boolean}
		 */
		group: function( item ) {
			var groupId = this.props.get( 'group' );

			return ( 'all' === groupId || item.group === groupId || '' === item.group );
		},

		/**
		 * @static
		 * @param {object} item
		 *
		 * @this wp.media.model.IconPickerFonts
		 *
		 * @returns {Boolean}
		 */
		search: function( item ) {
			var term = this.props.get( 'search' ),
			    result;

			if ( '' === term ) {
				result = true;
			} else {
				result = _.any( [ 'id', 'name' ], function( key ) {
					var value = item[ key ];

					return value && -1 !== value.search( this );
				}, term );
			}

			return result;
		}
	}
});

wp.media.model.IconPickerFonts = Fonts;

}( jQuery, _, Backbone ) );

(function( $, _ ) {
var View = wp.media.View,
    Attachment = wp.media.view.Attachment.Library,
    Toolbar = wp.media.view.Toolbar,
    AttachmentFilters = wp.media.view.AttachmentFilters,
    Search = wp.media.view.Search,
    ipL10n = wp.media.view.l10n.iconPicker,
    FontItem, FontLibrary, FontFilter, FontBrowser, SvgItem;

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

/**
 * wp.media.view.IconPickerSvgItem
 */
SvgItem = Attachment.extend({
	template: wp.template( 'icon-picker-svg-item' )
});

wp.media.view.IconPickerSvgItem = SvgItem;

}( jQuery, _ ) );

(function( $, _ ) {

var State = wp.media.controller.State,
    Library = wp.media.controller.Library,
    l10n = wp.media.view.l10n,
    models = wp.media.model,
    views = wp.media.view,
    Font, Img, Svg;

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
		return new views.AttachmentsBrowser({
			controller:       this.frame,
			collection:       this.get( 'library' ),
			selection:        this.get( 'selection' ),
			model:            this,
			sortable:         this.get( 'sortable' ),
			search:           this.get( 'searchable' ),
			filters:          this.get( 'filterable' ),
			sidebar:          false,
			display:          false,
			dragInfo:         this.get( 'dragInfo' ),
			idealColumnWidth: this.get( 'idealColumnWidth' ),
			suggestedWidth:   this.get( 'suggestedWidth' ),
			suggestedHeight:  this.get( 'suggestedHeight' ),
			AttachmentView:   ( 'svg' === this.id ) ? views.IconPickerSvgItem : undefined
		});
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

(function( $, _ ) {
/**
 * wp.media.view.MediaFrame.IconPicker
 *
 * A frame for selecting an icon.
 *
 * @class
 * @augments wp.media.view.MediaFrame.Select
 * @augments wp.media.view.MediaFrame
 * @augments wp.media.view.Frame
 * @augments wp.media.View
 * @augments wp.Backbone.View
 * @augments Backbone.View
 * @mixes wp.media.controller.StateMachine
 */

var l10n = wp.media.view.l10n,
    Select = wp.media.view.MediaFrame.Select,
	IconPicker;

IconPicker = Select.extend({
	initialize: function() {
		_.defaults( this.options, {
			title:    l10n.iconPicker.frameTitle,
			multiple: false,
			ipTypes:  iconPicker.types,
			target:   null
		});

		if ( this.options.target instanceof wp.media.model.IconPickerTarget ) {
			this.target = this.options.target;
		} else {
			this.target = new wp.media.model.IconPickerTarget();
		}

		Select.prototype.initialize.apply( this, arguments );
	},

	createStates: function() {
		var Controller;

		_.each( this.options.ipTypes, function( props ) {
			if ( ! wp.media.controller.hasOwnProperty( 'IconPicker' + props.controller ) ) {
				return;
			}

			Controller = wp.media.controller[ 'IconPicker' + props.controller ];

			this.states.add( new Controller({
				id:      props.id,
				content: props.id,
				title:   props.name,
				data:    props.data
			}) );
		}, this );
	},

	/**
	 * Bind region mode event callbacks.
	 */
	bindHandlers: function() {
		this.on( 'router:create:browse', this.createRouter, this );
		this.on( 'router:render:browse', this.browseRouter, this );
		this.on( 'content:render', this.ipRenderContent, this );
		this.on( 'toolbar:create:select', this.createSelectToolbar, this );
		this.on( 'open', this._ipSetState, this );
		this.on( 'select', this._ipUpdateTarget, this );
	},

	/**
	 * Set state based on the target's icon type
	 */
	_ipSetState: function() {
		var stateId = this.target.get( 'type' );

		if ( ! stateId || ! this.states.findWhere( { id: stateId } ) ) {
			stateId = this.states.at( 0 ).id;
		}

		this.setState( stateId );
	},

	/**
	 * Update target's attributes after selecting an icon
	 */
	_ipUpdateTarget: function() {
		var state = this.state(),
		    selection = this.state().get( 'selection' ).single();

		this.target.set({
			type:  state.id,
			icon:  selection.get( 'id' ),
			group: selection.get( 'group' )
		});
	},

	browseRouter: function( routerView ) {
		var routers = this.state().routers;

		if ( routers ) {
			routerView.set( routers );
		}
	},

	ipRenderContent: function() {
		var state   = this.state(),
		    mode    = this.content.mode(),
		    content = state.getContentView( mode );

		this.content.set( content );
	}
});

wp.media.view.MediaFrame.IconPicker = IconPicker;

}( jQuery, _ ) );
