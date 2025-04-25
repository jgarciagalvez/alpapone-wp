<?php
/**
 * Template Name: Menu Page
 * Template Post Type: page
 *
 * The template for displaying the Al Papone menu page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package alpapone-child
 */

get_header(); ?>

<main id="primary" class="site-main">

    <?php
    while ( have_posts() ) :
        the_post();
        ?>

        <header class="page-header alignwide">
            <h1 class="page-title heading--josefin"><?php the_title(); ?></h1>
        </header><!-- .page-header -->

        <?php // SECTION: Category Filters ?>
        <section id="menu-filters" class="menu-filters section-padding bg--light">
            <div class="container">
                <h2 class="screen-reader-text"><?php _e( 'Filter Menu Items', 'alpapone-child' ); ?></h2> <?php // Hidden title for accessibility ?>
                <?php
                // Placeholder for filter logic (could use ACF, Categories, or JS)
                // Example: Manual list of categories
                // You'll likely want to generate this dynamically based on actual menu item categories.
                ?>
                <ul class="filter-list">
                    <li><button class="filter-button btn btn--outline-gold is-active" data-filter="all"><?php _e( 'Todos', 'alpapone-child' ); ?></button></li>
                    <li><button class="filter-button btn btn--outline-gold" data-filter="clasicas"><?php _e( 'Clásicas', 'alpapone-child' ); ?></button></li>
                    <li><button class="filter-button btn btn--outline-gold" data-filter="especial"><?php _e( 'Topping Especial', 'alpapone-child' ); ?></button></li>
                    <?php // Add more filters dynamically based on categories/terms ?>
                </ul>
            </div>
        </section>

        <?php // SECTION: Menu Item Grid ?>
        <section id="menu-grid" class="menu-grid section-padding">
            <div class="container">
                <?php
                // Assumes an ACF Repeater field named 'menu_items' on this page.
                // Each row in the repeater should have fields like: 'item_image', 'item_title', 'item_price', 'item_category' (for filtering), 'item_description'
                if ( have_rows('menu_items') ) :
                    ?>
                    <div class="menu-items-container"> <?php // Container for grid items, useful for JS filtering ?>
                        <?php
                        while ( have_rows('menu_items') ) : the_row();
                            // Get sub field values
                            $image = get_sub_field('item_image'); // ACF Image field (ID or Array)
                            $title = get_sub_field('item_title'); // ACF Text field
                            $price = get_sub_field('item_price'); // ACF Text or Number field
                            $description = get_sub_field('item_description'); // ACF Textarea field
                            $category_slug = get_sub_field('item_category_slug'); // ACF Text field (e.g., 'clasicas', 'especial') - used for filtering
                            ?>
                            <article class="menu-item" data-category="<?php echo esc_attr($category_slug); ?>"> <?php // Add category slug for filtering ?>
                                <?php if ( $image ) : ?>
                                    <div class="menu-item__image">
                                        <?php echo wp_get_attachment_image( is_array($image) ? $image['ID'] : $image, 'medium' ); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="menu-item__content">
                                    <h3 class="menu-item__title heading--josefin"><?php echo esc_html($title); ?></h3>
                                    <?php if ($description): ?>
                                        <p class="menu-item__description"><?php echo esc_html($description); ?></p>
                                    <?php endif; ?>
                                    <p class="menu-item__price price--gold"><?php echo esc_html($price); ?></p> <?php // Add currency symbol via CSS ::before or filter ?>
                                    <button class="menu-item__add-button btn btn--gold" data-item-id="<?php echo get_the_ID(); ?>_<?php echo get_row_index(); ?>"> <?php // Unique ID for cart functionality ?>
                                        <?php _e('Añadir al carrito', 'alpapone-child'); ?>
                                    </button>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>
                    <?php
                else :
                    // No rows found
                    ?>
                    <p><?php _e('El menú está vacío por ahora. ¡Vuelve pronto!', 'alpapone-child'); ?></p>
                    <?php
                endif;
                ?>
            </div>
        </section>

        <?php // Optional: Standard page content area ?>
        <div class="entry-content section-padding">
            <div class="container">
                <?php the_content(); // Allows adding extra text/blocks below the menu grid ?>
            </div>
        </div>

    <?php endwhile; // End of the loop. ?>

</main><!-- #main -->

<?php
get_footer(); 