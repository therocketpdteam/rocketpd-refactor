<?php
/**
 * Category archive template.
 *
 * Renders a card grid of posts in the current category.
 * Uses template-parts/archive/blog-card.php for each post.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$cat = get_queried_object();
?>

<main id="primary" class="rpd-site-main rpd-blog-archive-page">

	<header class="rpd-blog-archive-hero">
		<div class="rpd-container">
			<p class="rpd-blog-archive-hero__label"><?php esc_html_e( 'Category', 'rocketpd' ); ?></p>
			<h1 class="rpd-blog-archive-hero__title"><?php echo esc_html( single_cat_title( '', false ) ); ?></h1>
		</div>
	</header>

	<div class="rpd-blog-archive-body rpd-container">

		<?php if ( have_posts() ) : ?>

			<div class="rpd-blog-archive-grid">
				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'template-parts/archive/blog-card' );
				}
				?>
			</div>

			<nav class="rpd-blog-archive-pagination" aria-label="<?php esc_attr_e( 'Posts navigation', 'rocketpd' ); ?>">
				<?php
				the_posts_pagination(
					array(
						'mid_size'  => 2,
						'prev_text' => '← ' . __( 'Previous', 'rocketpd' ),
						'next_text' => __( 'Next', 'rocketpd' ) . ' →',
					)
				);
				?>
			</nav>

		<?php else : ?>

			<p class="rpd-blog-archive-empty"><?php esc_html_e( 'No posts found in this category.', 'rocketpd' ); ?></p>

		<?php endif; ?>

	</div>

</main>

<?php
get_footer();
