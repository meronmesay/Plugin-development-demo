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

function mycontact_setting_menu()
{

    add_menu_page(
      __( 'MyContact Settings', 'mycontact-plugin' ),
      __( 'MyContact Settings', 'mycontact-plugin' ),
      'manage_options',
      'mycontact-settings-page',
      'mycontact_settings_template_callback',
      '',
      null

    );

    
}

// function displayCode()
// {
//     include_once plugin_dir_path(__FILE__) .'includes/setting.php';
// }
add_action('admin_menu', 'mycontact_setting_menu');

// Enqueue style 
function mc_loadmycss() {

    wp_enqueue_style( 'myCSS', plugin_dir_url(__FILE__) .'assets/css/style.css');
    wp_enqueue_style( 'myBootstrap', plugin_dir_url(__FILE__) .'assets/css/bootstrap.min.css');
    wp_enqueue_script( 'my_custom_script', plugin_dir_url( __FILE__ ) . 'assets/js/script.js' );

}

add_action( 'wp_enqueue_scripts', 'mc_loadmycss' );


function mycontact_settings_template_callback()
{
  ?>
  <div class="wrap">
      <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

      <form action="options.php" method="post">
          <?php 
              // security field
              settings_fields( 'mycontact-settings-page' );

              // output settings section here
              do_settings_sections('mycontact-settings-page');

              // save settings button
              submit_button( 'Save Settings' );
          ?>
      </form>
  </div>
  <?php

}

// Setting template

function mycontact_settings_init(){
        // Setup settings section
      add_settings_section(
        'mycontact_settings_section', // section id
        'Take this short code to diplay it in your content: s_contact_form', // section label
        '',
        'mycontact-settings-page' //secting page where the section is
    );
  
        // Register bg color
        register_setting(
          'mycontact-settings-page', // the setting page
          'mycontact_settings_bg_color_field', // field id
          array(
              'type' => 'string',
              'sanitize_callback' => 'sanitize_text_field',
              'default' => '#FFFFFF'
          )
      );

      // backgroung color
      add_settings_field(
        'mycontact_settings_bg_color_field',
        __( 'Backgroung Color', 'mycontact' ), // field label
        'mycontact_settings_bg_color_callback', // setting field callback
        'mycontact-settings-page',
        'mycontact_settings_section'
      );

      // Register text font type input
      register_setting(
        'mycontact-settings-page',
        'mycontact_settings_txt_font_field',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => 'garamond,serif'
        )
    );
        // Add text font type
          add_settings_field(
            'mycontact_settings_txt_font_field',
            __( 'Choose Font type', 'mycontact' ),
            'mycontact_settings_txt_font_callback',
            'mycontact-settings-page',
            'mycontact_settings_section'
          );

      // btn color
      add_settings_field(
        'mycontact_settings_btn_color_field',
        __( 'Submit button Color', 'mycontact' ),
        'mycontact_settings_btn_color_callback',
        'mycontact-settings-page',
        'mycontact_settings_section'
      );

      // Register btn color input
      register_setting(
          'mycontact-settings-page',
          'mycontact_settings_btn_color_field',
          array(
              'type' => 'string',
              'sanitize_callback' => 'sanitize_text_field',
              'default' => '#0000'
          )
      );
      // btn text color
      add_settings_field(
        'mycontact_settings_btn_txt_color_field',
        __( 'Button text color', 'mycontact' ),
        'mycontact_settings_btn_txt_color_callback',
        'mycontact-settings-page',
        'mycontact_settings_section'
      );

      // Register btn text color
      register_setting(
          'mycontact-settings-page',
          'mycontact_settings_btn_txt_color_field',
          array(
              'type' => 'string',
              'sanitize_callback' => 'sanitize_text_field',
              'default' => 'black'
          )
      );

}

add_action( 'admin_init', 'mycontact_settings_init' );

/**
 * Sanitize Image Uploader
 */
function mycontact_settings_btn_color_callback(){
  $mycontact_btn_color = get_option('mycontact_settings_btn_color_field');
  ?>
  <input type="color" name="mycontact_settings_btn_color_field"  value="<?php echo isset($mycontact_btn_color) ? esc_attr( $mycontact_btn_color ) : ''; ?>" />
  <?php 
}
function mycontact_settings_txt_font_callback() {
  $mycontact_txt_font = get_option('mycontact_settings_txt_font_field');
  ?>
  <select name="mycontact_settings_txt_font_field" class="regular-text">
        <option value="Brush Script MT, Brush Script Std, cursive" <?php selected( 'Brush Script MT, Brush Script Std, cursive', $mycontact_txt_font ); ?> >Cursive</option>
        <option value="garamond,serif" <?php selected( 'garamond,serif', $mycontact_txt_font ); ?> >Garamond,Serif</option>
        <option value="Roboto" <?php selected( 'Roboto', $mycontact_txt_font ); ?>>Roboto</option>
        <option value="Trattatello, fantasy" <?php selected( 'Trattatello, fantasy', $mycontact_txt_font ); ?>>Trattatello</option>
        <option value="Didot, serif" <?php selected( 'Didot, serif', $mycontact_txt_font ); ?>>Didot</option>
        <option value="Times, serif" <?php selected( 'Times, serif', $mycontact_txt_font ); ?>>Times</option>
        <option value="Andale Mono, monospace" <?php selected( 'Andale Mono, monospace', $mycontact_txt_font ); ?>>Andale Mono</option>
  </select>
  <hr>
  <br><br>
  <?php 
  
}


function mycontact_settings_bg_color_callback(){
  $mycontact_bg_color = get_option('mycontact_settings_bg_color_field'); // getting the value of bg color from options.php
  ?>
  <input type="color" name="mycontact_settings_bg_color_field"  value="<?php echo isset($mycontact_bg_color) ? esc_attr( $mycontact_bg_color ) : ''; ?>" />
  <?php 
}
function mycontact_settings_btn_txt_color_callback(){
  $mycontact_btn_txt_color = get_option('mycontact_settings_btn_txt_color_field');
  ?>
  <input type="color" name="mycontact_settings_btn_txt_color_field"  value="<?php echo isset($mycontact_btn_txt_color) ? esc_attr( $mycontact_btn_txt_color ) : ''; ?>" />
  
  <?php 
}


