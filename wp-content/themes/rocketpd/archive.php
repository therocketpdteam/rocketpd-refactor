<?php
/**
 * Default archive template.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="rpd-site-main">
	<div class="rpd-container rpd-section">
		<?php if ( have_posts() ) : ?>
			<header class="rpd-section-header">
				<?php the_archive_title( '<h1 class="rpd-section-header__title">', '</h1>' ); ?>
				<?php the_archive_description( '<div class="rpd-section-header__body">', '</div>' ); ?>
			</header>

			<?php
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			}
			?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
