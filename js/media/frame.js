/* globals wp: false */

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

var Select = wp.media.view.MediaFrame.Select,
	IconPicker;

IconPicker = Select.extend({
	initialize: function() {
		this.target = new wp.media.model.IconPickerTarget();

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
				groups:  props.groups,
				library: props.items
			}) );

			this.on( 'content:render:' + props.id, this.ipRenderContent, this );
		}, this );
	},

	/**
	 * Bind region mode event callbacks.
	 */
	bindHandlers: function() {
		this.on( 'toolbar:create:select', this.createSelectToolbar, this );
		this.on( 'open', this._ipSetState, this );
	},

	/**
	 * Set state based on the target's icon type
	 *
	 * TODO: Check target's icon type before defaulting to the first available state.
	 */
	_ipSetState: function() {
		var state = this.states.at( 0 ).id;

		this.setState( state );
	},

	ipRenderContent: function() {
		var state   = this.state(),
		    content = state.getContentView();

		this.content.set( content );
	}
});

wp.media.view.MediaFrame.IconPicker = IconPicker;

}( jQuery, _ ) );
