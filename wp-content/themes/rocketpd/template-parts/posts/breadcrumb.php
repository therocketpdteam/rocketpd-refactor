<?php
/**
 * Single post breadcrumb.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<nav class="rpd-post-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rocketpd' ); ?>">
	<div class="rpd-post-container">
		<ol class="rpd-post-breadcrumb__list">
			<li>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'RocketPD', 'rocketpd' ); ?></a>
			</li>
			<li>
				<a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ?: home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Blog', 'rocketpd' ); ?></a>
			</li>
			<li aria-current="page">
				<span><?php echo esc_html( get_the_title() ); ?></span>
			</li>
		</ol>
	</div>
</nav>
