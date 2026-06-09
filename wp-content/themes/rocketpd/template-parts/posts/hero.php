<?php
/**
 * Single post hero.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$post_id      = get_the_ID();
$topic        = rocketpd_post_get_topic( $post_id );
$dek          = rocketpd_post_field( 'dek', get_the_excerpt(), $post_id );
$hero_style   = rocketpd_post_field( 'hero_style', 'default', $post_id );
$hero_image   = rocketpd_post_get_hero_image( $post_id );
$reading_time = rocketpd_post_get_reading_time( $post_id );
$share_url    = add_query_arg(
	array(
		'share' => 'rocketpd',
	),
	get_permalink()
);
?>

<section class="rpd-post-hero rpd-post-hero--<?php echo esc_attr( sanitize_html_class( $hero_style ) ); ?>">
	<div class="rpd-post-hero__orb rpd-post-hero__orb--right" aria-hidden="true"></div>
	<div class="rpd-post-hero__orb rpd-post-hero__orb--left" aria-hidden="true"></div>
	<div class="rpd-post-container">
		<div class="rpd-post-hero__grid">
			<div class="rpd-post-hero__copy">
				<div class="rpd-post-hero__pills">
					<?php if ( $topic ) : ?>
						<a class="rpd-post-pill rpd-post-pill--topic" href="<?php echo esc_url( get_term_link( $topic ) ); ?>">
							<span aria-hidden="true"></span>
							<?php echo esc_html( $topic->name ); ?>
						</a>
					<?php endif; ?>
					<span class="rpd-post-pill rpd-post-pill--format"><?php esc_html_e( 'Article', 'rocketpd' ); ?></span>
				</div>

				<h1 class="rpd-post-hero__title"><?php echo esc_html( get_the_title() ); ?></h1>

				<?php if ( $dek ) : ?>
					<p class="rpd-post-hero__dek"><?php echo esc_html( $dek ); ?></p>
				<?php endif; ?>

				<div class="rpd-post-hero__meta">
					<span class="rpd-post-hero__author">
						<span class="rpd-post-hero__avatar"><?php echo rocketpd_get_icon( 'users', 16 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
						<?php echo esc_html( get_the_author() ); ?>
					</span>
					<span><?php echo rocketpd_get_icon( 'calendar', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></span>
					<span><?php echo rocketpd_get_icon( 'clock', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><?php echo esc_html( $reading_time ); ?></span>
					<a href="<?php echo esc_url( $share_url ); ?>"><?php echo rocketpd_get_icon( 'send', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><?php esc_html_e( 'Share', 'rocketpd' ); ?></a>
				</div>
			</div>

			<?php if ( 'no-image' !== $hero_style ) : ?>
				<div class="rpd-post-hero__visual">
					<div class="rpd-post-hero__media">
						<?php
						if ( $hero_image['html'] ) {
							echo $hero_image['html']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						} else {
							?>
							<div class="rpd-post-hero__placeholder" aria-hidden="true">
								<span><?php esc_html_e( 'Featured image', 'rocketpd' ); ?></span>
							</div>
							<?php
						}
						?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
