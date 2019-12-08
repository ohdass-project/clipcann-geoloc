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

function setMapClipcannGeoloc() {
    $Content = "<h3>leaflet here !</h3>";
    return $Content;
}

add_shortcode('clipcann-geoloc', 'setMapClipcannGeoloc');