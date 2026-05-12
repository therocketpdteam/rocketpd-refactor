<?php
/**
 * 404 template.
 *
 * @package RocketPD
 */

get_header();
?>

<main id="primary" class="rpd-site-main">
	<div class="rpd-container rpd-section">
		<header class="rpd-section-header">
			<h1 class="rpd-section-header__title"><?php esc_html_e( 'Page not found', 'rocketpd' ); ?></h1>
			<p class="rpd-section-header__body"><?php esc_html_e( 'The page you are looking for could not be found.', 'rocketpd' ); ?></p>
		</header>
	</div>
</main>

<?php
get_footer();

