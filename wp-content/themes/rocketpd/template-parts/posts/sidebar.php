<?php
/**
 * Single post sidebar.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$post_id       = get_the_ID();
$topic         = rocketpd_post_get_topic( $post_id );
$related_items = rocketpd_post_get_related_resources( 3, $post_id );
$cta_enabled   = rocketpd_post_field( 'sidebar_cta_enabled', true, $post_id );
$cta_title     = rocketpd_post_field( 'sidebar_cta_title', __( 'Join the RocketPD Community', 'rocketpd' ), $post_id );
$cta_body      = rocketpd_post_field( 'sidebar_cta_body', __( 'Get practical, expert-led K-12 professional learning delivered the way educators actually learn.', 'rocketpd' ), $post_id );
$cta_label     = rocketpd_post_field( 'sidebar_cta_label', __( 'Join Free', 'rocketpd' ), $post_id );
$cta_url       = rocketpd_post_field( 'sidebar_cta_url', rocketpd_post_get_community_url(), $post_id );

if ( ! $topic && empty( $related_items ) && ! $cta_enabled ) {
	return;
}
?>

<aside class="rpd-post-sidebar" aria-label="<?php esc_attr_e( 'Article sidebar', 'rocketpd' ); ?>">
	<?php if ( $topic ) : ?>
		<section class="rpd-post-side-card">
			<h2><?php esc_html_e( 'Article Topic', 'rocketpd' ); ?></h2>
			<a class="rpd-post-topic-chip" href="<?php echo esc_url( get_term_link( $topic ) ); ?>">
				<?php echo rocketpd_get_icon( 'tag', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<?php echo esc_html( $topic->name ); ?>
			</a>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $related_items ) ) : ?>
		<section class="rpd-post-side-card">
			<h2><?php esc_html_e( 'Related Resources', 'rocketpd' ); ?></h2>
			<ul class="rpd-post-side-resources">
				<?php foreach ( $related_items as $related_post ) : ?>
					<?php $card = rocketpd_post_get_resource_card( $related_post ); ?>
					<li>
						<a href="<?php echo esc_url( $card['url'] ); ?>">
							<span class="rpd-post-resource-icon" style="--rpd-resource-color: <?php echo esc_attr( $card['color'] ); ?>">
								<?php echo rocketpd_get_icon( 'book-open', 18 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</span>
							<span>
								<strong><?php echo esc_html( $card['title'] ); ?></strong>
								<em><?php echo esc_html( $card['meta'] ); ?></em>
							</span>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</section>
	<?php endif; ?>

	<?php if ( $cta_enabled && $cta_title && $cta_label && $cta_url ) : ?>
		<section class="rpd-post-side-card rpd-post-side-card--cta">
			<h2><?php echo esc_html( $cta_title ); ?></h2>
			<?php if ( $cta_body ) : ?>
				<p><?php echo esc_html( $cta_body ); ?></p>
			<?php endif; ?>
			<a class="rpd-post-btn rpd-post-btn--gold rpd-post-btn--full" href="<?php echo esc_url( $cta_url ); ?>">
				<?php echo esc_html( $cta_label ); ?>
				<?php echo rocketpd_get_icon( 'arrow-right', 15 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</a>
		</section>
	<?php endif; ?>
</aside>
