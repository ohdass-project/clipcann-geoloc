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

        function register() {

            /**
             * set shortCode [clipcann] to get map
             * set admin config page for map
             * load scripts js/css for plugin
             */
            add_action('admin_menu', array($this, 'add_admin_page'));
            add_action('wp_enqueue_scripts', array($this, 'enqueue'));
            add_shortcode('clipcann', array($this,'set_map'));
        }

        public function add_admin_page(){
            add_menu_page('Clipcann Geoloc','Clipcann Geoloc','manage_options','clipcanngeoloc', array($this,'admin_page'),'dashicons-location-alt', 110);
        }

        public function admin_page(){
            require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
        }

       public function set_map() {
            require_once plugin_dir_path(__FILE__) . 'templates/map.php';
        }

        function enqueue() {
            wp_enqueue_style('clipcannStyle', plugins_url('/assets/css/clipcann-geoloc-style.css', __FILE__)); 
            wp_enqueue_script('clipcannJs', plugins_url('/assets/js/clipcann-geoloc.js', __FILE__));
            wp_enqueue_style('leafletStyle', 'https://unpkg.com/leaflet@1.6.0/dist/leaflet.css'); 
            wp_enqueue_script('leaflet', 'https://unpkg.com/leaflet@1.6.0/dist/leaflet.js');
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

