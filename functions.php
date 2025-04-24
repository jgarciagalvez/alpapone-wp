<?php

add_action( 'wp_enqueue_scripts', 'asap_child_enqueue_styles' );
function asap_child_enqueue_styles() {
    // Obtener la ruta completa del archivo CSS del tema padre
    $parent_main_style_path = get_template_directory() . '/assets/css/main.min.css';
    $parent_home_style_path = get_template_directory() . '/assets/css/home.min.css';
    
    // Obtener la versión dinámica basada en la fecha de modificación del archivo
    $parent_main_style_version = filemtime($parent_main_style_path);
    $parent_home_style_version = filemtime($parent_home_style_path);
    
    // Encolar estilos del tema padre con versión dinámica
    wp_enqueue_style( 
        'asap-parent-style', 
        get_template_directory_uri() . '/assets/css/main.min.css', 
        array(), 
        $parent_main_style_version
    );

    if (get_theme_mod('asap_enable_newspaper_design', false) && 
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
    
}

?>
