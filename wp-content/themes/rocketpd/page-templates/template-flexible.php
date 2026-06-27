<?php
/**
 * Template Name: RocketPD Flexible Page
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();

	$sections = get_field( 'rpd_flex_sections' );
	?>
	<main id="primary" class="rpd-site-main rpd-flex-page">
		<?php if ( $sections ) : ?>
			<?php foreach ( $sections as $section ) : ?>
				<?php
				$layout = $section['acf_fc_layout'];
				get_template_part(
					'template-parts/pages/flexible/' . $layout,
					null,
					$section
				);
				?>
			<?php endforeach; ?>
		<?php endif; ?>
	</main>
	<?php
endwhile;

get_footer();
