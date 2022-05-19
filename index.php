<?php
/*
 * Plugin Name: Greenhouse Job Board Block
 * Author: Marin Carroll
 * Plugin URI: https://github.com/marincarroll/greenhouse-jobboard-block
 * Author URI: https://github.com/marincarroll
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: mctooltip
*/

defined( 'ABSPATH' ) or die( 'No, thank you.' );

define( 'MCJB_URL', plugin_dir_url( __FILE__ ) );
define( 'MCJB_PATH', plugin_dir_path( __FILE__ ) );

require MCJB_PATH . '/inc/block.php';
require MCJB_PATH . '/inc/api.php';
