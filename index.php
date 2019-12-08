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

 if (!class_exists('ClipcannGeloc')){

    class ClipcannGeloc {

        function register() {

            /**
             * set shortCode [clipcann-geoloc] to get map
             * set admin config page for map
             */
            add_shortcode('clipcann-geoloc', 'set_map');
            add_action('admin_menu', array($this, 'add_admin_page'));
        }

        public function add_admin_page(){
            add_menu_page('Clipcann Geoloc',' Clipcanngeoloc ','manage_option','clipcanng', array($this,'admin_page'),'dashicons-location', 110);
        }

        public function admin_page(){
            // add template
        }
        
        function set_map() {
            $Content = "<h3>leaflet here !</h3>";
            return $Content;
        }

    }
}


 $clipcannGeoloc = new ClipcannGeloc();
 $clipcannGeoloc->register();

