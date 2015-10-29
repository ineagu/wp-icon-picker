/**
 * wp.media.view.IconPickerFontBrowser
 */
var IconPickerFontBrowser = wp.media.View.extend({
	defaults: {
		sidebar: false
	},

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
