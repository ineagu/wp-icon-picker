/* globals wp: false, iconPicker: false */

(function( $, _ ) {
var l10n = wp.media.view.l10n;

wp.media.frames.iconPicker = new wp.media.view.MediaFrame.IconPicker({
	title:    l10n.iconPicker.frameTitle,
	multiple: false,
	ipTypes:  iconPicker.types
});

}( jQuery, _ ) );
