<?php
/**
 * Plugin Name:       Clipcann Geoloc
 * Description:       Get Clipcann products on map
 * Version:           1.0.0
 * Author:            Ohdass team
 * Author URI:        https://clipcann.com
 * Text Domain:       Clipcann-Geoloc
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: https://github.com/ohdass-project/clipcann-geoloc
 */

 if (!class_exists('Clipcann')){

    class Clipcann {

        function __construct(){            
        }


        function register() {

            /**
             * set shortCode [clipcann-geoloc] to get map
             * set admin config page for map
             * load scripts js/css for plugin
             */
            add_shortcode('clipcann-geoloc', 'set_map');
            add_action('admin_menu', array($this, 'add_admin_page'));
            add_action('admin_enqueue_scripts', array($this, 'enqueue'));
        }

        public function add_admin_page(){
            add_menu_page('Clipcann Geoloc','Clipcann Geoloc','manage_options','clipcanngeoloc', array($this,'admin_page'),'dashicons-location-alt', 110);
        }

        public function admin_page(){
            require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
        }
        
        function set_map() {
            $Content = "<h3>leaflet here !</h3>";
            return $Content;
        }

        function enqueue() {
            wp_enqueue_style('clipcannStyle', plugins_url('/assets/css/clipcann-geoloc-style.css', __FILE__));
            wp_enqueue_script('clipcannJs', plugins_url('/assets/js/clipcann-geoloc.js', __FILE__));
        }

        function activate() {

            require_once plugin_dir_path(__FILE__) . 'inc/clipcann-activate.php';
            ClipcannActivate::activate();
        }
        
        function deactivate() {
            require_once plugin_dir_path(__FILE__) . 'inc/clipcann-deactivate.php';
            ClipcannDeActivate::deactivate();

        }
    }

    $clipcannGeoloc = new Clipcann();
    $clipcannGeoloc->register();

    // plugin hooks
    register_activation_hook(__FILE__, array($clipcannGeoloc, 'activate'));
    register_deactivation_hook(__FILE__, array($clipcannGeoloc, 'deactivate'));
 
}

