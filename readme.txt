=== Stop Pinging Yourself for WordPress ===
Contributors: thisismyurl
Plugin URI: https://thisismyurl.com/plugins/stop-pinging-yourself-for-wordpress/
Tags: pingback, pings, comments, cleanup
Requires at least: 6.4
Tested up to: 7.0
Requires PHP: 8.0
Stable tag: 16.6148.2110
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Stops a WordPress site from sending pingbacks to itself.

== Description ==


Stop Pinging Yourself for WordPress removes self-referential URLs from the ping queue before WordPress sends pingbacks.

It keeps external pingbacks intact while preventing noisy internal self-pings.

Plugin behavior:

* Hooks `pre_ping`
* Compares outbound links against `home_url()`
* Removes links that point to the current site
* No settings page required

== Installation ==

1. Upload the plugin folder to `/wp-content/plugins/`.
2. Activate through **Plugins > Installed Plugins**.
3. Done. No configuration needed.

== Frequently Asked Questions ==

= Does this disable pingbacks completely? =

No. It only removes pingbacks where the destination is your own site.

= Does this affect outgoing links to other websites? =

No. External links are left untouched.

== Changelog ==

= 16.6148 =
* Raised the declared PHP floor to 8.0 to match the code's use of `str_starts_with()` (P0-2).
* Removed the orphaned `css/` and `langs/` assets the focused `pre_ping` callback no longer uses (P3).
* Aligned the readme Contributors slug to `thisismyurl` for line consistency (P3).

= 16.6147 =
* Unified plugin versioning to the x.Yddd calendar-version scheme.
* Confirmed compatibility with WordPress 7.0.


= 16.0.0 =
* Complete modernization with namespace and strict types.
* Removed legacy `thisismyurl-common.php` dependency.
* Simplified logic to a focused `pre_ping` callback.
* Added modern plugin headers and SPDX license metadata.

= 15.01 =
* Legacy maintenance release.

= 1.0.0 =
* Initial release.

== Upgrade Notice ==

= 16.0.0 =
Major internal refactor with no settings migration required.

== Screenshots ==

1. No UI screens. This plugin runs silently in the background.
