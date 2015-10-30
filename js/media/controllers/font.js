/**
 * wp.media.controller.IconPickerFont
 */
var IconPickerFont = wp.media.controller.State.extend( _.extend({
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
		return new wp.media.view.IconPickerFontBrowser( _.extend({
			controller: this.frame,
			model:      this,
			groups:     this.get( 'groups' ),
			collection: this.get( 'library' ),
			selection:  this.get( 'selection' ),
			baseType:   this.get( 'baseType' ),
			type:       this.get( 'id' )
		}, this.ipGetSidebarOptions() ) );
	}
}, wp.media.controller.IconPickerState ) );

module.exports = IconPickerFont;
