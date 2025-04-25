<?php
/**
 * Template Name: Al Papone Homepage
 * 
 * @package ASAP Child
 * @since 1.0.0
 */

get_header(); ?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero hero--artdeco">
        <div class="hero__content">
            <h1 class="hero__title"><?php echo get_field('hero_title') ?: 'Al Papone'; ?></h1>
            <p class="hero__subtitle"><?php echo get_field('hero_subtitle') ?: 'Gourmet baked potatoes served late'; ?></p>
            <div class="hero__hours">
                <h2 class="hours__title">Horario de Apertura</h2>
                <p class="hours__text"><?php echo get_field('opening_hours') ?: 'Jueves - Domingo, 19:00 - 02:00'; ?></p>
            </div>
            <div class="hero__cta">
                <a href="<?php echo get_field('order_button_link') ?: '#menu'; ?>" class="btn btn--gold"><?php echo get_field('order_button_text') ?: 'Hacer Pedido'; ?></a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about about--artdeco">
        <div class="about__content">
            <h2 class="section-title section-title--gold"><?php echo get_field('about_title') ?: 'Nuestra Historia'; ?></h2>
            <div class="about__text">
                <?php echo get_field('about_text') ?: 'Al Papone ofrece patatas gourmet servidas hasta altas horas de la noche. Una fusión de comida reconfortante tradicional con ingredientes de alta calidad.'; ?>
            </div>
            <div class="about__location">
                <h3 class="location__title">Ubicación</h3>
                <p class="location__address"><?php echo get_field('address') ?: 'C. Pintor López Mezquita 20, Pedro Antonio, Granada'; ?></p>
                <p class="location__phone"><?php echo get_field('phone') ?: '+34 123 456 789'; ?></p>
            </div>
        </div>
    </section>

    <!-- Menu Section -->
    <section id="menu" class="menu menu--artdeco">
        <h2 class="section-title section-title--gold"><?php echo get_field('menu_title') ?: 'Nuestro Menú'; ?></h2>
        <div class="menu__categories">
            <?php
            // Check if ACF is active and the field exists
            if (function_exists('get_field') && have_rows('menu_categories')):
                while (have_rows('menu_categories')) : the_row();
                    $category_title = get_sub_field('category_title');
                    $category_description = get_sub_field('category_description');
                    ?>
                    <div class="menu__category">
                        <h3 class="category__title"><?php echo $category_title; ?></h3>
                        <p class="category__description"><?php echo $category_description; ?></p>
                        <div class="category__items">
                            <?php
                            if (have_rows('menu_items')):
                                while (have_rows('menu_items')) : the_row();
                                    $item_name = get_sub_field('item_name');
                                    $item_description = get_sub_field('item_description');
                                    $item_price = get_sub_field('item_price');
                                    ?>
                                    <div class="menu__item">
                                        <h4 class="item__name"><?php echo $item_name; ?></h4>
                                        <p class="item__description"><?php echo $item_description; ?></p>
                                        <p class="item__price"><?php echo $item_price; ?>€</p>
                                    </div>
                                <?php
                                endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
                <?php
                endwhile;
            else:
                // Fallback content if ACF is not active or no fields are set
                ?>
                <div class="menu__category">
                    <h3 class="category__title">Patatas Clásicas</h3>
                    <p class="category__description">Nuestras patatas horneadas con los mejores ingredientes</p>
                    <div class="category__items">
                        <div class="menu__item">
                            <h4 class="item__name">La Original</h4>
                            <p class="item__description">Patata horneada con mantequilla, queso cheddar y bacon</p>
                            <p class="item__price">5.50€</p>
                        </div>
                        <div class="menu__item">
                            <h4 class="item__name">La Capone</h4>
                            <p class="item__description">Patata horneada con salsa de trufa, queso parmesano y champiñones</p>
                            <p class="item__price">6.50€</p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Order Section -->
    <section class="order order--artdeco">
        <h2 class="section-title section-title--gold"><?php echo get_field('order_title') ?: 'Hacer Pedido'; ?></h2>
        <div class="order__options">
            <div class="order__option order__option--primary">
                <h3 class="option__title"><?php echo get_field('pickup_title') ?: 'Recoger en Tienda'; ?></h3>
                <p class="option__description"><?php echo get_field('pickup_description') ?: 'La forma más rápida de disfrutar de nuestras patatas gourmet'; ?></p>
                <a href="<?php echo get_field('pickup_button_link') ?: '#'; ?>" class="btn btn--gold"><?php echo get_field('pickup_button_text') ?: 'Recoger Ahora'; ?></a>
            </div>
            <div class="order__option order__option--secondary">
                <h3 class="option__title"><?php echo get_field('delivery_title') ?: 'Pedido a Domicilio'; ?></h3>
                <p class="option__description"><?php echo get_field('delivery_description') ?: 'Disponible a través de nuestros partners'; ?></p>
                <div class="delivery__partners">
                    <span class="partner">Glovo</span>
                    <span class="partner">JustEat</span>
                    <span class="partner">UberEats</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials testimonials--artdeco">
        <h2 class="section-title section-title--gold"><?php echo get_field('testimonials_title') ?: 'Lo Que Dicen Nuestros Clientes'; ?></h2>
        <div class="testimonials__slider">
            <?php
            // Check if ACF is active and the field exists
            if (function_exists('get_field') && have_rows('testimonials')):
                while (have_rows('testimonials')) : the_row();
                    $testimonial_text = get_sub_field('testimonial_text');
                    $testimonial_author = get_sub_field('testimonial_author');
                    ?>
                    <div class="testimonial">
                        <p class="testimonial__text"><?php echo $testimonial_text; ?></p>
                        <p class="testimonial__author"><?php echo $testimonial_author; ?></p>
                    </div>
                <?php
                endwhile;
            else:
                // Fallback content if ACF is not active or no fields are set
                ?>
                <div class="testimonial">
                    <p class="testimonial__text">"Las mejores patatas que he probado en Granada. Perfectas para después de una noche de fiesta."</p>
                    <p class="testimonial__author">- María G.</p>
                </div>
                <div class="testimonial">
                    <p class="testimonial__text">"La combinación de ingredientes es increíble. Nunca pensé que una patata pudiera ser tan gourmet."</p>
                    <p class="testimonial__author">- Carlos R.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact contact--artdeco">
        <h2 class="section-title section-title--gold"><?php echo get_field('contact_title') ?: 'Contacto'; ?></h2>
        <div class="contact__info">
            <div class="contact__item">
                <h3 class="contact__label">Dirección</h3>
                <p class="contact__value"><?php echo get_field('address') ?: 'C. Pintor López Mezquita 20, Pedro Antonio, Granada'; ?></p>
            </div>
            <div class="contact__item">
                <h3 class="contact__label">Teléfono</h3>
                <p class="contact__value"><?php echo get_field('phone') ?: '+34 123 456 789'; ?></p>
            </div>
            <div class="contact__item">
                <h3 class="contact__label">Horario</h3>
                <p class="contact__value"><?php echo get_field('opening_hours') ?: 'Jueves - Domingo, 19:00 - 02:00'; ?></p>
            </div>
        </div>
        <div class="contact__map">
            <!-- Add Google Maps embed code here if needed -->
        </div>
    </section>
</main>

<?php get_footer(); ?> 