<?php
/**
 * Main template file.
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
