
<?php
/*
Plugin Name: Excerpt Length blabla
Plugin URI: http://cyrilbron.com
Description: Un plugin pour choisir la longueur des extraits
Version: 0.1
Author: Cyril Bron
Author URI: http://cyrilbron.com
License: GPL2
*/

class Excerpt_length_blabla_load
{
    public function __construct()
    {
        include_once plugin_dir_path( __FILE__ ).'/excerpt_action.php';
        new Excerpt_length_blabla();

        add_action( 'admin_menu', array($this, 'blabla_menu') );
    }

    public function blabla_menu() {
        //ajoute une entrée et une sous-entrée dans le menu admin principal
        add_menu_page(
            __( 'Plugin blabla', 'blabla' ), //$page_title
            __( 'Plugin blabla', 'blabla' ), //$menu_title
            'edit_pages', //$capability
            'blabla_home', //$menu_slug
            array($this, 'blabla_home'),//$function
            'dashicons-text', //$icon_url
             30 //$position
        );
        add_submenu_page(
            'blabla_home', //$parent_slug
            __( 'Réglages du plugin blabla', 'blabla' ), //$page_title
            __( 'Réglages', 'blabla' ), //$menu_title
            'edit_pages', //$capability
            'blabla_settings', //$menu_slug
            array($this, 'blabla_settings')//$function
        );
        add_action( 'admin_init', array($this, 'register_blabla_settings') );
    }

    public function blabla_home() {
        include_once plugin_dir_path( __FILE__ ).'/blabla_home.php';
    }

    public function blabla_settings() {
        include_once plugin_dir_path( __FILE__ ).'/blabla_settings.php';
        new Excerpt_length_blabla_settings();
    }

    public function register_blabla_settings() {
        //register our settings
        register_setting( 'blabla_settings_group', 'excerpt_length' );
    }
}

new Excerpt_length_blabla_load();