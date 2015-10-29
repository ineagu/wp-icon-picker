(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
/**
 * wp.media.controller.IconPickerFont
 */
var IconPickerFont = wp.media.controller.State.extend({
	defaults: {
		multiple: false,
		menu:     'default',
		toolbar:  'select',
		baseType: 'font'
	},

	initialize: function() {
		var data = this.get( 'data' );

		this.set( 'groups', new Backbone.Collection( data.groups ) );
		this.set( 'library', new wp.media.model.IconPickerFonts( data.items ) );
		this.set( 'selection', new wp.media.model.Selection( null, {
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

module.exports = IconPickerFont;

},{}],2:[function(require,module,exports){
var Library = wp.media.controller.Library,
    l10n = wp.media.view.l10n,
    models = wp.media.model,
    views = wp.media.view,
    IconPickerImg;

/**
 * wp.media.controller.IconPickerImg
 */
IconPickerImg = Library.extend({
	defaults: _.defaults({
		id:            'image',
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

module.exports = IconPickerImg;

},{}],3:[function(require,module,exports){
wp.media.model.IconPickerTarget = require( './models/target.js' );
wp.media.model.IconPickerFonts = require( './models/fonts.js' );

wp.media.controller.IconPickerFont = require( './controllers/font.js' );
wp.media.controller.IconPickerImg = require( './controllers/img.js' );

wp.media.view.IconPickerFontItem = require( './views/font-item.js' );
wp.media.view.IconPickerFontLibrary = require( './views/font-library.js' );
wp.media.view.IconPickerFontFilter = require( './views/font-filter.js' );
wp.media.view.IconPickerFontBrowser = require( './views/font-browser.js' );
wp.media.view.IconPickerFontSvgItem = require( './views/svg-item.js' );
wp.media.view.MediaFrame.IconPicker = require( './views/frame.js' );

},{"./controllers/font.js":1,"./controllers/img.js":2,"./models/fonts.js":4,"./models/target.js":5,"./views/font-browser.js":6,"./views/font-filter.js":7,"./views/font-item.js":8,"./views/font-library.js":9,"./views/frame.js":10,"./views/svg-item.js":11}],4:[function(require,module,exports){
/**
 * wp.media.model.IconPickerFonts
 */
var IconPickerFonts = Backbone.Collection.extend({
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

module.exports = IconPickerFonts;

},{}],5:[function(require,module,exports){
/**
 * wp.media.model.IconPickerTarget
 *
 * A target where the picked icon should be sent to
 *
 * @augments Backbone.Model
 */
var IconPickerTarget = Backbone.Model.extend({
	defaults: {
		type:  '',
		group: 'all',
		icon:  ''
	}
});

module.exports = IconPickerTarget;

},{}],6:[function(require,module,exports){
/**
 * wp.media.view.IconPickerFontBrowser
 */
var IconPickerFontBrowser = wp.media.View.extend({
	defaults: _.defaults({
		sidebar: false
	}, wp.media.View.prototype.defaults ),

	className: function() {
		var className = 'attachments-browser icon-picker-fonts-browser';

		if ( ! this.options.sidebar ) {
			className += ' hide-sidebar';
		}

		return className;
	},

	initialize: function() {
		this.groups = this.options.groups;

		this.createToolbar();
		this.createLibrary();
	},

	createLibrary: function() {
		this.items = new wp.media.view.IconPickerFontLibrary({
			controller: this.controller,
			collection: this.collection,
			selection:  this.options.selection,
			baseType:   this.options.baseType,
			type:       this.options.type
		});

		this.views.add( this.items );
	},

	createToolbar: function() {
		this.toolbar = new wp.media.view.Toolbar({
			controller: this.controller
		});

		this.views.add( this.toolbar );

		// Dropdown filter
		this.toolbar.set( 'filters', new wp.media.view.IconPickerFontFilter({
			controller: this.controller,
			model:      this.collection.props,
			priority:   -80
		}).render() );

		// Search field
		this.toolbar.set( 'search', new wp.media.view.Search({
			controller: this.controller,
			model:      this.collection.props,
			priority:   60
		}).render() );
	}
});

module.exports = IconPickerFontBrowser;

},{}],7:[function(require,module,exports){
/**
 * wp.media.view.IconPickerFontFilter
 */
var IconPickerFontFilter = wp.media.view.AttachmentFilters.extend({
	createFilters: function() {
		var groups  = this.controller.state().get( 'groups' ),
		    filters = {};

		filters.all = {
			text:  wp.media.view.l10n.iconPicker.allFilter,
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

module.exports = IconPickerFontFilter;

},{}],8:[function(require,module,exports){
var Attachment = wp.media.view.Attachment.Library,
    IconPickerFontItem;

/**
 * wp.media.view.IconPickerFontItem
 */
IconPickerFontItem = Attachment.extend({
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

module.exports = IconPickerFontItem;

},{}],9:[function(require,module,exports){
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
		var selected = this.options.selection.single(),
		    singleView, distance;

		if ( ! selected ) {
			return;
		}

		singleView = this.getView( selected );

		if ( singleView && ! this.isInView( singleView.$el ) ) {
			distance = (
				singleView.$el.offset().top -
				this.$el.offset().top +
				this.$el.scrollTop() -
				parseInt( this.$el.css( 'paddingTop' ), 10 )
			);

			this.$el.scrollTop( distance );
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

},{}],10:[function(require,module,exports){
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

module.exports = IconPicker;

},{}],11:[function(require,module,exports){
/**
 * wp.media.view.IconPickerSvgItem
 */
var IconPickerSvgItem = wp.media.view.Attachment.Library.extend({
	template: wp.template( 'icon-picker-svg-item' )
});

module.exports = IconPickerSvgItem;

},{}]},{},[3])
//# sourceMappingURL=data:application/json;charset:utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9ncnVudC1icm93c2VyaWZ5L25vZGVfbW9kdWxlcy9icm93c2VyaWZ5L25vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJqcy9tZWRpYS9jb250cm9sbGVycy9mb250LmpzIiwianMvbWVkaWEvY29udHJvbGxlcnMvaW1nLmpzIiwianMvbWVkaWEvbWFuaWZlc3QuanMiLCJqcy9tZWRpYS9tb2RlbHMvZm9udHMuanMiLCJqcy9tZWRpYS9tb2RlbHMvdGFyZ2V0LmpzIiwianMvbWVkaWEvdmlld3MvZm9udC1icm93c2VyLmpzIiwianMvbWVkaWEvdmlld3MvZm9udC1maWx0ZXIuanMiLCJqcy9tZWRpYS92aWV3cy9mb250LWl0ZW0uanMiLCJqcy9tZWRpYS92aWV3cy9mb250LWxpYnJhcnkuanMiLCJqcy9tZWRpYS92aWV3cy9mcmFtZS5qcyIsImpzL21lZGlhL3ZpZXdzL3N2Zy1pdGVtLmpzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0FDQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FDOUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUNqSEE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FDWkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQzFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQ2hCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQzdEQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUNqQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQ2hDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQzNGQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FDakhBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSIsImZpbGUiOiJnZW5lcmF0ZWQuanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlc0NvbnRlbnQiOlsiKGZ1bmN0aW9uIGUodCxuLHIpe2Z1bmN0aW9uIHMobyx1KXtpZighbltvXSl7aWYoIXRbb10pe3ZhciBhPXR5cGVvZiByZXF1aXJlPT1cImZ1bmN0aW9uXCImJnJlcXVpcmU7aWYoIXUmJmEpcmV0dXJuIGEobywhMCk7aWYoaSlyZXR1cm4gaShvLCEwKTt2YXIgZj1uZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiK28rXCInXCIpO3Rocm93IGYuY29kZT1cIk1PRFVMRV9OT1RfRk9VTkRcIixmfXZhciBsPW5bb109e2V4cG9ydHM6e319O3Rbb11bMF0uY2FsbChsLmV4cG9ydHMsZnVuY3Rpb24oZSl7dmFyIG49dFtvXVsxXVtlXTtyZXR1cm4gcyhuP246ZSl9LGwsbC5leHBvcnRzLGUsdCxuLHIpfXJldHVybiBuW29dLmV4cG9ydHN9dmFyIGk9dHlwZW9mIHJlcXVpcmU9PVwiZnVuY3Rpb25cIiYmcmVxdWlyZTtmb3IodmFyIG89MDtvPHIubGVuZ3RoO28rKylzKHJbb10pO3JldHVybiBzfSkiLCIvKipcbiAqIHdwLm1lZGlhLmNvbnRyb2xsZXIuSWNvblBpY2tlckZvbnRcbiAqL1xudmFyIEljb25QaWNrZXJGb250ID0gd3AubWVkaWEuY29udHJvbGxlci5TdGF0ZS5leHRlbmQoe1xuXHRkZWZhdWx0czoge1xuXHRcdG11bHRpcGxlOiBmYWxzZSxcblx0XHRtZW51OiAgICAgJ2RlZmF1bHQnLFxuXHRcdHRvb2xiYXI6ICAnc2VsZWN0Jyxcblx0XHRiYXNlVHlwZTogJ2ZvbnQnXG5cdH0sXG5cblx0aW5pdGlhbGl6ZTogZnVuY3Rpb24oKSB7XG5cdFx0dmFyIGRhdGEgPSB0aGlzLmdldCggJ2RhdGEnICk7XG5cblx0XHR0aGlzLnNldCggJ2dyb3VwcycsIG5ldyBCYWNrYm9uZS5Db2xsZWN0aW9uKCBkYXRhLmdyb3VwcyApICk7XG5cdFx0dGhpcy5zZXQoICdsaWJyYXJ5JywgbmV3IHdwLm1lZGlhLm1vZGVsLkljb25QaWNrZXJGb250cyggZGF0YS5pdGVtcyApICk7XG5cdFx0dGhpcy5zZXQoICdzZWxlY3Rpb24nLCBuZXcgd3AubWVkaWEubW9kZWwuU2VsZWN0aW9uKCBudWxsLCB7XG5cdFx0XHRtdWx0aXBsZTogdGhpcy5nZXQoICdtdWx0aXBsZScgKVxuXHRcdH0pICk7XG5cdH0sXG5cblx0YWN0aXZhdGU6IGZ1bmN0aW9uKCkge1xuXHRcdHRoaXMuZnJhbWUub24oICdvcGVuJywgdGhpcy5yZWZyZXNoLCB0aGlzICk7XG5cdFx0dGhpcy5yZWZyZXNoKCk7XG5cdH0sXG5cblx0ZGVhY3RpdmF0ZTogZnVuY3Rpb24oKSB7XG5cdFx0dGhpcy5mcmFtZS5vZmYoICdvcGVuJywgdGhpcy5yZWZyZXNoLCB0aGlzICk7XG5cdH0sXG5cblx0cmVmcmVzaDogZnVuY3Rpb24oKSB7XG5cdFx0dGhpcy5yZXNldEZpbHRlcigpO1xuXHRcdHRoaXMudXBkYXRlU2VsZWN0aW9uKCk7XG5cdH0sXG5cblx0cmVzZXRGaWx0ZXI6IGZ1bmN0aW9uKCkge1xuXHRcdHZhciBsaWJyYXJ5ID0gdGhpcy5nZXQoICdsaWJyYXJ5JyApLFxuXHRcdCAgICBncm91cHMgID0gdGhpcy5nZXQoICdncm91cHMnICksXG5cdFx0ICAgIHRhcmdldCAgPSB0aGlzLmZyYW1lLnRhcmdldCxcblx0XHQgICAgZ3JvdXBJZCA9IHRhcmdldC5nZXQoICdncm91cCcgKSxcblx0XHQgICAgZ3JvdXAgICA9IGdyb3Vwcy5maW5kV2hlcmUoeyBpZDogZ3JvdXBJZCB9KTtcblxuXHRcdGlmICggISBncm91cCApIHtcblx0XHRcdGdyb3VwSWQgPSB0YXJnZXQuZGVmYXVsdHMuZ3JvdXA7XG5cdFx0fVxuXG5cdFx0bGlicmFyeS5wcm9wcy5zZXQoICdncm91cCcsIGdyb3VwSWQgKTtcblx0fSxcblxuXHR1cGRhdGVTZWxlY3Rpb246IGZ1bmN0aW9uKCkge1xuXHRcdHZhciBzZWxlY3Rpb24gPSB0aGlzLmdldCggJ3NlbGVjdGlvbicgKSxcblx0XHQgICAgbGlicmFyeSAgID0gdGhpcy5nZXQoICdsaWJyYXJ5JyApLFxuXHRcdCAgICB0YXJnZXQgICAgPSB0aGlzLmZyYW1lLnRhcmdldCxcblx0XHQgICAgaWNvbiAgICAgID0gdGFyZ2V0LmdldCggJ2ljb24nICksXG5cdFx0ICAgIHR5cGUgICAgICA9IHRhcmdldC5nZXQoICd0eXBlJyApLFxuXHRcdCAgICBzZWxlY3RlZDtcblxuXHRcdGlmICggdGhpcy5pZCA9PT0gdHlwZSApIHtcblx0XHRcdHNlbGVjdGVkID0gbGlicmFyeS5maW5kV2hlcmUoeyBpZDogaWNvbiB9KTtcblx0XHR9XG5cblx0XHRzZWxlY3Rpb24ucmVzZXQoIHNlbGVjdGVkID8gc2VsZWN0ZWQgOiBudWxsICk7XG5cdH0sXG5cblx0Z2V0Q29udGVudFZpZXc6IGZ1bmN0aW9uKCkge1xuXHRcdHJldHVybiBuZXcgd3AubWVkaWEudmlldy5JY29uUGlja2VyRm9udEJyb3dzZXIoe1xuXHRcdFx0Y29udHJvbGxlcjogdGhpcy5mcmFtZSxcblx0XHRcdG1vZGVsOiAgICAgIHRoaXMsXG5cdFx0XHRncm91cHM6ICAgICB0aGlzLmdldCggJ2dyb3VwcycgKSxcblx0XHRcdGNvbGxlY3Rpb246IHRoaXMuZ2V0KCAnbGlicmFyeScgKSxcblx0XHRcdHNlbGVjdGlvbjogIHRoaXMuZ2V0KCAnc2VsZWN0aW9uJyApLFxuXHRcdFx0YmFzZVR5cGU6ICAgdGhpcy5nZXQoICdiYXNlVHlwZScgKSxcblx0XHRcdHR5cGU6ICAgICAgIHRoaXMuZ2V0KCAnaWQnIClcblx0XHR9KTtcblx0fVxufSk7XG5cbm1vZHVsZS5leHBvcnRzID0gSWNvblBpY2tlckZvbnQ7XG4iLCJ2YXIgTGlicmFyeSA9IHdwLm1lZGlhLmNvbnRyb2xsZXIuTGlicmFyeSxcbiAgICBsMTBuID0gd3AubWVkaWEudmlldy5sMTBuLFxuICAgIG1vZGVscyA9IHdwLm1lZGlhLm1vZGVsLFxuICAgIHZpZXdzID0gd3AubWVkaWEudmlldyxcbiAgICBJY29uUGlja2VySW1nO1xuXG4vKipcbiAqIHdwLm1lZGlhLmNvbnRyb2xsZXIuSWNvblBpY2tlckltZ1xuICovXG5JY29uUGlja2VySW1nID0gTGlicmFyeS5leHRlbmQoe1xuXHRkZWZhdWx0czogXy5kZWZhdWx0cyh7XG5cdFx0aWQ6ICAgICAgICAgICAgJ2ltYWdlJyxcblx0XHRzeW5jU2VsZWN0aW9uOiBmYWxzZVxuXHR9LCBMaWJyYXJ5LnByb3RvdHlwZS5kZWZhdWx0cyApLFxuXG5cdGluaXRpYWxpemU6IGZ1bmN0aW9uKCBvcHRpb25zICkge1xuXHRcdHZhciBzZWxlY3Rpb24gPSB0aGlzLmdldCggJ3NlbGVjdGlvbicgKTtcblxuXHRcdHRoaXMub3B0aW9ucyA9IG9wdGlvbnM7XG5cblx0XHR0aGlzLnNldCggJ2xpYnJhcnknLCB3cC5tZWRpYS5xdWVyeSh7IHR5cGU6IG9wdGlvbnMuZGF0YS5taW1lVHlwZXMgfSkgKTtcblxuXHRcdHRoaXMucm91dGVycyA9IHtcblx0XHRcdHVwbG9hZDoge1xuXHRcdFx0XHR0ZXh0OiAgICAgbDEwbi51cGxvYWRGaWxlc1RpdGxlLFxuXHRcdFx0XHRwcmlvcml0eTogMjBcblx0XHRcdH0sXG5cdFx0XHRicm93c2U6IHtcblx0XHRcdFx0dGV4dDogICAgIGwxMG4ubWVkaWFMaWJyYXJ5VGl0bGUsXG5cdFx0XHRcdHByaW9yaXR5OiA0MFxuXHRcdFx0fVxuXHRcdH07XG5cblx0XHRpZiAoICEgKCBzZWxlY3Rpb24gaW5zdGFuY2VvZiBtb2RlbHMuU2VsZWN0aW9uICkgKSB7XG5cdFx0XHR0aGlzLnNldCggJ3NlbGVjdGlvbicsIG5ldyBtb2RlbHMuU2VsZWN0aW9uKCBzZWxlY3Rpb24sIHtcblx0XHRcdFx0bXVsdGlwbGU6IGZhbHNlXG5cdFx0XHR9KSApO1xuXHRcdH1cblxuXHRcdExpYnJhcnkucHJvdG90eXBlLmluaXRpYWxpemUuYXBwbHkoIHRoaXMsIGFyZ3VtZW50cyApO1xuXHR9LFxuXG5cdGFjdGl2YXRlOiBmdW5jdGlvbigpIHtcblx0XHRMaWJyYXJ5LnByb3RvdHlwZS5hY3RpdmF0ZS5hcHBseSggdGhpcywgYXJndW1lbnRzICk7XG5cdFx0dGhpcy5nZXQoICdsaWJyYXJ5JyApLm9ic2VydmUoIHdwLlVwbG9hZGVyLnF1ZXVlICk7XG5cdFx0dGhpcy5mcmFtZS5vbiggJ29wZW4nLCB0aGlzLnVwZGF0ZVNlbGVjdGlvbiwgdGhpcyApO1xuXHRcdHRoaXMudXBkYXRlU2VsZWN0aW9uKCk7XG5cdH0sXG5cblx0ZGVhY3RpdmF0ZTogZnVuY3Rpb24oKSB7XG5cdFx0TGlicmFyeS5wcm90b3R5cGUuZGVhY3RpdmF0ZS5hcHBseSggdGhpcywgYXJndW1lbnRzICk7XG5cdFx0dGhpcy5nZXQoICdsaWJyYXJ5JyApLnVub2JzZXJ2ZSggd3AuVXBsb2FkZXIucXVldWUgKTtcblx0XHR0aGlzLmZyYW1lLm9mZiggJ29wZW4nLCB0aGlzLnVwZGF0ZVNlbGVjdGlvbiwgdGhpcyApO1xuXHR9LFxuXG5cdGdldENvbnRlbnRWaWV3OiBmdW5jdGlvbiggbW9kZSApIHtcblx0XHR2YXIgY29udGVudCA9ICggJ3VwbG9hZCcgPT09IG1vZGUgKSA/IHRoaXMudXBsb2FkQ29udGVudCgpIDogdGhpcy5icm93c2VDb250ZW50KCk7XG5cblx0XHR0aGlzLmZyYW1lLiRlbC5yZW1vdmVDbGFzcyggJ2hpZGUtdG9vbGJhcicgKTtcblxuXHRcdHJldHVybiBjb250ZW50O1xuXHR9LFxuXG5cdC8qKlxuXHQgKiBNZWRpYSBsaWJyYXJ5IGNvbnRlbnRcblx0ICpcblx0ICogVE9ETzogc2lkZWJhciB2aWV3XG5cdCAqL1xuXHRicm93c2VDb250ZW50OiBmdW5jdGlvbigpIHtcblx0XHRyZXR1cm4gbmV3IHZpZXdzLkF0dGFjaG1lbnRzQnJvd3Nlcih7XG5cdFx0XHRjb250cm9sbGVyOiAgICAgICB0aGlzLmZyYW1lLFxuXHRcdFx0Y29sbGVjdGlvbjogICAgICAgdGhpcy5nZXQoICdsaWJyYXJ5JyApLFxuXHRcdFx0c2VsZWN0aW9uOiAgICAgICAgdGhpcy5nZXQoICdzZWxlY3Rpb24nICksXG5cdFx0XHRtb2RlbDogICAgICAgICAgICB0aGlzLFxuXHRcdFx0c29ydGFibGU6ICAgICAgICAgdGhpcy5nZXQoICdzb3J0YWJsZScgKSxcblx0XHRcdHNlYXJjaDogICAgICAgICAgIHRoaXMuZ2V0KCAnc2VhcmNoYWJsZScgKSxcblx0XHRcdGZpbHRlcnM6ICAgICAgICAgIHRoaXMuZ2V0KCAnZmlsdGVyYWJsZScgKSxcblx0XHRcdHNpZGViYXI6ICAgICAgICAgIGZhbHNlLFxuXHRcdFx0ZGlzcGxheTogICAgICAgICAgZmFsc2UsXG5cdFx0XHRkcmFnSW5mbzogICAgICAgICB0aGlzLmdldCggJ2RyYWdJbmZvJyApLFxuXHRcdFx0aWRlYWxDb2x1bW5XaWR0aDogdGhpcy5nZXQoICdpZGVhbENvbHVtbldpZHRoJyApLFxuXHRcdFx0c3VnZ2VzdGVkV2lkdGg6ICAgdGhpcy5nZXQoICdzdWdnZXN0ZWRXaWR0aCcgKSxcblx0XHRcdHN1Z2dlc3RlZEhlaWdodDogIHRoaXMuZ2V0KCAnc3VnZ2VzdGVkSGVpZ2h0JyApLFxuXHRcdFx0QXR0YWNobWVudFZpZXc6ICAgKCAnc3ZnJyA9PT0gdGhpcy5pZCApID8gdmlld3MuSWNvblBpY2tlclN2Z0l0ZW0gOiB1bmRlZmluZWRcblx0XHR9KTtcblx0fSxcblxuXHQvKipcblx0ICogUmVuZGVyIGNhbGxiYWNrIGZvciB0aGUgY29udGVudCByZWdpb24gaW4gdGhlIGB1cGxvYWRgIG1vZGUuXG5cdCAqL1xuXHR1cGxvYWRDb250ZW50OiBmdW5jdGlvbigpIHtcblx0XHRyZXR1cm4gbmV3IHdwLm1lZGlhLnZpZXcuVXBsb2FkZXJJbmxpbmUoe1xuXHRcdFx0Y29udHJvbGxlcjogdGhpcy5mcmFtZVxuXHRcdH0pO1xuXHR9LFxuXG5cdHVwZGF0ZVNlbGVjdGlvbjogZnVuY3Rpb24oKSB7XG5cdFx0dmFyIHNlbGVjdGlvbiA9IHRoaXMuZ2V0KCAnc2VsZWN0aW9uJyApLFxuXHRcdCAgICB0YXJnZXQgICAgPSB0aGlzLmZyYW1lLnRhcmdldCxcblx0XHQgICAgaWNvbiAgICAgID0gdGFyZ2V0LmdldCggJ2ljb24nICksXG5cdFx0ICAgIHR5cGUgICAgICA9IHRhcmdldC5nZXQoICd0eXBlJyApLFxuXHRcdCAgICBzZWxlY3RlZDtcblxuXHRcdGlmICggdGhpcy5pZCA9PT0gdHlwZSApIHtcblx0XHRcdHNlbGVjdGVkID0gbW9kZWxzLkF0dGFjaG1lbnQuZ2V0KCBpY29uICk7XG5cdFx0XHR0aGlzLmRmZCA9IHNlbGVjdGVkLmZldGNoKCk7XG5cdFx0fVxuXG5cdFx0c2VsZWN0aW9uLnJlc2V0KCBzZWxlY3RlZCA/IHNlbGVjdGVkIDogbnVsbCApO1xuXHR9XG59KTtcblxubW9kdWxlLmV4cG9ydHMgPSBJY29uUGlja2VySW1nO1xuIiwid3AubWVkaWEubW9kZWwuSWNvblBpY2tlclRhcmdldCA9IHJlcXVpcmUoICcuL21vZGVscy90YXJnZXQuanMnICk7XG53cC5tZWRpYS5tb2RlbC5JY29uUGlja2VyRm9udHMgPSByZXF1aXJlKCAnLi9tb2RlbHMvZm9udHMuanMnICk7XG5cbndwLm1lZGlhLmNvbnRyb2xsZXIuSWNvblBpY2tlckZvbnQgPSByZXF1aXJlKCAnLi9jb250cm9sbGVycy9mb250LmpzJyApO1xud3AubWVkaWEuY29udHJvbGxlci5JY29uUGlja2VySW1nID0gcmVxdWlyZSggJy4vY29udHJvbGxlcnMvaW1nLmpzJyApO1xuXG53cC5tZWRpYS52aWV3Lkljb25QaWNrZXJGb250SXRlbSA9IHJlcXVpcmUoICcuL3ZpZXdzL2ZvbnQtaXRlbS5qcycgKTtcbndwLm1lZGlhLnZpZXcuSWNvblBpY2tlckZvbnRMaWJyYXJ5ID0gcmVxdWlyZSggJy4vdmlld3MvZm9udC1saWJyYXJ5LmpzJyApO1xud3AubWVkaWEudmlldy5JY29uUGlja2VyRm9udEZpbHRlciA9IHJlcXVpcmUoICcuL3ZpZXdzL2ZvbnQtZmlsdGVyLmpzJyApO1xud3AubWVkaWEudmlldy5JY29uUGlja2VyRm9udEJyb3dzZXIgPSByZXF1aXJlKCAnLi92aWV3cy9mb250LWJyb3dzZXIuanMnICk7XG53cC5tZWRpYS52aWV3Lkljb25QaWNrZXJGb250U3ZnSXRlbSA9IHJlcXVpcmUoICcuL3ZpZXdzL3N2Zy1pdGVtLmpzJyApO1xud3AubWVkaWEudmlldy5NZWRpYUZyYW1lLkljb25QaWNrZXIgPSByZXF1aXJlKCAnLi92aWV3cy9mcmFtZS5qcycgKTtcbiIsIi8qKlxuICogd3AubWVkaWEubW9kZWwuSWNvblBpY2tlckZvbnRzXG4gKi9cbnZhciBJY29uUGlja2VyRm9udHMgPSBCYWNrYm9uZS5Db2xsZWN0aW9uLmV4dGVuZCh7XG5cdGluaXRpYWxpemU6IGZ1bmN0aW9uKCBtb2RlbHMgKSB7XG5cdFx0dGhpcy5pdGVtcyA9IG5ldyBCYWNrYm9uZS5Db2xsZWN0aW9uKCBtb2RlbHMgKTtcblx0XHR0aGlzLnByb3BzID0gbmV3IEJhY2tib25lLk1vZGVsKHtcblx0XHRcdGdyb3VwOiAgJ2FsbCcsXG5cdFx0XHRzZWFyY2g6ICcnXG5cdFx0fSk7XG5cblx0XHR0aGlzLnByb3BzLm9uKCAnY2hhbmdlJywgdGhpcy5yZWZyZXNoLCB0aGlzICk7XG5cdH0sXG5cblx0LyoqXG5cdCAqIFJlZnJlc2ggbGlicmFyeSB3aGVuIHByb3BzIGlzIGNoYW5nZWRcblx0ICpcblx0ICogQHBhcmFtIHtCYWNrYm9uZS5Nb2RlbH0gcHJvcHNcblx0ICovXG5cdHJlZnJlc2g6IGZ1bmN0aW9uKCBwcm9wcyApIHtcblx0XHR2YXIgbGlicmFyeSA9IHRoaXMsXG5cdFx0ICAgIGl0ZW1zICAgPSB0aGlzLml0ZW1zLnRvSlNPTigpO1xuXG5cdFx0Xy5lYWNoKCBwcm9wcy50b0pTT04oKSwgZnVuY3Rpb24oIHZhbHVlLCBmaWx0ZXIgKSB7XG5cdFx0XHRpZiAoIGxpYnJhcnkuZmlsdGVyc1sgZmlsdGVyIF0gKSB7XG5cdFx0XHRcdGl0ZW1zID0gXy5maWx0ZXIoIGl0ZW1zLCBfLmJpbmQoIGxpYnJhcnkuZmlsdGVyc1sgZmlsdGVyIF0sIHRoaXMgKSwgdmFsdWUgKTtcblx0XHRcdH1cblx0XHR9LCB0aGlzICk7XG5cblx0XHR0aGlzLnJlc2V0KCBpdGVtcyApO1xuXHR9LFxuXHRmaWx0ZXJzOiB7XG5cdFx0LyoqXG5cdFx0ICogQHN0YXRpY1xuXHRcdCAqIEBwYXJhbSB7b2JqZWN0fSBpdGVtXG5cdFx0ICpcblx0XHQgKiBAdGhpcyB3cC5tZWRpYS5tb2RlbC5JY29uUGlja2VyRm9udHNcblx0XHQgKlxuXHRcdCAqIEByZXR1cm5zIHtCb29sZWFufVxuXHRcdCAqL1xuXHRcdGdyb3VwOiBmdW5jdGlvbiggaXRlbSApIHtcblx0XHRcdHZhciBncm91cElkID0gdGhpcy5wcm9wcy5nZXQoICdncm91cCcgKTtcblxuXHRcdFx0cmV0dXJuICggJ2FsbCcgPT09IGdyb3VwSWQgfHwgaXRlbS5ncm91cCA9PT0gZ3JvdXBJZCB8fCAnJyA9PT0gaXRlbS5ncm91cCApO1xuXHRcdH0sXG5cblx0XHQvKipcblx0XHQgKiBAc3RhdGljXG5cdFx0ICogQHBhcmFtIHtvYmplY3R9IGl0ZW1cblx0XHQgKlxuXHRcdCAqIEB0aGlzIHdwLm1lZGlhLm1vZGVsLkljb25QaWNrZXJGb250c1xuXHRcdCAqXG5cdFx0ICogQHJldHVybnMge0Jvb2xlYW59XG5cdFx0ICovXG5cdFx0c2VhcmNoOiBmdW5jdGlvbiggaXRlbSApIHtcblx0XHRcdHZhciB0ZXJtID0gdGhpcy5wcm9wcy5nZXQoICdzZWFyY2gnICksXG5cdFx0XHQgICAgcmVzdWx0O1xuXG5cdFx0XHRpZiAoICcnID09PSB0ZXJtICkge1xuXHRcdFx0XHRyZXN1bHQgPSB0cnVlO1xuXHRcdFx0fSBlbHNlIHtcblx0XHRcdFx0cmVzdWx0ID0gXy5hbnkoIFsgJ2lkJywgJ25hbWUnIF0sIGZ1bmN0aW9uKCBrZXkgKSB7XG5cdFx0XHRcdFx0dmFyIHZhbHVlID0gaXRlbVsga2V5IF07XG5cblx0XHRcdFx0XHRyZXR1cm4gdmFsdWUgJiYgLTEgIT09IHZhbHVlLnNlYXJjaCggdGhpcyApO1xuXHRcdFx0XHR9LCB0ZXJtICk7XG5cdFx0XHR9XG5cblx0XHRcdHJldHVybiByZXN1bHQ7XG5cdFx0fVxuXHR9XG59KTtcblxubW9kdWxlLmV4cG9ydHMgPSBJY29uUGlja2VyRm9udHM7XG4iLCIvKipcbiAqIHdwLm1lZGlhLm1vZGVsLkljb25QaWNrZXJUYXJnZXRcbiAqXG4gKiBBIHRhcmdldCB3aGVyZSB0aGUgcGlja2VkIGljb24gc2hvdWxkIGJlIHNlbnQgdG9cbiAqXG4gKiBAYXVnbWVudHMgQmFja2JvbmUuTW9kZWxcbiAqL1xudmFyIEljb25QaWNrZXJUYXJnZXQgPSBCYWNrYm9uZS5Nb2RlbC5leHRlbmQoe1xuXHRkZWZhdWx0czoge1xuXHRcdHR5cGU6ICAnJyxcblx0XHRncm91cDogJ2FsbCcsXG5cdFx0aWNvbjogICcnXG5cdH1cbn0pO1xuXG5tb2R1bGUuZXhwb3J0cyA9IEljb25QaWNrZXJUYXJnZXQ7XG4iLCIvKipcbiAqIHdwLm1lZGlhLnZpZXcuSWNvblBpY2tlckZvbnRCcm93c2VyXG4gKi9cbnZhciBJY29uUGlja2VyRm9udEJyb3dzZXIgPSB3cC5tZWRpYS5WaWV3LmV4dGVuZCh7XG5cdGRlZmF1bHRzOiBfLmRlZmF1bHRzKHtcblx0XHRzaWRlYmFyOiBmYWxzZVxuXHR9LCB3cC5tZWRpYS5WaWV3LnByb3RvdHlwZS5kZWZhdWx0cyApLFxuXG5cdGNsYXNzTmFtZTogZnVuY3Rpb24oKSB7XG5cdFx0dmFyIGNsYXNzTmFtZSA9ICdhdHRhY2htZW50cy1icm93c2VyIGljb24tcGlja2VyLWZvbnRzLWJyb3dzZXInO1xuXG5cdFx0aWYgKCAhIHRoaXMub3B0aW9ucy5zaWRlYmFyICkge1xuXHRcdFx0Y2xhc3NOYW1lICs9ICcgaGlkZS1zaWRlYmFyJztcblx0XHR9XG5cblx0XHRyZXR1cm4gY2xhc3NOYW1lO1xuXHR9LFxuXG5cdGluaXRpYWxpemU6IGZ1bmN0aW9uKCkge1xuXHRcdHRoaXMuZ3JvdXBzID0gdGhpcy5vcHRpb25zLmdyb3VwcztcblxuXHRcdHRoaXMuY3JlYXRlVG9vbGJhcigpO1xuXHRcdHRoaXMuY3JlYXRlTGlicmFyeSgpO1xuXHR9LFxuXG5cdGNyZWF0ZUxpYnJhcnk6IGZ1bmN0aW9uKCkge1xuXHRcdHRoaXMuaXRlbXMgPSBuZXcgd3AubWVkaWEudmlldy5JY29uUGlja2VyRm9udExpYnJhcnkoe1xuXHRcdFx0Y29udHJvbGxlcjogdGhpcy5jb250cm9sbGVyLFxuXHRcdFx0Y29sbGVjdGlvbjogdGhpcy5jb2xsZWN0aW9uLFxuXHRcdFx0c2VsZWN0aW9uOiAgdGhpcy5vcHRpb25zLnNlbGVjdGlvbixcblx0XHRcdGJhc2VUeXBlOiAgIHRoaXMub3B0aW9ucy5iYXNlVHlwZSxcblx0XHRcdHR5cGU6ICAgICAgIHRoaXMub3B0aW9ucy50eXBlXG5cdFx0fSk7XG5cblx0XHR0aGlzLnZpZXdzLmFkZCggdGhpcy5pdGVtcyApO1xuXHR9LFxuXG5cdGNyZWF0ZVRvb2xiYXI6IGZ1bmN0aW9uKCkge1xuXHRcdHRoaXMudG9vbGJhciA9IG5ldyB3cC5tZWRpYS52aWV3LlRvb2xiYXIoe1xuXHRcdFx0Y29udHJvbGxlcjogdGhpcy5jb250cm9sbGVyXG5cdFx0fSk7XG5cblx0XHR0aGlzLnZpZXdzLmFkZCggdGhpcy50b29sYmFyICk7XG5cblx0XHQvLyBEcm9wZG93biBmaWx0ZXJcblx0XHR0aGlzLnRvb2xiYXIuc2V0KCAnZmlsdGVycycsIG5ldyB3cC5tZWRpYS52aWV3Lkljb25QaWNrZXJGb250RmlsdGVyKHtcblx0XHRcdGNvbnRyb2xsZXI6IHRoaXMuY29udHJvbGxlcixcblx0XHRcdG1vZGVsOiAgICAgIHRoaXMuY29sbGVjdGlvbi5wcm9wcyxcblx0XHRcdHByaW9yaXR5OiAgIC04MFxuXHRcdH0pLnJlbmRlcigpICk7XG5cblx0XHQvLyBTZWFyY2ggZmllbGRcblx0XHR0aGlzLnRvb2xiYXIuc2V0KCAnc2VhcmNoJywgbmV3IHdwLm1lZGlhLnZpZXcuU2VhcmNoKHtcblx0XHRcdGNvbnRyb2xsZXI6IHRoaXMuY29udHJvbGxlcixcblx0XHRcdG1vZGVsOiAgICAgIHRoaXMuY29sbGVjdGlvbi5wcm9wcyxcblx0XHRcdHByaW9yaXR5OiAgIDYwXG5cdFx0fSkucmVuZGVyKCkgKTtcblx0fVxufSk7XG5cbm1vZHVsZS5leHBvcnRzID0gSWNvblBpY2tlckZvbnRCcm93c2VyO1xuIiwiLyoqXG4gKiB3cC5tZWRpYS52aWV3Lkljb25QaWNrZXJGb250RmlsdGVyXG4gKi9cbnZhciBJY29uUGlja2VyRm9udEZpbHRlciA9IHdwLm1lZGlhLnZpZXcuQXR0YWNobWVudEZpbHRlcnMuZXh0ZW5kKHtcblx0Y3JlYXRlRmlsdGVyczogZnVuY3Rpb24oKSB7XG5cdFx0dmFyIGdyb3VwcyAgPSB0aGlzLmNvbnRyb2xsZXIuc3RhdGUoKS5nZXQoICdncm91cHMnICksXG5cdFx0ICAgIGZpbHRlcnMgPSB7fTtcblxuXHRcdGZpbHRlcnMuYWxsID0ge1xuXHRcdFx0dGV4dDogIHdwLm1lZGlhLnZpZXcubDEwbi5pY29uUGlja2VyLmFsbEZpbHRlcixcblx0XHRcdHByb3BzOiB7IGdyb3VwOiAnYWxsJyB9XG5cdFx0fTtcblxuXHRcdGdyb3Vwcy5lYWNoKCBmdW5jdGlvbiggZ3JvdXAgKSB7XG5cdFx0XHRmaWx0ZXJzWyBncm91cC5pZCBdID0ge1xuXHRcdFx0XHR0ZXh0OiAgZ3JvdXAuZ2V0KCAnbmFtZScgKSxcblx0XHRcdFx0cHJvcHM6IHsgZ3JvdXA6IGdyb3VwLmlkIH1cblx0XHRcdH07XG5cdFx0fSk7XG5cblx0XHR0aGlzLmZpbHRlcnMgPSBmaWx0ZXJzO1xuXHR9LFxuXG5cdGNoYW5nZTogZnVuY3Rpb24oKSB7XG5cdFx0dmFyIGZpbHRlciA9IHRoaXMuZmlsdGVyc1sgdGhpcy5lbC52YWx1ZSBdO1xuXG5cdFx0aWYgKCBmaWx0ZXIgKSB7XG5cdFx0XHR0aGlzLm1vZGVsLnNldCggJ2dyb3VwJywgZmlsdGVyLnByb3BzLmdyb3VwICk7XG5cdFx0fVxuXHR9XG59KTtcblxubW9kdWxlLmV4cG9ydHMgPSBJY29uUGlja2VyRm9udEZpbHRlcjtcbiIsInZhciBBdHRhY2htZW50ID0gd3AubWVkaWEudmlldy5BdHRhY2htZW50LkxpYnJhcnksXG4gICAgSWNvblBpY2tlckZvbnRJdGVtO1xuXG4vKipcbiAqIHdwLm1lZGlhLnZpZXcuSWNvblBpY2tlckZvbnRJdGVtXG4gKi9cbkljb25QaWNrZXJGb250SXRlbSA9IEF0dGFjaG1lbnQuZXh0ZW5kKHtcblx0Y2xhc3NOYW1lOiAnYXR0YWNobWVudCBpY29uLXBpY2tlci1pdGVtJyxcblx0ZXZlbnRzOiAgICB7XG5cdFx0J2NsaWNrIC5hdHRhY2htZW50LXByZXZpZXcnOiAndG9nZ2xlU2VsZWN0aW9uSGFuZGxlcicsXG5cdFx0J2NsaWNrIGEnOiAgICAgICAgICAgICAgICAgICAncHJldmVudERlZmF1bHQnXG5cdH0sXG5cblx0aW5pdGlhbGl6ZTogZnVuY3Rpb24oKSB7XG5cdFx0dGhpcy50ZW1wbGF0ZSA9IHdwLm1lZGlhLnRlbXBsYXRlKCAnaWNvbi1waWNrZXItJyArIHRoaXMub3B0aW9ucy5iYXNlVHlwZSArICctaXRlbScgKTtcblx0XHRBdHRhY2htZW50LnByb3RvdHlwZS5pbml0aWFsaXplLmFwcGx5KCB0aGlzLCBhcmd1bWVudHMgKTtcblx0fSxcblxuXHRyZW5kZXI6IGZ1bmN0aW9uKCkge1xuXHRcdHZhciBvcHRpb25zID0gXy5kZWZhdWx0cyggdGhpcy5tb2RlbC50b0pTT04oKSwge1xuXHRcdFx0YmFzZVR5cGU6IHRoaXMub3B0aW9ucy5iYXNlVHlwZSxcblx0XHRcdHR5cGU6ICAgICB0aGlzLm9wdGlvbnMudHlwZVxuXHRcdH0pO1xuXG5cdFx0dGhpcy4kZWwuaHRtbCggdGhpcy50ZW1wbGF0ZSggb3B0aW9ucyApICk7XG5cdFx0dGhpcy51cGRhdGVTZWxlY3QoKTtcblxuXHRcdHJldHVybiB0aGlzO1xuXHR9XG59KTtcblxubW9kdWxlLmV4cG9ydHMgPSBJY29uUGlja2VyRm9udEl0ZW07XG4iLCIvKipcbiAqIHdwLm1lZGlhLnZpZXcuSWNvblBpY2tlckZvbnRMaWJyYXJ5XG4gKi9cbnZhciBJY29uUGlja2VyRm9udExpYnJhcnkgPSB3cC5tZWRpYS5WaWV3LmV4dGVuZCh7XG5cdHRhZ05hbWU6ICAgJ3VsJyxcblx0Y2xhc3NOYW1lOiAnYXR0YWNobWVudHMgaWNvbi1waWNrZXItaXRlbXMgY2xlYXJmaXgnLFxuXG5cdGluaXRpYWxpemU6IGZ1bmN0aW9uKCkge1xuXHRcdHRoaXMuX3ZpZXdzQnlDaWQgPSB7fTtcblxuXHRcdHRoaXMuY29sbGVjdGlvbi5vbiggJ3Jlc2V0JywgdGhpcy5yZWZyZXNoLCB0aGlzICk7XG5cdFx0dGhpcy5jb250cm9sbGVyLm9uKCAnb3BlbicsIHRoaXMuc2Nyb2xsVG9TZWxlY3RlZCwgdGhpcyApO1xuXHR9LFxuXG5cdHJlbmRlcjogZnVuY3Rpb24oKSB7XG5cdFx0dGhpcy5jb2xsZWN0aW9uLmVhY2goIGZ1bmN0aW9uKCBtb2RlbCApIHtcblx0XHRcdHRoaXMudmlld3MuYWRkKCB0aGlzLnJlbmRlckl0ZW0oIG1vZGVsICksIHtcblx0XHRcdFx0YXQ6IHRoaXMuY29sbGVjdGlvbi5pbmRleE9mKCBtb2RlbCApXG5cdFx0XHR9ICk7XG5cdFx0fSwgdGhpcyApO1xuXG5cdFx0cmV0dXJuIHRoaXM7XG5cdH0sXG5cblx0cmVuZGVySXRlbTogZnVuY3Rpb24oIG1vZGVsICkge1xuXHRcdHZhciB2aWV3ID0gbmV3IHdwLm1lZGlhLnZpZXcuSWNvblBpY2tlckZvbnRJdGVtKHtcblx0XHRcdGNvbnRyb2xsZXI6IHRoaXMuY29udHJvbGxlcixcblx0XHRcdG1vZGVsOiAgICAgIG1vZGVsLFxuXHRcdFx0Y29sbGVjdGlvbjogdGhpcy5jb2xsZWN0aW9uLFxuXHRcdFx0c2VsZWN0aW9uOiAgdGhpcy5vcHRpb25zLnNlbGVjdGlvbixcblx0XHRcdGJhc2VUeXBlOiAgIHRoaXMub3B0aW9ucy5iYXNlVHlwZSxcblx0XHRcdHR5cGU6ICAgICAgIHRoaXMub3B0aW9ucy50eXBlXG5cdFx0fSk7XG5cblx0XHRyZXR1cm4gdGhpcy5fdmlld3NCeUNpZFsgdmlldy5jaWQgXSA9IHZpZXc7XG5cdH0sXG5cblx0Y2xlYXJJdGVtczogZnVuY3Rpb24oKSB7XG5cdFx0Xy5lYWNoKCB0aGlzLl92aWV3c0J5Q2lkLCBmdW5jdGlvbiggdmlldyApIHtcblx0XHRcdGRlbGV0ZSB0aGlzLl92aWV3c0J5Q2lkWyB2aWV3LmNpZCBdO1xuXHRcdFx0dmlldy5yZW1vdmUoKTtcblx0XHR9LCB0aGlzICk7XG5cdH0sXG5cblx0cmVmcmVzaDogZnVuY3Rpb24oKSB7XG5cdFx0dGhpcy5jbGVhckl0ZW1zKCk7XG5cdFx0dGhpcy5yZW5kZXIoKTtcblx0fSxcblxuXHRyZWFkeTogZnVuY3Rpb24oKSB7XG5cdFx0dGhpcy5zY3JvbGxUb1NlbGVjdGVkKCk7XG5cdH0sXG5cblx0c2Nyb2xsVG9TZWxlY3RlZDogZnVuY3Rpb24oKSB7XG5cdFx0dmFyIHNlbGVjdGVkID0gdGhpcy5vcHRpb25zLnNlbGVjdGlvbi5zaW5nbGUoKSxcblx0XHQgICAgc2luZ2xlVmlldywgZGlzdGFuY2U7XG5cblx0XHRpZiAoICEgc2VsZWN0ZWQgKSB7XG5cdFx0XHRyZXR1cm47XG5cdFx0fVxuXG5cdFx0c2luZ2xlVmlldyA9IHRoaXMuZ2V0Vmlldyggc2VsZWN0ZWQgKTtcblxuXHRcdGlmICggc2luZ2xlVmlldyAmJiAhIHRoaXMuaXNJblZpZXcoIHNpbmdsZVZpZXcuJGVsICkgKSB7XG5cdFx0XHRkaXN0YW5jZSA9IChcblx0XHRcdFx0c2luZ2xlVmlldy4kZWwub2Zmc2V0KCkudG9wIC1cblx0XHRcdFx0dGhpcy4kZWwub2Zmc2V0KCkudG9wICtcblx0XHRcdFx0dGhpcy4kZWwuc2Nyb2xsVG9wKCkgLVxuXHRcdFx0XHRwYXJzZUludCggdGhpcy4kZWwuY3NzKCAncGFkZGluZ1RvcCcgKSwgMTAgKVxuXHRcdFx0KTtcblxuXHRcdFx0dGhpcy4kZWwuc2Nyb2xsVG9wKCBkaXN0YW5jZSApO1xuXHRcdH1cblx0fSxcblxuXHRnZXRWaWV3OiBmdW5jdGlvbiggbW9kZWwgKSB7XG5cdFx0cmV0dXJuIF8uZmluZFdoZXJlKCB0aGlzLl92aWV3c0J5Q2lkLCB7IG1vZGVsOiBtb2RlbCB9ICk7XG5cdH0sXG5cblx0aXNJblZpZXc6IGZ1bmN0aW9uKCAkZWxlbSApIHtcblx0XHR2YXIgJHdpbmRvdyAgICAgICA9IGpRdWVyeSggd2luZG93ICksXG5cdFx0ICAgIGRvY1ZpZXdUb3AgICAgPSAkd2luZG93LnNjcm9sbFRvcCgpLFxuXHRcdCAgICBkb2NWaWV3Qm90dG9tID0gZG9jVmlld1RvcCArICR3aW5kb3cuaGVpZ2h0KCksXG5cdFx0ICAgIGVsZW1Ub3AgICAgICAgPSAkZWxlbS5vZmZzZXQoKS50b3AsXG5cdFx0ICAgIGVsZW1Cb3R0b20gICAgPSBlbGVtVG9wICsgJGVsZW0uaGVpZ2h0KCk7XG5cblx0XHRyZXR1cm4gKCAoIGVsZW1Cb3R0b20gPD0gZG9jVmlld0JvdHRvbSApICYmICggZWxlbVRvcCA+PSBkb2NWaWV3VG9wICkgKTtcblx0fVxufSk7XG5cbm1vZHVsZS5leHBvcnRzID0gSWNvblBpY2tlckZvbnRMaWJyYXJ5O1xuIiwiLyoqXG4gKiB3cC5tZWRpYS52aWV3Lk1lZGlhRnJhbWUuSWNvblBpY2tlclxuICpcbiAqIEEgZnJhbWUgZm9yIHNlbGVjdGluZyBhbiBpY29uLlxuICpcbiAqIEBjbGFzc1xuICogQGF1Z21lbnRzIHdwLm1lZGlhLnZpZXcuTWVkaWFGcmFtZS5TZWxlY3RcbiAqIEBhdWdtZW50cyB3cC5tZWRpYS52aWV3Lk1lZGlhRnJhbWVcbiAqIEBhdWdtZW50cyB3cC5tZWRpYS52aWV3LkZyYW1lXG4gKiBAYXVnbWVudHMgd3AubWVkaWEuVmlld1xuICogQGF1Z21lbnRzIHdwLkJhY2tib25lLlZpZXdcbiAqIEBhdWdtZW50cyBCYWNrYm9uZS5WaWV3XG4gKiBAbWl4ZXMgd3AubWVkaWEuY29udHJvbGxlci5TdGF0ZU1hY2hpbmVcbiAqL1xuXG52YXIgbDEwbiA9IHdwLm1lZGlhLnZpZXcubDEwbixcbiAgICBTZWxlY3QgPSB3cC5tZWRpYS52aWV3Lk1lZGlhRnJhbWUuU2VsZWN0LFxuXHRJY29uUGlja2VyO1xuXG5JY29uUGlja2VyID0gU2VsZWN0LmV4dGVuZCh7XG5cdGluaXRpYWxpemU6IGZ1bmN0aW9uKCkge1xuXHRcdF8uZGVmYXVsdHMoIHRoaXMub3B0aW9ucywge1xuXHRcdFx0dGl0bGU6ICAgIGwxMG4uaWNvblBpY2tlci5mcmFtZVRpdGxlLFxuXHRcdFx0bXVsdGlwbGU6IGZhbHNlLFxuXHRcdFx0aXBUeXBlczogIGljb25QaWNrZXIudHlwZXMsXG5cdFx0XHR0YXJnZXQ6ICAgbnVsbFxuXHRcdH0pO1xuXG5cdFx0aWYgKCB0aGlzLm9wdGlvbnMudGFyZ2V0IGluc3RhbmNlb2Ygd3AubWVkaWEubW9kZWwuSWNvblBpY2tlclRhcmdldCApIHtcblx0XHRcdHRoaXMudGFyZ2V0ID0gdGhpcy5vcHRpb25zLnRhcmdldDtcblx0XHR9IGVsc2Uge1xuXHRcdFx0dGhpcy50YXJnZXQgPSBuZXcgd3AubWVkaWEubW9kZWwuSWNvblBpY2tlclRhcmdldCgpO1xuXHRcdH1cblxuXHRcdFNlbGVjdC5wcm90b3R5cGUuaW5pdGlhbGl6ZS5hcHBseSggdGhpcywgYXJndW1lbnRzICk7XG5cdH0sXG5cblx0Y3JlYXRlU3RhdGVzOiBmdW5jdGlvbigpIHtcblx0XHR2YXIgQ29udHJvbGxlcjtcblxuXHRcdF8uZWFjaCggdGhpcy5vcHRpb25zLmlwVHlwZXMsIGZ1bmN0aW9uKCBwcm9wcyApIHtcblx0XHRcdGlmICggISB3cC5tZWRpYS5jb250cm9sbGVyLmhhc093blByb3BlcnR5KCAnSWNvblBpY2tlcicgKyBwcm9wcy5jb250cm9sbGVyICkgKSB7XG5cdFx0XHRcdHJldHVybjtcblx0XHRcdH1cblxuXHRcdFx0Q29udHJvbGxlciA9IHdwLm1lZGlhLmNvbnRyb2xsZXJbICdJY29uUGlja2VyJyArIHByb3BzLmNvbnRyb2xsZXIgXTtcblxuXHRcdFx0dGhpcy5zdGF0ZXMuYWRkKCBuZXcgQ29udHJvbGxlcih7XG5cdFx0XHRcdGlkOiAgICAgIHByb3BzLmlkLFxuXHRcdFx0XHRjb250ZW50OiBwcm9wcy5pZCxcblx0XHRcdFx0dGl0bGU6ICAgcHJvcHMubmFtZSxcblx0XHRcdFx0ZGF0YTogICAgcHJvcHMuZGF0YVxuXHRcdFx0fSkgKTtcblx0XHR9LCB0aGlzICk7XG5cdH0sXG5cblx0LyoqXG5cdCAqIEJpbmQgcmVnaW9uIG1vZGUgZXZlbnQgY2FsbGJhY2tzLlxuXHQgKi9cblx0YmluZEhhbmRsZXJzOiBmdW5jdGlvbigpIHtcblx0XHR0aGlzLm9uKCAncm91dGVyOmNyZWF0ZTpicm93c2UnLCB0aGlzLmNyZWF0ZVJvdXRlciwgdGhpcyApO1xuXHRcdHRoaXMub24oICdyb3V0ZXI6cmVuZGVyOmJyb3dzZScsIHRoaXMuYnJvd3NlUm91dGVyLCB0aGlzICk7XG5cdFx0dGhpcy5vbiggJ2NvbnRlbnQ6cmVuZGVyJywgdGhpcy5pcFJlbmRlckNvbnRlbnQsIHRoaXMgKTtcblx0XHR0aGlzLm9uKCAndG9vbGJhcjpjcmVhdGU6c2VsZWN0JywgdGhpcy5jcmVhdGVTZWxlY3RUb29sYmFyLCB0aGlzICk7XG5cdFx0dGhpcy5vbiggJ29wZW4nLCB0aGlzLl9pcFNldFN0YXRlLCB0aGlzICk7XG5cdFx0dGhpcy5vbiggJ3NlbGVjdCcsIHRoaXMuX2lwVXBkYXRlVGFyZ2V0LCB0aGlzICk7XG5cdH0sXG5cblx0LyoqXG5cdCAqIFNldCBzdGF0ZSBiYXNlZCBvbiB0aGUgdGFyZ2V0J3MgaWNvbiB0eXBlXG5cdCAqL1xuXHRfaXBTZXRTdGF0ZTogZnVuY3Rpb24oKSB7XG5cdFx0dmFyIHN0YXRlSWQgPSB0aGlzLnRhcmdldC5nZXQoICd0eXBlJyApO1xuXG5cdFx0aWYgKCAhIHN0YXRlSWQgfHwgISB0aGlzLnN0YXRlcy5maW5kV2hlcmUoIHsgaWQ6IHN0YXRlSWQgfSApICkge1xuXHRcdFx0c3RhdGVJZCA9IHRoaXMuc3RhdGVzLmF0KCAwICkuaWQ7XG5cdFx0fVxuXG5cdFx0dGhpcy5zZXRTdGF0ZSggc3RhdGVJZCApO1xuXHR9LFxuXG5cdC8qKlxuXHQgKiBVcGRhdGUgdGFyZ2V0J3MgYXR0cmlidXRlcyBhZnRlciBzZWxlY3RpbmcgYW4gaWNvblxuXHQgKi9cblx0X2lwVXBkYXRlVGFyZ2V0OiBmdW5jdGlvbigpIHtcblx0XHR2YXIgc3RhdGUgPSB0aGlzLnN0YXRlKCksXG5cdFx0ICAgIHNlbGVjdGlvbiA9IHRoaXMuc3RhdGUoKS5nZXQoICdzZWxlY3Rpb24nICkuc2luZ2xlKCk7XG5cblx0XHR0aGlzLnRhcmdldC5zZXQoe1xuXHRcdFx0dHlwZTogIHN0YXRlLmlkLFxuXHRcdFx0aWNvbjogIHNlbGVjdGlvbi5nZXQoICdpZCcgKSxcblx0XHRcdGdyb3VwOiBzZWxlY3Rpb24uZ2V0KCAnZ3JvdXAnIClcblx0XHR9KTtcblx0fSxcblxuXHRicm93c2VSb3V0ZXI6IGZ1bmN0aW9uKCByb3V0ZXJWaWV3ICkge1xuXHRcdHZhciByb3V0ZXJzID0gdGhpcy5zdGF0ZSgpLnJvdXRlcnM7XG5cblx0XHRpZiAoIHJvdXRlcnMgKSB7XG5cdFx0XHRyb3V0ZXJWaWV3LnNldCggcm91dGVycyApO1xuXHRcdH1cblx0fSxcblxuXHRpcFJlbmRlckNvbnRlbnQ6IGZ1bmN0aW9uKCkge1xuXHRcdHZhciBzdGF0ZSAgID0gdGhpcy5zdGF0ZSgpLFxuXHRcdCAgICBtb2RlICAgID0gdGhpcy5jb250ZW50Lm1vZGUoKSxcblx0XHQgICAgY29udGVudCA9IHN0YXRlLmdldENvbnRlbnRWaWV3KCBtb2RlICk7XG5cblx0XHR0aGlzLmNvbnRlbnQuc2V0KCBjb250ZW50ICk7XG5cdH1cbn0pO1xuXG5tb2R1bGUuZXhwb3J0cyA9IEljb25QaWNrZXI7XG4iLCIvKipcbiAqIHdwLm1lZGlhLnZpZXcuSWNvblBpY2tlclN2Z0l0ZW1cbiAqL1xudmFyIEljb25QaWNrZXJTdmdJdGVtID0gd3AubWVkaWEudmlldy5BdHRhY2htZW50LkxpYnJhcnkuZXh0ZW5kKHtcblx0dGVtcGxhdGU6IHdwLnRlbXBsYXRlKCAnaWNvbi1waWNrZXItc3ZnLWl0ZW0nIClcbn0pO1xuXG5tb2R1bGUuZXhwb3J0cyA9IEljb25QaWNrZXJTdmdJdGVtO1xuIl19
