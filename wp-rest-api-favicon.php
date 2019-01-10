<?php
/**
 * Plugin Name: WP REST API favicon
 * Plugin URI:  https://github.com/tomphill/wp-rest-api-favicon
 * Description: Extends WP REST API with WordPress favicon
 *
 * Version:     1.0.0
 *
 * Author:      Tom Phillips
 * Author URI:  https://github.com/tomphill
 *
 * Text Domain: wp-rest-api-favicon
 *
 * @package WP_REST_API_favicon
 */

/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

// WP API v2.
include_once 'includes/wp-rest-api-favicon-v2.php';

if ( ! function_exists ( 'wp_rest_api_favicon_init' ) ) :

  /**
   * Init JSON REST API Static Routes.
   *
   * @since 1.0.0
   */
  function wp_rest_api_favicon_init() {
    $class = new WP_REST_API_favicon();
    add_filter( 'rest_api_init', array( $class, 'register_routes' ) );
  }

  add_action( 'init', 'wp_rest_api_favicon_init' );

endif;
