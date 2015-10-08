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

	ipRenderContent: function() {
		var state   = this.state(),
		    content = state.getContentView();

		this.content.set( content );
	}
});

wp.media.view.MediaFrame.IconPicker = IconPicker;

}( jQuery, _ ) );
