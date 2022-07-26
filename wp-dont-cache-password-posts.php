<?php

namespace WP_Dont_Cache_Password_Posts;

/*
Plugin Name: Dont Cache Password Posts
Plugin URI: https://palasthotel.de
Description: Prevent caching posts that need a password
Version: 1.0.0
Author: Palasthotel (Jana Eggebrecht)
Author URI: https://palasthotel.de
License:
*/

if ( ! class_exists( '\WP_Dont_Cache_Password_Posts\Plugin' ) ):

	class Plugin {

		function __construct() {
			add_action( 'template_redirect', array( $this, 'update_header_cache' ) );
		}

		function update_header_cache() {
			global $post;
			if ( ! empty( $post->post_password ) ) {
				header( 'Cache-Control: no-store, no-cache, must-revalidate, max-age=0' );
				header( 'Pragma: no-cache' );
				header( 'Expires: Thu, 01 Dec 1990 16:00:00 GMT' );
			}
		}
	}

	new Plugin();

	// class exists
endif;
