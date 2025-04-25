<?php
/**
 * The template for displaying the homepage
 *
 * @package asap-child
 */

get_header(); ?>

<main id="primary" class="site-main home-page">
    <div class="hero-section">
        <div class="container">
            <h1><?php echo get_bloginfo('name'); ?></h1>
            <p class="tagline"><?php echo get_bloginfo('description'); ?></p>
        </div>
    </div>

    <div class="main-content">
        <div class="container">
            <?php
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?> 