<?php
/**
* Plugin Name: WP Hotjar
* Plugin URI: https://github.com/thiagogsr/wp-hotjar
* Description: Hotjar connector that avoids connections when logged in wp-admin.
* Author: Thiago Guimarães
* Author URI: https://github.com/thiagogsr
* Version: 0.0.3
* Text Domain: wp-hotjar
* Domain Path: /languages/
*
* License: GNU General Public License v3.0
* License URI: http://www.gnu.org/licenses/gpl-3.0.html
*
* @package   WP-Hotjar
* @author    Thiago Guimarães Santa Rosa
* @category  Analytics
* @copyright Thiago Guimarães
* @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
*/

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

require_once plugin_dir_path( __FILE__ ) . 'classes/class-wp-hotjar-connector.php';

/**
* # WP Hotjar Main Plugin Class
*
* ## Plugin Overview
*
* Plugin to connect your site with hotjar changing the Hotjar ID from wp-admin.
* Also it does not connect with Hotjar while you are logged.
*
*/
class WP_Hotjar {
  /** plugin version number */
  public static $version = '0.0.3';

  /** @var string the plugin file */
  public static $plugin_file = __FILE__;

  /** @var string the plugin file */
  public static $plugin_dir;

  /**
  * Initializes the plugin
  *
  * @since 0.0.1
  */
  public static function init() {
    self::$plugin_dir = dirname(__FILE__);

    $connector = new WP_Hotjar_Connector();
    $connector->load();

    // Load translation files
    add_action('plugins_loaded', __CLASS__ . '::load_plugin_textdomain');
  }

  /**
  * Load our language settings for internationalization
  *
  * @since 0.0.1
  */
  public static function load_plugin_textdomain() {
    load_plugin_textdomain('wp-hotjar', false, basename(self::$plugin_dir) . '/languages');
  }
}

WP_Hotjar::init();
