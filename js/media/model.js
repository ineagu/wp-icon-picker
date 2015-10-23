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
