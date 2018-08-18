<?php

/**
* Autoload for PHP Composer and definition of the ABSPATH
*/

//defining the absolute path for the wordpress instalation.
if ( !defined('ABSPATH') ) define('ABSPATH', dirname(__FILE__) . '/');

//including composer autoload
require ABSPATH."vendor/autoload.php";

//including the custom post types
require('setup_types.php');

//including the api endpoints
require('setup_api.php');

//including any monolitic tempaltes
require('setup_templates.php');

add_theme_support( 'post-thumbnails' );



function insertProductCard($atts, $content = null) {
   extract(shortcode_atts(array('id' => '#'), $atts));
   return '<ProductCard productID={id} />';
}
add_shortcode('productCard', 'insertProductCard');



add_filter( 'woocommerce_rest_check_permissions',
	function ( $permission, $context, $object_id, $post_type ) {
		if ( $context !== 'read' ) {
			return $permission;
		}

		$post_type_object = get_post_type_object( $post_type );

		if ( $object_id ) {
			return current_user_can( $post_type_object->cap->read_post, $object_id );
		}

		return $post_type_object->has_archive;

	},
	10,
	4
);