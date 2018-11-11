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

function wp_admin_css_get_users_list() {
	$output = '<table class="wp-admin-css-users">
		<tr>
			<th>User</th>
			<th>Roles</th>
		</tr>';
	foreach( get_users() as $user ) {
		$output .= '<tr class="wp-admin-css-users__item">
			<td class="wp-admin-css-users__checkbox">
				<input type="checkbox" class="wp-admin-css-check" value="' . $user->ID . '" />
				<span>' . $user->display_name . '</span>
			</td>
			<td>' . implode( ', ', $user->roles ) . '</td>
		</div>';
	}
	return $output . '</table>';
}

function wp_admin_css_render() { ?>
	<h1><?php echo esc_html( WP_ADMIN_CSS, TEXTDOMAIN ); ?></h1>
	<div id="wp-admin-css-editor">
	/* body {
		font-family: 'Your custom font';
	} */
	</div>
	<form action="#" method="post" class="wp-admin-css-form">
		<h2 class="hndle">Select the users you want to apply the css:</h2>
		<?php echo wp_admin_css_get_users_list(); ?>
		<a href="#" class="button action" id="wp-admin-css-toggle">Toggle Select</a>
		<button type="submit" class="button button-primary button-large">Save</button>
	</select>
<?php
}

