<?php
class WP_Hotjar_Connector {
  public function load() {
    $this->load_dependencies();
    $this->load_admin();
  }

  private function load_dependencies() {
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wp-hotjar-admin.php';
  }

  private function load_admin() {
    $admin = new Wp_Hotjar_Admin();
    add_action( 'admin_init', array( $admin, 'register_my_setting' ) );
    add_action( 'admin_menu', array( $admin, 'create_nav_page' ) );
  }
}
?>
