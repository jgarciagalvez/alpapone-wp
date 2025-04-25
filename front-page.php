<?php
/**
 * The template for displaying the Al Papone homepage.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package alpapone-child
 */

get_header(); ?>

<main id="primary" class="site-main">

    <?php
    while ( have_posts() ) :
        the_post();
        ?>

        <?php // SECTION: Hero ?>
        <section id="hero" class="hero hero--artdeco full-width-section bg--deco-pattern">
            <div class="container">
                <?php
                $logo_id = get_field('hero_logo'); // Assuming ACF image field for logo
                if ( $logo_id ) :
                    echo wp_get_attachment_image( $logo_id, 'full', false, ['class' => 'hero__logo'] );
                else : ?>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/placeholder-logo.png" alt="<?php bloginfo( 'name' ); ?> Logo" class="hero__logo">  <?php // Placeholder ?>
                <?php endif; ?>

                <h1 class="hero__tagline heading--josefin"><?php the_field('hero_tagline'); // ACF text field ?></h1>
                <?php if ( get_field('hero_button_text') && get_field('hero_button_url') ) : ?>
                    <a href="<?php echo esc_url( get_field('hero_button_url') ); ?>" class="btn btn--gold"><?php the_field('hero_button_text'); ?></a>
                <?php endif; ?>
            </div>
        </section>

        <?php // SECTION: Featured Potatoes ?>
        <section id="featured-potatoes" class="featured-potatoes section-padding">
            <div class="container">
                <h2 class="section-title heading--josefin"><?php the_field('featured_potatoes_title'); // ACF text field ?></h2>
                <?php if ( have_rows('featured_potatoes_items') ) : // Assuming ACF Repeater 'featured_potatoes_items' ?>
                    <div class="featured-potatoes__grid">
                        <?php
                        $count = 0;
                        while ( have_rows('featured_potatoes_items') && $count < 3 ) : the_row();
                            $featured_item_id = get_sub_field('potato_item'); // Assuming ACF Post Object or Relationship field
                            if( $featured_item_id ):
                                $post = get_post($featured_item_id);
                                setup_postdata($post);
                                ?>
                                <article class="potato-item">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <div class="potato-item__image">
                                            <?php the_post_thumbnail('medium_large'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <h3 class="potato-item__title heading--josefin"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="potato-item__excerpt">
                                        <?php the_excerpt(); // Or a custom field for description ?>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="btn btn--outline-gold"><?php _e('Ver Patata', 'alpapone-child'); // Basic label ?></a>
                                </article>
                                <?php
                                wp_reset_postdata();
                            endif;
                            $count++;
                        endwhile;
                        ?>
                    </div>
                <?php else : ?>
                    <p><?php _e('No featured potatoes selected yet.', 'alpapone-child'); ?></p>
                <?php endif; ?>
            </div>
        </section>

        <?php // SECTION: How It Works ?>
        <section id="how-it-works" class="how-it-works section-padding bg--light">
            <div class="container">
                <h2 class="section-title heading--josefin"><?php the_field('how_it_works_title'); // ACF text field ?></h2>
                <div class="how-it-works__columns">
                    <div class="how-it-works__column">
                        <h3 class="heading--josefin"><?php the_field('pickup_title'); // ACF text field ?></h3>
                        <p><?php the_field('pickup_description'); // ACF textarea field ?></p>
                    </div>
                    <div class="how-it-works__column">
                        <h3 class="heading--josefin"><?php the_field('delivery_title'); // ACF text field ?></h3>
                        <p><?php the_field('delivery_description'); // ACF textarea field ?></p>
                    </div>
                </div>
            </div>
        </section>

        <?php // SECTION: Testimonials ?>
        <section id="testimonials" class="testimonials section-padding">
            <div class="container">
                <h2 class="section-title heading--josefin"><?php the_field('testimonials_title'); // ACF text field ?></h2>
                 <?php
                // Option 1: Use a template part for individual testimonials (e.g., if using a CPT)
                // get_template_part('template-parts/testimonial-slider');

                // Option 2: Use an ACF Repeater field
                if ( have_rows('testimonials') ) : ?>
                    <div class="testimonial-slider"> <?php // Add slider JS/CSS classes as needed ?>
                        <?php while ( have_rows('testimonials') ) : the_row(); ?>
                            <blockquote class="testimonial">
                                <p class="testimonial__text">"<?php the_sub_field('testimonial_quote'); ?>"</p>
                                <cite class="testimonial__author"><?php the_sub_field('testimonial_author'); ?></cite>
                            </blockquote>
                        <?php endwhile; ?>
                    </div>
                <?php else : ?>
                    <p><?php _e('No testimonials added yet.', 'alpapone-child'); ?></p>
                <?php endif; ?>
            </div>
        </section>

        <?php // SECTION: Page Content (Optional - if you want standard WP content on homepage) ?>
        <section class="page-content section-padding">
             <div class="container">
                 <?php // the_content(); // Uncomment if needed ?>
             </div>
        </section>


    <?php endwhile; // End of the loop. ?>

</main><!-- #main -->

<?php
get_footer(); 