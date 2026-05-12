<?php
/**
 * Default single template.
 *
 * @package RocketPD
 */

get_header();
?>

<main id="primary" class="rpd-site-main">
	<div class="rpd-container rpd-section">
		<?php
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content', get_post_type() );
		}
		?>
	</div>
</main>

<?php
get_footer();

