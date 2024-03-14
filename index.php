<?php

/*
 * Plugin Name: Remove Shortcodes
 * Plugin URI: https://github.com/luanpiegas/remove-shortcodes
 * Description: Remove shortcodes from content
 * Version: 1.0.0
 * Author: Luan Piegas
 * Author URI: https://luanpiegas.com
*/

if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Remove shortcodes from content
 *
 * @param string $content Post content.
 * @return string Modified Post content.
 */
add_filter( 'the_content', 'lp_remove_shortcode' );
function lp_remove_shortcode( $content ) {
    $content = unescape_invalid_shortcodes( $content );
    $regex = '~\[([^\]]+)\]~'; // regex to find all shortcodes
    $content = preg_replace( $regex, '', $content );
    return $content;
}
