<?php
/**
 * About founders section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = rocketpd_get_field( 'rpd_about_founders_eyebrow', __( 'MEET THE FOUNDERS', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_about_founders_headline', __( 'Built by educators, for educators.', 'rocketpd' ) );
$body     = rocketpd_get_field( 'rpd_about_founders_body', __( "RocketPD's three co-founders bring decades of K-12 experience — and a personal connection to the educators who shaped them.", 'rocketpd' ) );
$people   = function_exists( 'rocketpd_get_members_by_type' ) ? rocketpd_get_members_by_type( 'founder' ) : array();

if ( ! $people ) {
	return;
}
?>

<section class="rpd-about-founders rpd-about-section">
	<div class="rpd-container">
		<header class="rpd-about-section-header">
			<p class="rpd-about-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<?php if ( $body ) : ?>
				<p><?php echo esc_html( $body ); ?></p>
			<?php endif; ?>
		</header>

		<?php if ( is_array( $people ) && ! empty( $people ) ) : ?>
			<div class="rpd-about-people-grid rpd-about-people-grid--founders">
				<?php foreach ( $people as $person ) : ?>
					<?php get_template_part( 'template-parts/components/member-card', null, array( 'member' => $person ) ); ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
