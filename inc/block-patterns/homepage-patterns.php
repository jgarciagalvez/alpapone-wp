<?php
/**
 * Custom Block Patterns for Al Papone Homepage
 * 
 * @package ASAP Child
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Register custom block patterns
 */
function asap_child_register_block_patterns() {
    // Only register patterns if block patterns are supported
    if (function_exists('register_block_pattern')) {
        
        // --- Al Papone Hero Section Pattern ---
        register_block_pattern(
            'asap-child/alpapone-hero-section',
            array(
                'title'       => __('Al Papone Hero Section', 'asap-child'),
                'description' => __('Art Deco hero section with title, subtitle, hours, and CTA.', 'asap-child'),
                'content'     => '<!-- wp:group {"className":"hero hero--artdeco","layout":{"type":"constrained"}} -->
<div class="wp-block-group hero hero--artdeco"><!-- wp:group {"className":"hero__content"} -->
<div class="wp-block-group hero__content"><!-- wp:heading {"level":1,"className":"hero__title"} -->
<h1 class="hero__title">' . (function_exists('get_field') ? esc_html(get_field('hero_title')) : 'Al Papone') . '</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"hero__subtitle"} -->
<p class="hero__subtitle">' . (function_exists('get_field') ? esc_html(get_field('hero_subtitle')) : 'Gourmet baked potatoes served late') . '</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"hero__hours"} -->
<div class="wp-block-group hero__hours"><!-- wp:heading {"level":2,"className":"hours__title"} -->
<h2 class="hours__title">Horario de Apertura</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"hours__text"} -->
<p class="hours__text">' . (function_exists('get_field') ? esc_html(get_field('opening_hours')) : 'Jueves - Domingo, 19:00 - 02:00') . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"hero__cta"} -->
<div class="wp-block-group hero__cta"><!-- wp:button {"className":"btn btn--gold","url":"' . (function_exists('get_field') ? esc_url(get_field('order_button_link')) : '#menu') . '"} -->
<div class="wp-block-button btn btn--gold"><a class="wp-block-button__link" href="' . (function_exists('get_field') ? esc_url(get_field('order_button_link')) : '#menu') . '">' . (function_exists('get_field') ? esc_html(get_field('order_button_text')) : 'Hacer Pedido') . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
                'categories'  => array('asap-child-patterns'),
            )
        );
        
        // --- Al Papone About Section Pattern ---
        register_block_pattern(
            'asap-child/alpapone-about-section',
            array(
                'title'       => __('Al Papone About Section', 'asap-child'),
                'description' => __('Art Deco about section with text and location info.', 'asap-child'),
                'content'     => '<!-- wp:group {"className":"about about--artdeco","layout":{"type":"constrained"}} -->
<div class="wp-block-group about about--artdeco"><!-- wp:group {"className":"about__content"} -->
<div class="wp-block-group about__content"><!-- wp:heading {"level":2,"className":"section-title section-title--gold"} -->
<h2 class="section-title section-title--gold">' . (function_exists('get_field') ? esc_html(get_field('about_title')) : 'Nuestra Historia') . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"about__text"} -->
<p class="about__text">' . (function_exists('get_field') ? wp_kses_post(get_field('about_text')) : 'Al Papone ofrece patatas gourmet servidas hasta altas horas de la noche. Una fusión de comida reconfortante tradicional con ingredientes de alta calidad.') . '</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"about__location"} -->
<div class="wp-block-group about__location"><!-- wp:heading {"level":3,"className":"location__title"} -->
<h3 class="location__title">Ubicación</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"location__address"} -->
<p class="location__address">' . (function_exists('get_field') ? esc_html(get_field('address')) : 'C. Pintor López Mezquita 20, Pedro Antonio, Granada') . '</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"location__phone"} -->
<p class="location__phone">' . (function_exists('get_field') ? esc_html(get_field('phone')) : '+34 123 456 789') . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
                'categories'  => array('asap-child-patterns'),
            )
        );

        // --- Al Papone Menu Section Pattern ---
        // Note: Displaying complex loops like ACF repeaters directly in block patterns is tricky.
        // This pattern provides the structure. The dynamic content might need separate implementation 
        // (e.g., a custom block or shortcode) if ACF fields are used heavily here.
        register_block_pattern(
            'asap-child/alpapone-menu-section',
            array(
                'title'       => __('Al Papone Menu Section', 'asap-child'),
                'description' => __('Art Deco menu section structure (Add items manually or via custom block).', 'asap-child'),
                'content'     => '<!-- wp:group {"className":"menu menu--artdeco","layout":{"type":"constrained"}} -->
<div class="wp-block-group menu menu--artdeco"><!-- wp:heading {"level":2,"className":"section-title section-title--gold"} -->
<h2 class="section-title section-title--gold">Nuestro Menú</h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"menu__categories"} -->
<div class="wp-block-group menu__categories"><!-- wp:group {"className":"menu__category"} -->
<div class="wp-block-group menu__category"><!-- wp:heading {"level":3,"className":"category__title"} -->
<h3 class="category__title">Patatas Clásicas</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"category__description"} -->
<p class="category__description">Nuestras patatas horneadas con los mejores ingredientes</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"className":"category__items"} -->
<div class="wp-block-columns category__items"><!-- wp:column {"className":"menu__item"} -->
<div class="wp-block-column menu__item"><!-- wp:heading {"level":4,"className":"item__name"} -->
<h4 class="item__name">La Original</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"item__description"} -->
<p class="item__description">Patata horneada con mantequilla, queso cheddar y bacon</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"item__price"} -->
<p class="item__price">5.50€</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"menu__item"} -->
<div class="wp-block-column menu__item"><!-- wp:heading {"level":4,"className":"item__name"} -->
<h4 class="item__name">La Capone</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"item__description"} -->
<p class="item__description">Patata horneada con salsa de trufa, queso parmesano y champiñones</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"item__price"} -->
<p class="item__price">6.50€</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"menu__category"} -->
<div class="wp-block-group menu__category"><!-- wp:heading {"level":3,"className":"category__title"} -->
<h3 class="category__title">Patatas Gourmet</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"category__description"} -->
<p class="category__description">Creaciones únicas para paladares exigentes</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"className":"category__items"} -->
<div class="wp-block-columns category__items"><!-- wp:column {"className":"menu__item"} -->
<div class="wp-block-column menu__item"><!-- wp:heading {"level":4,"className":"item__name"} -->
<h4 class="item__name">La Tartufo</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"item__description"} -->
<p class="item__description">Patata, crema de trufa negra, setas salteadas, parmesano.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"item__price"} -->
<p class="item__price">7.00€</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"menu__item"} -->
<div class="wp-block-column menu__item"><!-- wp:heading {"level":4,"className":"item__name"} -->
<h4 class="item__name">La Ibérica</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"item__description"} -->
<p class="item__description">Patata, jamón ibérico, salmorejo, huevo rallado.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"item__price"} -->
<p class="item__price">7.50€</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
                'categories'  => array('asap-child-patterns'),
            )
        );

        // --- Al Papone Order Section Pattern ---
        register_block_pattern(
            'asap-child/alpapone-order-section',
            array(
                'title'       => __('Al Papone Order Section', 'asap-child'),
                'description' => __('Art Deco order section emphasizing pickup, with delivery info.', 'asap-child'),
                'content'     => '<!-- wp:group {"className":"order order--artdeco","layout":{"type":"constrained"}} -->
<div class="wp-block-group order order--artdeco"><!-- wp:heading {"level":2,"className":"section-title section-title--gold"} -->
<h2 class="section-title section-title--gold">' . (function_exists('get_field') ? esc_html(get_field('order_title')) : 'Hacer Pedido') . '</h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"order__options"} -->
<div class="wp-block-group order__options"><!-- wp:group {"className":"order__option order__option--primary"} -->
<div class="wp-block-group order__option order__option--primary"><!-- wp:heading {"level":3,"className":"option__title"} -->
<h3 class="option__title">' . (function_exists('get_field') ? esc_html(get_field('pickup_title')) : 'Recoger en Tienda') . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"option__description"} -->
<p class="option__description">' . (function_exists('get_field') ? esc_html(get_field('pickup_description')) : 'La forma más rápida de disfrutar de nuestras patatas gourmet') . '</p>
<!-- /wp:paragraph -->

<!-- wp:button {"className":"btn btn--gold","url":"' . (function_exists('get_field') ? esc_url(get_field('pickup_button_link')) : '#') . '"} -->
<div class="wp-block-button btn btn--gold"><a class="wp-block-button__link" href="' . (function_exists('get_field') ? esc_url(get_field('pickup_button_link')) : '#') . '">' . (function_exists('get_field') ? esc_html(get_field('pickup_button_text')) : 'Recoger Ahora') . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"order__option order__option--secondary"} -->
<div class="wp-block-group order__option order__option--secondary"><!-- wp:heading {"level":3,"className":"option__title"} -->
<h3 class="option__title">' . (function_exists('get_field') ? esc_html(get_field('delivery_title')) : 'Pedido a Domicilio') . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"option__description"} -->
<p class="option__description">' . (function_exists('get_field') ? esc_html(get_field('delivery_description')) : 'Disponible a través de nuestros partners') . '</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"delivery__partners"} -->
<div class="wp-block-group delivery__partners"><!-- wp:paragraph {"className":"partner"} -->
<p class="partner">Glovo</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"partner"} -->
<p class="partner">JustEat</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"partner"} -->
<p class="partner">UberEats</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
                'categories'  => array('asap-child-patterns'),
            )
        );

        // --- Al Papone Testimonials Section Pattern ---
        // Note: Similar to Menu, dynamic testimonials are best handled via custom block/shortcode or 
        // by manually adding Testimonial blocks within this pattern structure.
        register_block_pattern(
            'asap-child/alpapone-testimonials-section',
            array(
                'title'       => __('Al Papone Testimonials Section', 'asap-child'),
                'description' => __('Art Deco testimonials section structure (Add testimonials manually).', 'asap-child'),
                'content'     => '<!-- wp:group {"className":"testimonials testimonials--artdeco","layout":{"type":"constrained"}} -->
<div class="wp-block-group testimonials testimonials--artdeco"><!-- wp:heading {"level":2,"className":"section-title section-title--gold"} -->
<h2 class="section-title section-title--gold">Lo Que Dicen Nuestros Clientes</h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"testimonials__slider"} -->
<div class="wp-block-group testimonials__slider"><!-- wp:group {"className":"testimonial"} -->
<div class="wp-block-group testimonial"><!-- wp:paragraph {"className":"testimonial__text"} -->
<p class="testimonial__text">"Las mejores patatas que he probado en Granada. Perfectas para después de una noche de fiesta."</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial__author"} -->
<p class="testimonial__author">- María G.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"testimonial"} -->
<div class="wp-block-group testimonial"><!-- wp:paragraph {"className":"testimonial__text"} -->
<p class="testimonial__text">"La combinación de ingredientes es increíble. Nunca pensé que una patata pudiera ser tan gourmet."</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial__author"} -->
<p class="testimonial__author">- Carlos R.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
                'categories'  => array('asap-child-patterns'),
            )
        );

        // --- Al Papone Contact Section Pattern ---
        register_block_pattern(
            'asap-child/alpapone-contact-section',
            array(
                'title'       => __('Al Papone Contact Section', 'asap-child'),
                'description' => __('Art Deco contact section with address, phone, hours, and map placeholder.', 'asap-child'),
                'content'     => '<!-- wp:group {"className":"contact contact--artdeco","layout":{"type":"constrained"}} -->
<div class="wp-block-group contact contact--artdeco"><!-- wp:heading {"level":2,"className":"section-title section-title--gold"} -->
<h2 class="section-title section-title--gold">' . (function_exists('get_field') ? esc_html(get_field('contact_title')) : 'Contacto') . '</h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"contact__info"} -->
<div class="wp-block-group contact__info"><!-- wp:group {"className":"contact__item"} -->
<div class="wp-block-group contact__item"><!-- wp:heading {"level":3,"className":"contact__label"} -->
<h3 class="contact__label">Dirección</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"contact__value"} -->
<p class="contact__value">' . (function_exists('get_field') ? esc_html(get_field('address')) : 'C. Pintor López Mezquita 20, Pedro Antonio, Granada') . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"contact__item"} -->
<div class="wp-block-group contact__item"><!-- wp:heading {"level":3,"className":"contact__label"} -->
<h3 class="contact__label">Teléfono</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"contact__value"} -->
<p class="contact__value">' . (function_exists('get_field') ? esc_html(get_field('phone')) : '+34 123 456 789') . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"contact__item"} -->
<div class="wp-block-group contact__item"><!-- wp:heading {"level":3,"className":"contact__label"} -->
<h3 class="contact__label">Horario</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"contact__value"} -->
<p class="contact__value">' . (function_exists('get_field') ? esc_html(get_field('opening_hours')) : 'Jueves - Domingo, 19:00 - 02:00') . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"contact__map"} -->
<div class="wp-block-group contact__map"><!-- wp:paragraph -->
<p>Aquí iría el mapa de Google Maps (Incrustar)</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
                'categories'  => array('asap-child-patterns'),
            )
        );
    }
}
add_action('init', 'asap_child_register_block_patterns');

/**
 * Register custom block pattern category
 */
function asap_child_register_block_pattern_categories() {
    if (function_exists('register_block_pattern_category')) {
        register_block_pattern_category(
            'asap-child-patterns',
            array('label' => __('ASAP Child Patterns', 'asap-child'))
        );
    }
}
add_action('init', 'asap_child_register_block_pattern_categories'); 