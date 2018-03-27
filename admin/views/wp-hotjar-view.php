<?php

  // No direct access to this file
  defined( 'ABSPATH' ) or die();

  $default_settings = array('hotjar_id' => '', 'disable_for_admin' => 'yes');

  $settings = get_option( 'wp_hotjar' );
  $settings = is_array($settings) ? $settings : $default_settings;
?>
<div id="business-info-wrap" class="wrap">

  <h1 class="wp-heading-inline"><?php esc_html_e( 'Hotjar', 'wp-hotjar' ); ?></h1>

  <hr class="wp-header-end">

  <?php if ( isset( $_GET['settings-updated'] ) ) : ?>

    <div id="message" class="notice notice-success is-dismissible">
      <p><strong><?php esc_html_e( 'Settings saved.' ); ?></strong></p>
    </div>

  <?php endif; ?>

  <p><?php
    $url = 'https://insights.hotjar.com/site/list';
    $link = sprintf( wp_kses( __( 'Visit your <a href="%s" target="_blank">Hotjar site list</a> and get the unique ID.', 'wp-hotjar' ), array(  'a' => array( 'href' => array(), 'target' =>  '_blank' ) ) ), esc_url( $url ) );
    echo $link;
  ?></p>

  <form method="post" action="options.php">
    <?php settings_fields( 'wp_hotjar' ); ?>

    <table class="form-table">

      <tbody>

        <tr>

          <th scope="row">
            <label for="wp_hotjar_id"><?php esc_html_e( 'Hotjar ID', 'wp-hotjar' ); ?></label>
          </th>

          <td>
            <input type="text" name="wp_hotjar[hotjar_id]" id="wp_hotjar_id" value="<?php echo $settings['hotjar_id']; ?>" maxlength="10" />
            <p class="description" id="wp_hotjar_id_description"><?php esc_html_e( '(Leave blank to disable)', 'wp-hotjar' ); ?></p>
          </td>

        </tr>

        <tr>

          <th scope="row">
            <label for="wp_hotjar_disable_for_admin"><?php esc_html_e( 'Disable for admin?', 'wp-hotjar' ); ?></label>
          </th>

          <td>
            <input type="hidden" name="wp_hotjar[disable_for_admin]" value="no">
            <input type="checkbox" name="wp_hotjar[disable_for_admin]" id="wp_hotjar_disable_for_admin" value="yes" <?php if('yes' === $settings['disable_for_admin']) { ?>checked="checked"<?php } ?> />
          </td>

        </tr>

      </tbody>

    </table>

    <?php submit_button(); ?>

  </form>

</div>
