<?php
/**
 * Theme enqueue scripts and styles.
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if( ! function_exists('real_estate_scripts')){
    function real_estate_scripts() {
        $theme_uri = get_template_directory_uri();
        // include custom jQuery
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), null, true);
        
        // Custom JS
        wp_enqueue_script('real_estate_functions', $theme_uri . '/src/index.js', [], time(), true);
        // wp_enqueue_script('real_estate_functions', $theme_uri . '/src/index.min.js', [], "my ver", true);
        wp_enqueue_script('fancybox_functions', $theme_uri . '/libery/fancybox.umd.js', [],false, true);
        //Slick	slider 
        wp_enqueue_script('slick_theme_functions', $theme_uri . '/libery/slick.min.js', [], false, true);
        wp_enqueue_script('owlcarousel_functions', $theme_uri . '/libery/owl.carousel.min.js', [],false, true);

        // Custom css
        wp_enqueue_style('real_estate_style', $theme_uri . '/src/index.css', [], time());
        wp_enqueue_style('owlcarousel_style', $theme_uri . '/libery/owl.carousel.min.css');
        wp_enqueue_style('owlcarousel-theme_style', $theme_uri . '/libery/owl.theme.default.css');

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

    }
}
add_action( 'wp_enqueue_scripts', 'real_estate_scripts', );

