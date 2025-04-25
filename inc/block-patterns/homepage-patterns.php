<?php
/**
 * Custom Block Patterns for Homepage
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
        
        // Hero Section Pattern
        register_block_pattern(
            'asap-child/hero-section',
            array(
                'title'       => __('Hero Section', 'asap-child'),
                'description' => __('A hero section with heading, text and button', 'asap-child'),
                'content'     => '<!-- wp:group {"className":"hero-section","layout":{"type":"constrained"}} -->
<div class="wp-block-group hero-section"><!-- wp:heading {"level":1,"className":"hero-title"} -->
<h1 class="hero-title">Welcome to Our Site</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"hero-text"} -->
<p class="hero-text">This is a custom hero section that you can add to any page. Edit this text to match your content.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"hero-button"} -->
<div class="wp-block-button hero-button"><a class="wp-block-button__link">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
                'categories'  => array('asap-child-patterns'),
            )
        );
        
        // Features Section Pattern
        register_block_pattern(
            'asap-child/features-section',
            array(
                'title'       => __('Features Section', 'asap-child'),
                'description' => __('A features section with three columns', 'asap-child'),
                'content'     => '<!-- wp:group {"className":"features-section","layout":{"type":"constrained"}} -->
<div class="wp-block-group features-section"><!-- wp:heading {"className":"features-title","textAlign":"center"} -->
<h2 class="features-title has-text-align-center">Our Features</h2>
<!-- /wp:heading -->

<!-- wp:columns {"className":"features-columns"} -->
<div class="wp-block-columns features-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3>Feature One</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Description of your first feature. Add details about what makes this feature special.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3>Feature Two</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Description of your second feature. Add details about what makes this feature special.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3>Feature Three</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Description of your third feature. Add details about what makes this feature special.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
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