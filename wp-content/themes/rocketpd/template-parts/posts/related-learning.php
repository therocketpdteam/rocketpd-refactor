<?php
/**
 * Related learning cards.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$related_items = rocketpd_post_get_related_resources( 3 );

if ( empty( $related_items ) ) {
	return;
}
?>

<section class="rpd-post-related" aria-labelledby="rpd-post-related-title">
	<div class="rpd-post-container">
		<div class="rpd-post-section-head">
			<div>
				<p><?php esc_html_e( 'Keep Learning', 'rocketpd' ); ?></p>
				<h2 id="rpd-post-related-title"><?php esc_html_e( 'Related RocketPD learning', 'rocketpd' ); ?></h2>
			</div>
			<a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ?: home_url( '/blog/' ) ); ?>">
				<?php esc_html_e( 'Browse all resources', 'rocketpd' ); ?>
				<?php echo rocketpd_get_icon( 'arrow-right', 15 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</a>
		</div>

		<div class="rpd-post-related__grid">
			<?php foreach ( $related_items as $related_post ) : ?>
				<?php $card = rocketpd_post_get_resource_card( $related_post ); ?>
				<article class="rpd-post-related-card" style="--rpd-resource-color: <?php echo esc_attr( $card['color'] ); ?>">
					<span class="rpd-post-related-card__type">
						<?php echo rocketpd_get_icon( 'book-open', 13 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<?php echo esc_html( $card['type'] ); ?>
					</span>
					<h3><a href="<?php echo esc_url( $card['url'] ); ?>"><?php echo esc_html( $card['title'] ); ?></a></h3>
					<p><?php echo esc_html( $card['meta'] ); ?></p>
					<a class="rpd-post-related-card__link" href="<?php echo esc_url( $card['url'] ); ?>">
						<?php esc_html_e( 'Learn more', 'rocketpd' ); ?>
						<?php echo rocketpd_get_icon( 'arrow-right', 15 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</a>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
