<?php
/**
 * @package Change_Color
 * @version 1.0
 * 
 * Plugin Name: Change WP Admin Color
 * Plugin URI: https://example.com
 * Description: Change schemes in wp-admin page
 * Version: 1.0
 * Author: :)
 */

//set admin page color to British Palette - Nasturcian Flower color: https://flatuicolors.com/palette/gb
function add_color()
{
  wp_admin_css_color( 'orange', __( 'Orange' ),
    plugins_url() ."/changecolor/css/colors.css",
    array( '#EB5935', '#DB4925', '#AFCE32', '#e84118' )
  );
}
// hook add_color to admin_init/admin page called
add_action( 'admin_init', 'add_color' );

function plugin_activation()
{
  // get current user id then update admin color to Orange
  $args = array(
    'ID' => get_current_user_id(),
    'admin_color' => 'orange'
  );
  wp_update_user( $args );
}
// set admin color of current user to custom color when plugin active
register_activation_hook( __FILE__, 'plugin_activation' );

function plugin_deactivation()
{
  // get current user id then update admin color to default
  $args = array(
      'ID' => get_current_user_id(),
      'admin_color' => 'fresh'
  );
  wp_update_user( $args );
}
// set admin color of current user to default(fresh color) when plugin deactive
register_deactivation_hook( __FILE__, 'plugin_deactivation' );