<?php

function wp_admin_css_register_vendor_scripts() {
	wp_register_script( 'wp-admin-vendor-ace', PLUGIN_DIR . '/vendor/ace/ace.js', array(), '1.0.0', true );
	wp_register_script( 'wp-admin-vendor-ace-mode', PLUGIN_DIR . '/vendor/ace/mode-css.js', array( 'wp-admin-vendor-ace' ), '1.0.0', true );
	wp_register_script( 'wp-admin-vendor-ace-theme', PLUGIN_DIR . '/vendor/ace/theme-monokai.js', array( 'wp-admin-vendor-ace' ), '1.0.0', true );
	wp_register_script( 'wp-admin-vendor-ace-worker', PLUGIN_DIR . '/vendor/ace/worker-css.js', array( 'wp-admin-vendor-ace' ), '1.0.0', true );
}
	
function wp_admin_css_register_plugin_styles() {
	wp_register_style( 'wp-admin-style', PLUGIN_DIR . '/assets/style.css' );
}
	
function wp_admin_css_register_plugin_scripts() {
	wp_register_script( 'wp-admin-script', PLUGIN_DIR . '/assets/app.js', array(), '1.0.0', true );
}

function wp_admin_css_register_assets() {
	wp_admin_css_register_vendor_scripts();
	wp_admin_css_register_plugin_styles();
	wp_admin_css_register_plugin_scripts();
}

function wp_admin_css_enqueue_scripts() {
	wp_admin_css_register_assets();

    wp_enqueue_script( 'wp-admin-vendor-ace' );
    wp_enqueue_script( 'wp-admin-vendor-ace-mode' );
    wp_enqueue_script( 'wp-admin-vendor-ace-theme' );
    wp_enqueue_script( 'wp-admin-vendor-ace-worker' );
    wp_enqueue_script( 'wp-admin-script' );
    wp_enqueue_style( 'wp-admin-style' );
}
add_action( 'admin_enqueue_scripts', 'wp_admin_css_enqueue_scripts' );