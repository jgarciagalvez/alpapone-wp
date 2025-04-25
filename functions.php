<?php
/**
 * Al Papone Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package asap-child
 */

// Enqueue parent and child theme styles
add_action( 'wp_enqueue_scripts', 'asap_child_enqueue_styles' );
function asap_child_enqueue_styles() {
    // First enqueue the parent theme's styles
    // Obtain the full path of the parent theme's CSS file
    $parent_main_style_path = get_template_directory() . '/assets/css/main.min.css';
    $parent_home_style_path = get_template_directory() . '/assets/css/home.min.css';
    
    // Get dynamic version based on file modification date
    $parent_main_style_version = file_exists($parent_main_style_path) ? filemtime($parent_main_style_path) : '1.0';
    $parent_home_style_version = file_exists($parent_home_style_path) ? filemtime($parent_home_style_path) : '1.0';
    
    // Enqueue parent theme styles with dynamic version
    wp_enqueue_style( 
        'asap-parent-style', 
        get_template_directory_uri() . '/assets/css/main.min.css', 
        array(), 
        $parent_main_style_version
    );

    // Conditionally add newspaper design if that feature is enabled
    if (function_exists('get_theme_mod') && 
        get_theme_mod('asap_enable_newspaper_design', false) && 
        (is_home() || is_category() || is_tag() || is_author() || 
        (is_single() || is_page()) && get_post_meta(get_the_ID(), 'asap_add_news_css', true) === "1")) {
        $design_type = get_theme_mod('asap_home_design_type', 1);
        wp_enqueue_style(
            'asap-parent-home-style', 
            get_template_directory_uri() . '/assets/css/home/design-type'.$design_type.'.css',
            array('asap-parent-style'),
            $parent_home_style_version
        );
    }
    
    // Then enqueue the child theme's style.css
    wp_enqueue_style(
        'asap-child-style',
        get_stylesheet_uri(),
        array('asap-parent-style'),
        wp_get_theme()->get('Version')
    );
    
    // Add Google Fonts for Josefin Sans and Poppins
    wp_enqueue_style(
        'alpapone-google-fonts',
        'https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600;700&family=Poppins:wght@400;500;600&display=swap',
        array(),
        null
    );
}

// Add any additional theme functions below
