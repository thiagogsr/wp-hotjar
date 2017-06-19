<?php
  $default_settings = array('hotjar_id' => '', 'disable_for_admin' => 'yes');

  $settings = get_option( 'wp_hotjar' );
  $settings = is_array($settings) ? $settings : $default_settings;
?>
<h1>Hotjar</h1>
<p>Visit your <a href="https://insights.hotjar.com/site/list" target="_blank">Hotjar site list</a>
  and get the unique ID.</p>

<form method="post" action="options.php">
  <?php settings_fields( 'wp_hotjar' ); ?>

  <div>
    <label for="wp_hotjar_id">Hotjar ID</label><br />
    <input type="text" name="wp_hotjar[hotjar_id]" id="wp_hotjar_id"
      value="<?php echo $settings['hotjar_id']; ?>" maxlength="10" />
  </div>

  <br />

  <div>
    <label for="wp_hotjar_disable_for_admin">Disable for admin?</label>
    <input type="hidden" name="wp_hotjar[disable_for_admin]" value="no">
    <input type="checkbox" name="wp_hotjar[disable_for_admin]" id="wp_hotjar_disable_for_admin"
      value="yes" <?php if('yes' === $settings['disable_for_admin']) { ?>checked="checked"<?php } ?> />
  </div>

  <?php submit_button(); ?>
</form>
