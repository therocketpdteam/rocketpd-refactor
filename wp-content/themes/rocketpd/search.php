<?php
/**
 * Search results template.
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
		<header class="rpd-section-header">
			<h1 class="rpd-section-header__title">
				<?php
				printf(
					/* translators: %s: search query. */
					esc_html__( 'Search results for: %s', 'rocketpd' ),
					esc_html( get_search_query() )
				);
				?>
			</h1>
		</header>

		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			}
		} else {
			get_template_part( 'template-parts/content', 'none' );
		}
		?>
	</div>
</main>

<?php
get_footer();
