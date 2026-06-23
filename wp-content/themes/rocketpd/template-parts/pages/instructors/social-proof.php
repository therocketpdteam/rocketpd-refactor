<?php
/**
 * Instructor social proof section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_instructors_impact_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_eyebrow    = __( 'Community Impact', 'rocketpd' );
$default_headline   = __( 'Trusted by educators across 850+ districts.', 'rocketpd' );
$default_body       = __( "RocketPD instructors don't just teach - they shape the practice of tens of thousands of educators every year.", 'rocketpd' );
$default_stats      = array(
	array( 'value' => __( '40K+', 'rocketpd' ), 'label' => __( 'Educators reached', 'rocketpd' ) ),
	array( 'value' => __( '850+', 'rocketpd' ), 'label' => __( 'Districts served', 'rocketpd' ) ),
	array( 'value' => __( '47', 'rocketpd' ), 'label' => __( 'U.S. states', 'rocketpd' ) ),
	array( 'value' => __( '$4M+', 'rocketpd' ), 'label' => __( 'PD investment supported', 'rocketpd' ) ),
);
$default_quote      = __( '"RocketPD\'s cohort-based learning experiences have changed the way we look at professional development."', 'rocketpd' );
$default_quote_name = __( 'Joe Baeta', 'rocketpd' );
$default_quote_role = __( 'Superintendent - Stoughton Public Schools, MA', 'rocketpd' );

if ( 'custom' === $mode ) {
	$eyebrow    = rocketpd_get_field( 'rpd_instructors_impact_eyebrow', $default_eyebrow );
	$headline   = rocketpd_get_field( 'rpd_instructors_impact_headline', $default_headline );
	$body       = rocketpd_get_field( 'rpd_instructors_impact_body', $default_body );
	$acf_stats  = rocketpd_get_field( 'rpd_instructors_impact_stats', null );
	$stats      = is_array( $acf_stats ) && ! empty( $acf_stats ) ? $acf_stats : $default_stats;
	$quote      = rocketpd_get_field( 'rpd_instructors_quote', $default_quote );
	$quote_name = rocketpd_get_field( 'rpd_instructors_quote_name', $default_quote_name );
	$quote_role = rocketpd_get_field( 'rpd_instructors_quote_role', $default_quote_role );
} else {
	$eyebrow    = $default_eyebrow;
	$headline   = $default_headline;
	$body       = $default_body;
	$stats      = $default_stats;
	$quote      = $default_quote;
	$quote_name = $default_quote_name;
	$quote_role = $default_quote_role;
}
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
