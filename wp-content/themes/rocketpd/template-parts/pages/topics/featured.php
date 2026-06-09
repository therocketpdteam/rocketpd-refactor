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
				<p class="rpd-topics-kicker"><?php esc_html_e( 'Featured This Season', 'rocketpd' ); ?></p>
				<h2><?php esc_html_e( 'Topics educators are exploring right now.', 'rocketpd' ); ?></h2>
			</div>
			<a href="#gallery"><?php esc_html_e( 'See all topics', 'rocketpd' ); ?> <span aria-hidden="true">-&gt;</span></a>
		</header>
		<div class="rpd-topics-featured-grid">
			<?php foreach ( $topics as $topic ) : ?>
				<?php $category = rocketpd_get_topic_category( $topic['category'] ); ?>
				<a class="rpd-topics-feature-card rpd-topic-tone--<?php echo esc_attr( $category['tone'] ); ?>" href="<?php echo esc_url( $topic['href'] ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Explore %s topic hub', 'rocketpd' ), $topic['title'] ) ); ?>">
					<div class="rpd-topics-feature-card__visual" aria-hidden="true">
						<?php echo rocketpd_topic_icon_svg( $topic['icon'], 'rpd-topics-icon' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<span><?php esc_html_e( 'Featured Topic', 'rocketpd' ); ?></span>
					</div>
					<div class="rpd-topics-feature-card__body">
						<h3><?php echo esc_html( $topic['title'] ); ?></h3>
						<p class="rpd-topics-category-pill"><?php echo esc_html( $category['label'] ); ?></p>
						<p><?php echo esc_html( $topic['description'] ); ?></p>
					</div>
					<footer>
						<span><?php echo esc_html( $topic['resources'] ); ?> <?php esc_html_e( 'resources', 'rocketpd' ); ?></span>
						<span><?php echo esc_html( $topic['upcoming'] ); ?> <?php esc_html_e( 'upcoming', 'rocketpd' ); ?></span>
						<strong><?php esc_html_e( 'Explore Topic', 'rocketpd' ); ?> <span aria-hidden="true">-&gt;</span></strong>
					</footer>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
