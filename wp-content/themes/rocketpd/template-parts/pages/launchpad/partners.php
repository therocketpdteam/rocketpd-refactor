<?php
/**
 * LaunchPad partner logo band.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$partners = rocketpd_get_field(
	'rpd_launchpad_partner_names',
	array(
		array( 'name' => __( 'NYC Schools', 'rocketpd' ) ),
		array( 'name' => __( 'Fulton County Schools', 'rocketpd' ) ),
		array( 'name' => __( 'Jefferson Parish Schools', 'rocketpd' ) ),
		array( 'name' => __( 'Cincinnati Public Schools', 'rocketpd' ) ),
		array( 'name' => __( 'LAUSD', 'rocketpd' ) ),
	)
);
?>

<section class="rpd-lp-partners rpd-lp-section">
	<div class="rpd-container">
		<header class="rpd-lp-section-header rpd-lp-section-header--center">
			<p class="rpd-lp-eyebrow"><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_partners_eyebrow', __( 'Trusted Partners', 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_partners_headline', __( 'Join school leaders in 850+ districts that partner with RocketPD.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_partners_subheadline', __( 'From single buildings to statewide rollouts.', 'rocketpd' ) ) ); ?></p>
		</header>
		<div class="rpd-lp-partners__row">
			<?php foreach ( $partners as $partner ) : ?>
				<?php $name = isset( $partner['name'] ) ? $partner['name'] : ''; ?>
				<?php if ( $name ) : ?>
					<span><?php echo esc_html( $name ); ?></span>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
