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
