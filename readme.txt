=== WP Hotjar ===
Contributors: thiagogsrwp
Tags: hotjar
Requires at least: 3.8
Tested up to: 5.1
Stable tag: 0.0.3
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Hotjar connector that can prevent pings while logged as admin.

== Description ==

[Hotjar](https://www.hotjar.com/) is a 3rd tool that provide analytics and feedback for
your users with heatmaps, recordings, funnels, pools, surveys, etc.

This plugin allow you to connect this tool using its javascript code without put your hands
in the source code. Fill your Hotjar ID, it is enough.

The second advantage to use this plugin is the possibility to disable it in your site while
you are logged as admin. This is important to not generate fake analytics data in your heatmaps
and records in Hotjar.

Hotjar injects a javascript code in your site to capture the visitors events like scroll,
clicks, time on page, etc. You can visualize all reports in Hotjar dashboard.

= Get involved =

Developers can contribute to the source code on the [GitHub Repository](https://github.com/thiagogsr/wp-hotjar).

== Installation ==

= Minimum Requirements =

* WordPress 3.8 or greater

= Instructions =

1. Upload the entire 'wp-hotjar' folder to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==

= 0.0.3 - 2018-04-21 =
* Translations, basic styling and security improvements. Thanks @koskinenaa

= 0.0.2 - 2017-11-09 =
* Trim hotjar id and check if it is present before render js snippet. Thanks @mvc1095

= 0.0.1 - 2017-06-18 =
* Initial Release
