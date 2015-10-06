/* globals wp: false */

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
	props: new Backbone.Model({
		group:  'all',
		search: ''
	}),

	filters: {
		group: function( item ) {
			var group = this;

			return ( 'all' === group || item.group === group || '' === item.group );
		},

		search: function( item ) {
			var term = this,
			    result;

			if ( '' === term ) {
				result = true;
			} else {
				result = _.any( [ 'id', 'label' ], function( key ) {
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
