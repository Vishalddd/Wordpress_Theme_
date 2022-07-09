<?php
/*
Theme Name: iBOOM
Theme URI: https://www.ibarts.in/
Author: iB-Art's
Author URI: https://www.ibarts.in/
Description: This is iB-Art's theme!
Version: 1.0.0
Text Domain: my-custom-theme
Tags: custom-background
Use @package iBoom
*/
    function iBOOM_theme_support(){
    add_theme_support('title-tag');
    add_theme_support( 'custom-logo' );
    add_theme_support('post-thumbnails');
 }
 add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );   
add_theme_support('post-thumbnails');


    add_action('after_theme_support', 'iBOOM_theme_support');

    function iBOOM_menus(){
        $locations = array(
            'primary' => "Desktop primary Left sidebar",
            'footer' => "Bottom menu"
        );
        register_nav_menus($locations);
    }

    add_action('init','iBOOM_menus');

    function iBOOM_register_styles(){
        wp_enqueue_style('iBOOM_style', get_template_directory_uri() . "/style.css", array('iBOOM_bootstrap'), '1.0', 'all' );
        wp_enqueue_style('iBOOM_bootstrap',"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all' );
        wp_enqueue_style('iBOOM_fontawesome',"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all' );
    }

    add_action('wp_enqueue_scripts', 'iBOOM_register_styles');


// for divi builder plugin activation

require_once get_template_directory() . '/require_plugin/class-iBoom-plugin-activation.php';

add_action( 'iBoom_register', 'my_custom_theme_register_required_plugins' );


 
function my_custom_theme_register_required_plugins() {
	
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Divi Builder', // The plugin name.
			'slug'               => 'divi-builder', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/require_plugin/divi-builder.zip', // The plugin source.
			'required'           => true, 
			'version'            => '', 
			'force_activation'   => false, 
			'force_deactivation' => false, 
			'external_url'       => '', 
			'is_callable'        => '', 
		)

	);

	
	$config = array(
		'id'           => 'my-custom-theme',                 // Unique ID for hashing notices for multiple instances of iBoom.
		'default_path' => '',                      
		'menu'         => 'iBoom-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    
		'dismissable'  => true,                    
		'dismiss_msg'  => '',                      
		'is_automatic' => false,                   
		'message'      => '',                      
		
	);

	iBoom( $plugins, $config );
}

/**
 * User iboom
 * Package wp-admin-options-framework
 * File functions.php
 * Version 1.0.0
 */

include(__DIR__."/admin/init.php");


// for _iboom option
add_action("admin_menu", "createMyMenus");

function createMyMenus() {
    add_menu_page("iBOOM", "iBOOM", 0, "my-menu-slug", "myMenuPageFunction", "dashicons-businessperson");
    add_submenu_page("my-menu-slug", "Theme Options", "Theme Options", 0, "theme-options", "ADMIN_OPTIONS_MENU_LABEL");
	add_submenu_page("my-menu-slug", "Install Plugins", "Install Plugins", 0, "iBoom-install-plugins", "my_custom_theme_register_required_plugins");
	
}

?>