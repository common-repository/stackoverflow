<?php
/*
Plugin Name: Stackoverflow+
Plugin URI: http://techstricks.com/wp-plugins/
Description: Stackoverflow Plus integreates your <a href="http://www.stackoverflow.com">Stackoverflow</a> profile with your word press website. Show your Stackoverflow profile, Questions, Answers, Reputation, Badges and much more through a easy to configure widget.
Version: 1.0
Author: Amyth Arora
Author URI: http://www.techstricks.com
*/

// Copyright (c) 2012 Techstricks, Amyth Arora. All rights reserved.
//
// Released under the GPL license
// http://www.opensource.org/licenses/gpl-license.php
//
// This is an add-on for WordPress
// http://wordpress.org/
//
// Thanks to God (For making me capable of doing stuff like this)
// Thanks to My Family for Supporting me (Literally)
// Thanks to Wordpress ( http://www.wordpress.org ).
// Thanks to Stackoverflow ( http://www.stackoverflow.com).
// Thanks to FatCOw for Medal Icons
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
// **********************************************************************
//
//You should have received a copy of the GNU General Public License
//along with this program.  If not, see <http://www.gnu.org/licenses/>

load_plugin_textdomain('wordpress-stackoverflow-plus');

if (!defined('WSP_VERSION')) {
    define('WSP_VERSION','1.0');
}
if (!defined('WSP_AUTHOR')) {
    define('WSP_AUTHOR','Amyth Arora');
}
// import the Widget Class
require_once( plugin_dir_path( __FILE__ ) . 'wsp-widget.php');

//Add the Stylesheet
add_action('wp_enqueue_scripts', 'add_wsp_style');
function add_wsp_style(){
    wp_register_style('wsp-style', plugins_url('css/stackoverflow-plus.css', __FILE__));
    wp_enqueue_style('wsp-style');
}
?>