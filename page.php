<?php
/**
 * The template for displaying all pages
 *
 * @package asap-child
 */

get_header(); ?>

<main id="primary" class="site-main">
	<?php
	while (have_posts()) :
		the_post();
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<div class="container">
					<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
				</div>
			</header>

			<div class="entry-content">
				<div class="container">
					<?php
					the_content();

					wp_link_pages(array(
						'before' => '<div class="page-links">' . esc_html__('Pages:', 'asap-child'),
						'after'  => '</div>',
					));
					?>
				</div>
			</div>
		</article>

	<?php endwhile; ?>
</main>

<?php
get_footer(); 