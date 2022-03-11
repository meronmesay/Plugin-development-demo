<?php
/**
 * Plugin Name:       Simple Contact Form
 * Plugin URI:        https://contactform.com
 * Description:       A simple contact form plugin that is used for displaying a contact form 
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Fitsum A. 
 * Author URI:        https://fa.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       my-basics-plugin
 */


defined('ABSPATH') or die("You are missing the path man :) ");

function mc_contact_form()
{

    include_once plugin_dir_path(__FILE__) .'includes/form1.php';

}

// add shortcut 
add_shortcode('s_contact_form', 'mc_contact_form');

function mc_addMenu()
{

    add_menu_page(
        'Contact Form',
        'Contact Form',
        'manage_options',
        'contact-form',
        'displayCode',
        'dashicons-feedback'
    );

}

function displayCode()
{
    include_once plugin_dir_path(__FILE__) .'includes/setting.php';
}
add_action('admin_menu', 'mc_addMenu');

// Enqueue style 
function mc_loadmycss() {

    wp_enqueue_style( 'myCSS', plugin_dir_url(__FILE__) .'assets/css/style.css');
    wp_enqueue_style( 'myBootstrap', plugin_dir_url(__FILE__) .'assets/css/bootstrap.min.css');
    wp_enqueue_script( 'my_custom_script', plugin_dir_url( __FILE__ ) . 'assets/js/script.js' );

}

add_action( 'wp_enqueue_scripts', 'mc_loadmycss' );