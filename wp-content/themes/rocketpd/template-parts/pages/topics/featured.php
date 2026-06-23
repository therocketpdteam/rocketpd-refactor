<?php
/**
 * Topic Index featured topics.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$topics = function_exists( 'rocketpd_get_featured_topics' ) ? array_slice( rocketpd_get_featured_topics(), 0, 4 ) : array();
?>

<section class="rpd-topics-featured rpd-topics-section">
	<div class="rpd-container">
		<header class="rpd-topics-section__header rpd-topics-section__header--split">
			<div>
				<p class="rpd-section-header__eyebrow"><?php esc_html_e( 'Featured This Season', 'rocketpd' ); ?></p>
				<h2><?php esc_html_e( 'Topics educators are exploring right now.', 'rocketpd' ); ?></h2>
			</div>
			<a href="#gallery"><?php esc_html_e( 'See all topics', 'rocketpd' ); ?> →</a>
		</header>
		<div class="rpd-topics-featured-grid">
			<?php foreach ( $topics as $topic ) : ?>
				<?php $category = rocketpd_get_topic_category( $topic['category'] ); ?>
				<a class="rpd-topics-feature-card rpd-topic-tone--<?php echo esc_attr( $category['tone'] ); ?>" href="<?php echo esc_url( $topic['href'] ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Explore %s topic hub', 'rocketpd' ), $topic['title'] ) ); ?>">
					<div class="rpd-topics-feature-card__visual" aria-hidden="true">
						<?php echo rocketpd_topic_icon_svg( $topic['icon'], 'rpd-topics-icon' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
					<div class="rpd-topics-feature-card__body">
						<p class="rpd-topics-category-pill"><?php echo esc_html( $category['label'] ); ?></p>
						<h3><?php echo esc_html( $topic['title'] ); ?></h3>
						<p><?php echo esc_html( $topic['description'] ); ?></p>
					</div>
					<footer>
						<div class="rpd-topics-feature-card__stats">
							<?php echo rocketpd_get_icon( 'file-text', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							<span><?php echo esc_html( $topic['resources'] ); ?> <?php esc_html_e( 'resources', 'rocketpd' ); ?></span>
							<span aria-hidden="true">·</span>
							<?php echo rocketpd_get_icon( 'calendar', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							<span><?php echo esc_html( $topic['upcoming'] ); ?> <?php esc_html_e( 'upcoming', 'rocketpd' ); ?></span>
						</div>
						<strong><?php esc_html_e( 'Explore Topic', 'rocketpd' ); ?> →</strong>
					</footer>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
