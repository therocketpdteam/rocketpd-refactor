<?php
/**
 * Default page template.
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
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content', 'page' );
		}
		?>
	</div>
</main>

<?php
get_footer();
