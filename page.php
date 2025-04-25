<?php
/**
 * The template for displaying all single pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package alpapone-child
 */

get_header(); ?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php // SECTION: Page Header ?>
				<header class="entry-header alignwide section-padding bg--light">
					<div class="container">
						<?php the_title( '<h1 class="entry-title heading--josefin">', '</h1>' ); ?>
					</div>
				</header><!-- .entry-header -->

				<?php // SECTION: Page Content ?>
				<div class="entry-content section-padding">
					<div class="container content-container <?php echo ( is_active_sidebar( 'sidebar-1' ) ? 'has-sidebar' : 'no-sidebar' ); ?>">
						<div class="main-content">
							<?php
							the_content();

							wp_link_pages(
								array(
									'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'alpapone-child' ) . '">',
									'after'    => '</nav>',
									/* translators: %: Page number. */
									'pagelink' => esc_html__( 'Page %', 'alpapone-child' ),
								)
							);
							?>
						</div><?php //.main-content ?>

						<?php // Optional Sidebar - Check if a sidebar is active and display it ?>
						<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
							<aside id="secondary" class="widget-area">
								<?php dynamic_sidebar( 'sidebar-1' ); ?>
							</aside><!-- #secondary -->
						<?php endif; ?>

					</div><?php // .container.content-container ?>
				</div><!-- .entry-content -->

				<?php // SECTION: Call to Action Banner (Optional - controlled via ACF) ?>
				<?php
				$show_cta = get_field( 'show_cta_banner' ); // ACF True/False field
				if ( $show_cta && get_field( 'cta_title' ) && get_field( 'cta_button_text' ) && get_field( 'cta_button_url' ) ) :
					?>
					<section class="block block--cta full-width-section section-padding bg--deco-pattern text-center">
						<div class="container">
							<h2 class="cta__title heading--josefin"><?php the_field( 'cta_title' ); ?></h2>
							<?php if ( get_field( 'cta_description' ) ) : ?>
								<p class="cta__description"><?php the_field( 'cta_description' ); ?></p>
							<?php endif; ?>
							<a href="<?php echo esc_url( get_field( 'cta_button_url' ) ); ?>" class="btn btn--gold"><?php the_field( 'cta_button_text' ); ?></a>
						</div>
					</section>
				<?php endif; ?>

				<?php // Standard Edit Link - useful for admins ?>
				<?php if ( get_edit_post_link() ) : ?>
					<footer class="entry-footer default-max-width">
						<div class="container">
							<?php
							edit_post_link(
									sprintf(
										/* translators: %s: Name of current post. Only visible to screen readers. */
										esc_html__( 'Edit %s', 'alpapone-child' ),
										'<span class="screen-reader-text">' . get_the_title() . '</span>'
									),
									'<span class="edit-link">',
									'</span>'
								);
							?>
						</div>
					</footer><!-- .entry-footer -->
				<?php endif; ?>

			</article><!-- #post-<?php the_ID(); ?> -->

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			?>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->

<?php
get_footer(); 