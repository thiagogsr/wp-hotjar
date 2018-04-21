<?php

// No direct access to this file
defined( 'ABSPATH' ) or die();

class Wp_Hotjar_Admin {
  public function create_nav_page() {
    add_menu_page(
      esc_html__( 'Hotjar', 'wp-hotjar' ), 
      esc_html__( 'Hotjar', 'wp-hotjar' ), 
      'manage_options',
      'wp_hotjar_settings',
      'Wp_Hotjar_Admin::build_view',
      'dashicons-video-alt2'
    );
  }

  public function register_my_setting() {
    register_setting( 'wp_hotjar', 'wp_hotjar' );
  }

  public static function build_view() {
    require_once plugin_dir_path( __FILE__ ) . 'views/wp-hotjar-view.php';
  }
}
?>
