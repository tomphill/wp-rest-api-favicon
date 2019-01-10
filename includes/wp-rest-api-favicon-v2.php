<?php
/**
 * WP REST API favicon Routes
 *
 * @package WP_REST_API_favicon
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! class_exists( 'WP_REST_API_favicon' ) ) :


  /**
   * WP REST API favicon class.
   *
   * WP REST API favicon support for WP API v2.
   *
   * @package WP_REST_API_favicon
   * @since 1.0.0
   */
  class WP_REST_API_favicon {


    /**
     * Get WP API namespace.
     *
     * @since 1.0.0
     * @return string
     */
    public static function get_api_namespace() {
        return 'wp/v2';
    }


    /**
     * Get WP API Menus namespace.
     *
     * @since 1.0.0
     * @return string
     */
    public static function get_plugin_namespace() {
      return 'wp-rest-api-static/v2';
    }


    /**
     * Register menu routes for WP API v2.
     *
     * @since  1.0.0
     */
    public function register_routes() {

      register_rest_route( self::get_api_namespace(), '/favicon', array(
          array(
            'methods'  => WP_REST_Server::READABLE,
            'callback' => array( $this, 'get_favicon' )
          )
        )
      );
    }


    /**
     * Get the favicon
     *
     * @since  1.0.0
     * @return Url of the favicon 
     */
    public static function get_favicon() {

      $rest_url = trailingslashit( get_rest_url() . self::get_plugin_namespace() . '/favicon/' );

      $site_icon_id = get_option( 'site_icon' );
      if ( $site_icon_id ) {
        $url = wp_get_attachment_image_url( $site_icon_id, 'full' );
        $output = json_decode('{"id": ' . $site_icon_id . ', "url": "' . $url . '"}');
      }

      // No favicon is set
      if( empty($output) ) {
        $output = json_decode('{"id": null, "url": null}');
      }

      // Response setup
      return new WP_REST_Response( $output, 200 );
    }
  }

endif;
