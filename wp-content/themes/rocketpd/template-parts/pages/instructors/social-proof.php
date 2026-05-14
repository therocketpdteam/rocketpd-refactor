<?php
/**
 * Instructor social proof section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_instructors_impact_eyebrow', __( 'Community Impact', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_instructors_impact_headline', __( 'Trusted by educators across 850+ districts.', 'rocketpd' ) );
$body = rocketpd_get_field( 'rpd_instructors_impact_body', __( "RocketPD instructors don't just teach - they shape the practice of tens of thousands of educators every year.", 'rocketpd' ) );
$stats = rocketpd_get_repeater_rows(
	'rpd_instructors_impact_stats',
	array(
		array( 'value' => __( '40K+', 'rocketpd' ), 'label' => __( 'Educators reached', 'rocketpd' ) ),
		array( 'value' => __( '850+', 'rocketpd' ), 'label' => __( 'Districts served', 'rocketpd' ) ),
		array( 'value' => __( '47', 'rocketpd' ), 'label' => __( 'U.S. states', 'rocketpd' ) ),
		array( 'value' => __( '$4M+', 'rocketpd' ), 'label' => __( 'PD investment supported', 'rocketpd' ) ),
	),
	array( 'value', 'label' )
);
$quote = rocketpd_get_field( 'rpd_instructors_quote', __( '"RocketPD\'s cohort-based learning experiences have changed the way we look at professional development."', 'rocketpd' ) );
$quote_name = rocketpd_get_field( 'rpd_instructors_quote_name', __( 'Joe Baeta', 'rocketpd' ) );
$quote_role = rocketpd_get_field( 'rpd_instructors_quote_role', __( 'Superintendent - Stoughton Public Schools, MA', 'rocketpd' ) );
?>

<section class="rpd-instructors-proof">
	<div class="rpd-container rpd-instructors-proof__grid">
		<div>
			<p class="rpd-instructors-section-header__eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
			<div class="rpd-instructors-proof__stats">
				<?php foreach ( $stats as $stat ) : ?>
					<div>
						<strong><?php echo esc_html( $stat['value'] ?? '' ); ?></strong>
						<span><?php echo esc_html( $stat['label'] ?? '' ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<blockquote class="rpd-instructors-quote">
			<span class="rpd-instructors-quote__mark" aria-hidden="true">"</span>
			<p><?php echo esc_html( $quote ); ?></p>
			<cite>
				<span aria-hidden="true">JB</span>
				<strong><?php echo esc_html( $quote_name ); ?></strong>
				<small><?php echo esc_html( $quote_role ); ?></small>
			</cite>
		</blockquote>
	</div>
</section>
