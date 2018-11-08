<?php
/*
	Plugin Name: WP Admin CSS
	Plugin URI: 
	Description: Easily add custom CSS to your WP Admin dashboard
	Version: 0.0.1
	Author: Cristiano Ventyra
	Author URI: https://github.com/cristianoventura
	Text Domain: wpadmincss
	License: GPLv2 or later.
	Copyright: Cristiano Ventura
*/

defined( 'ABSPATH' ) or die;

define( WP_ADMIN_CSS, 'WP Admin CSS' );
define( TEXTDOMAIN, 'wpadmincss' );
define( VERSION, '0.0.1' );
define( PLUGIN_DIR, plugin_dir_url( __FILE__ ) );

include 'includes/assets.php';

function wp_admin_css_add_menu() {
    add_menu_page(
        __( WP_ADMIN_CSS, TEXTDOMAIN ),
        WP_ADMIN_CSS,
        'manage_options',
        'wp-admin-css',
        'wp_admin_css_render',
        'dashicons-admin-customizer',
        99
    );
}
add_action( 'admin_menu', 'wp_admin_css_add_menu' );

function wp_admin_css_get_users_dropdown() {
	$output = '<option value="*" selected>All users</option>';
	foreach( get_users() as $user ) {
		$output .= '<option value="' . $user->ID . '">' . $user->display_name . '</option>';
	}
	return $output;
}

function wp_admin_css_render() { ?>
	<h1><?php echo esc_html( WP_ADMIN_CSS, TEXTDOMAIN ); ?></h1>
	<p>Select the user you want to add the css</p>
	<select id="user">
		<?php echo wp_admin_css_get_users_dropdown(); ?>
	</select>
	<a href="#" class="button action">Select</a>
	<div id="editor">
	/* body {
		font-family: 'Your custom font';
	} /*
	</div>
<?php
}

