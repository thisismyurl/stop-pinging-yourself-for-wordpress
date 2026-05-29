<?php
/**
 * Plugin Name:       Stop Pinging Yourself for WordPress
 * Plugin URI:        https://thisismyurl.com/plugins/stop-pinging-yourself-for-wordpress/
 * Description:       Prevents WordPress from sending self-referential pingbacks — stops the site from pinging itself when publishing posts that link to other posts on the same domain.
 * Version:           16.6148.2110
 * Requires at least: 6.4
 * Requires PHP:      8.0
 * Author:            Christopher Ross
 * Author URI:        https://thisismyurl.com/
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       stop-pinging-yourself-for-wordpress
 *
 * @package ThisIsMyURL\StopPingingYourself
 */

declare( strict_types=1 );

namespace ThisIsMyURL\StopPingingYourself;

defined( 'ABSPATH' ) || exit;

const VERSION = '16.6147';

/**
 * Remove any pingback links that point back to the current site.
 *
 * WordPress collects outbound pingback candidates before publishing; this
 * hook receives that array by reference and strips any URL whose prefix
 * matches the site home URL. The result: the site never pings itself.
 *
 * @param string[] $links Array of URLs about to receive pingbacks (by reference).
 * @return void
 */
function remove_self_pings( array &$links ): void {
	$home = home_url();

	foreach ( $links as $key => $link ) {
		if ( str_starts_with( $link, $home ) ) {
			unset( $links[ $key ] );
		}
	}
}
add_action( 'pre_ping', __NAMESPACE__ . '\\remove_self_pings' );
