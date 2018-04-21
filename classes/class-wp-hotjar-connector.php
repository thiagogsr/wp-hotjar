<?php

// No direct access to this file
defined( 'ABSPATH' ) or die();

class WP_Hotjar_Connector {
  public function load() {
    $this->load_dependencies();
    $this->load_admin();
    $this->enqueue_script();
  }

  private function load_dependencies() {
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wp-hotjar-admin.php';
  }

  private function load_admin() {
    $admin = new Wp_Hotjar_Admin();
    add_action( 'admin_init', array( $admin, 'register_my_setting' ) );
    add_action( 'admin_menu', array( $admin, 'create_nav_page' ) );
  }

  public static function build_hotjar_script() {
    $settings = get_option( 'wp_hotjar' );
    $is_admin = is_admin() || current_user_can('manage_options');

    $hotjar_id = trim($settings['hotjar_id']);
    if (!$hotjar_id) {
      return;
    }

    if (!is_array($settings) || ($is_admin && 'yes' === $settings['disable_for_admin'])) {
      return;
    }

    echo "
    <script>
      (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:" . $hotjar_id . ",hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
      })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    ";
  }

  private function enqueue_script() {
    add_action( 'wp_head', array($this, 'build_hotjar_script') );
  }
}
?>
