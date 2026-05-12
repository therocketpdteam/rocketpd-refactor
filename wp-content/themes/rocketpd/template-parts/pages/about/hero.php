<?php
/**
 * About hero section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_about_hero_eyebrow', __( 'About RocketPD', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_about_hero_headline', __( 'Professional learning built around the people doing the work.', 'rocketpd' ) );
$body = rocketpd_get_field( 'rpd_about_hero_body', __( 'RocketPD brings educators, school leaders, and nationally respected K-12 voices together for practical professional development that moves from ideas to implementation.', 'rocketpd' ) );
$stats = rocketpd_get_field(
	'rpd_about_hero_stats',
	array(
		array(
			'value' => __( '40K+', 'rocketpd' ),
			'label' => __( 'educators in community', 'rocketpd' ),
		),
		array(
			'value' => __( '850+', 'rocketpd' ),
			'label' => __( 'districts represented', 'rocketpd' ),
		),
		array(
			'value' => __( '48+', 'rocketpd' ),
			'label' => __( 'countries reached', 'rocketpd' ),
		),
	)
);
?>

<section class="rpd-about-hero rpd-section">
	<div class="rpd-container rpd-about-hero__grid">
		<div class="rpd-about-hero__copy">
			<p class="rpd-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h1><?php echo nl2br( esc_html( $headline ) ); ?></h1>
			<p class="rpd-lede"><?php echo esc_html( $body ); ?></p>
		</div>

		<aside class="rpd-about-hero__rings" aria-label="<?php esc_attr_e( 'RocketPD learning model', 'rocketpd' ); ?>">
			<div class="rpd-about-ring rpd-about-ring--outer">
				<div class="rpd-about-ring rpd-about-ring--middle">
					<div class="rpd-about-ring rpd-about-ring--inner">
						<span><?php esc_html_e( 'Learn', 'rocketpd' ); ?></span>
						<span><?php esc_html_e( 'Practice', 'rocketpd' ); ?></span>
						<span><?php esc_html_e( 'Share', 'rocketpd' ); ?></span>
					</div>
				</div>
			</div>
		</aside>
	</div>

	<?php if ( is_array( $stats ) && ! empty( $stats ) ) : ?>
		<div class="rpd-container rpd-about-stats">
			<?php foreach ( $stats as $stat ) : ?>
				<?php
				$value = isset( $stat['value'] ) ? $stat['value'] : '';
				$label = isset( $stat['label'] ) ? $stat['label'] : '';
				?>
				<?php if ( $value || $label ) : ?>
					<div class="rpd-about-stat">
						<strong><?php echo esc_html( $value ); ?></strong>
						<span><?php echo esc_html( $label ); ?></span>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</section>
