<?php
/*
Plugin Name: Admin Bar on Bottom
Plugin URI: https://github.com/modshrink/admin-bar-on-bottom
Description: While you log in, the admin bar is displayed on a bottom.
Version: 0.0.1
Author: modshrink
Author URI: http://www.modshrink.com/
License: GPL2
Text Domain: admin-bar-on-bottom
Domain Path: /languages

    Copyright 2014  modshrink  (email : hello@modshrink.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//function myplugin_init() {
  load_plugin_textdomain( 'admin-bar-on-bottom', false, dirname( plugin_basename( __FILE__ ) ) ); 
//}
//add_action('plugins_loaded', 'myplugin_init');

add_action( 'wp_enqueue_scripts', 'admin_bar_style_init', 11 );
add_action( 'get_header','remove_admin_bar_css' );
add_action( 'wp_head', 'my_admin_bar_bump_cb');


$text = __('This is TEXT.');


/**
 *  Override default admin bar CSS.
 */

function admin_bar_style_init() {
     wp_register_style( 'adminBarStyleSheet', plugins_url('css/view.css', __FILE__) );
     wp_enqueue_style( 'adminBarStyleSheet' );
}

/**
 * Remove default admin bar inline CSS.
 */

function remove_admin_bar_css() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}

/**
 * Rewrite admin bar inline CSS.
 */

function my_admin_bar_bump_cb() { ?>
<style type="text/css" media="screen">
        html { padding-bottom: 32px !important; }
        * html body { padding-bottom: 32px !important; }
        @media screen and ( max-width: 782px ) {
                html { padding-bottom: 46px !important; }
                * html body { padding-bottom: 46px !important; }
        }
</style>
<?php } ?>