<?php
/**
 * Topic Index resources.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$resources = function_exists( 'rocketpd_get_topic_resources' ) ? rocketpd_get_topic_resources() : array();
?>

<section class="rpd-topics-resources rpd-topics-section">
	<div class="rpd-container">
		<header class="rpd-topics-section__header rpd-topics-section__header--split">
			<div>
				<p class="rpd-topics-kicker"><?php esc_html_e( 'Featured Across Topics', 'rocketpd' ); ?></p>
				<h2><?php esc_html_e( 'Resources educators are using this month.', 'rocketpd' ); ?></h2>
			</div>
			<a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>"><?php esc_html_e( 'Browse all resources', 'rocketpd' ); ?> <span aria-hidden="true">-&gt;</span></a>
		</header>
		<div class="rpd-topics-strip-grid">
			<?php foreach ( $resources as $resource ) : ?>
				<?php $icon = 'Podcast' === $resource['type'] ? 'chat' : ( 'Webinar' === $resource['type'] ? 'webinar' : ( 'Playbook' === $resource['type'] ? 'book' : 'file' ) ); ?>
				<a class="rpd-topics-strip-card" href="<?php echo esc_url( $resource['href'] ); ?>">
					<span class="rpd-topics-icon-shell" aria-hidden="true">
						<?php echo rocketpd_topic_icon_svg( $icon, 'rpd-topics-icon' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</span>
					<p><?php echo esc_html( $resource['type'] ); ?></p>
					<h3><?php echo esc_html( $resource['title'] ); ?></h3>
					<em><?php echo esc_html( $resource['description'] ); ?></em>
					<span><?php echo esc_html( $resource['meta'] ); ?></span>
					<footer>
						<span><?php echo esc_html( $resource['expert'] ); ?></span>
						<strong><?php echo esc_html( $resource['topic'] ); ?> <span aria-hidden="true">-&gt;</span></strong>
					</footer>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
