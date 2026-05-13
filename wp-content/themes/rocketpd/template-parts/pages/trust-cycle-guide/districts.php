<?php
/**
 * Trust Cycle Guide district examples section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_trust_districts_eyebrow', __( 'Real districts', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_trust_districts_headline', __( 'Districts putting this into practice.', 'rocketpd' ) );
$body = rocketpd_get_field( 'rpd_trust_districts_body', __( 'Two districts. Two starting points. One throughline: learning embedded into daily practice.', 'rocketpd' ) );
$fallback = array(
	array(
		'label' => __( 'LaunchPad', 'rocketpd' ),
		'title' => __( 'West Chester Area School District', 'rocketpd' ),
		'challenge' => __( 'Professional learning needed to be more accessible, personalized, and aligned to educator needs.', 'rocketpd' ),
		'approach' => __( "Immediate professional learning support\nBuilt around what educators were trying\nConnected to their daily work", 'rocketpd' ),
		'result' => __( "Increased engagement\nGreater confidence across teams", 'rocketpd' ),
		'quote' => __( 'This is a growing tool for professionals, leaders, coaches and aspiring educators.', 'rocketpd' ),
	),
	array(
		'label' => __( 'Partnership', 'rocketpd' ),
		'title' => __( 'Newburyport Public Schools', 'rocketpd' ),
		'challenge' => __( 'Leaders needed PD recommendations and implementation support.', 'rocketpd' ),
		'approach' => __( "Short, flexible sessions\nEducator-centered planning\nApplication without overload", 'rocketpd' ),
		'result' => __( "Increased participation\nImmediate classroom application", 'rocketpd' ),
		'quote' => __( 'People walk away with strategies they can use the next day.', 'rocketpd' ),
	),
);
$cards = rocketpd_get_field( 'rpd_trust_district_cards', $fallback );
$cards = array_filter(
	is_array( $cards ) ? $cards : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['title'] );
	}
);
$cards = $cards ?: $fallback;
?>

<section class="rpd-trust-districts rpd-trust-section">
	<div class="rpd-trust-container">
		<div class="rpd-trust-section-head">
			<p class="rpd-trust-kicker"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</div>
		<div class="rpd-trust-district-grid">
			<?php foreach ( $cards as $card ) : ?>
				<article>
					<div class="rpd-trust-district-top">
						<p><?php echo esc_html( $card['label'] ?? '' ); ?></p>
						<h3><?php echo esc_html( $card['title'] ?? '' ); ?></h3>
					</div>
					<div class="rpd-trust-district-body">
						<h4><?php esc_html_e( 'Challenge', 'rocketpd' ); ?></h4>
						<p><?php echo esc_html( $card['challenge'] ?? '' ); ?></p>
						<h4><?php esc_html_e( 'Approach', 'rocketpd' ); ?></h4>
						<ul>
							<?php foreach ( array_filter( array_map( 'trim', explode( "\n", $card['approach'] ?? '' ) ) ) as $item ) : ?>
								<li><?php echo esc_html( $item ); ?></li>
							<?php endforeach; ?>
						</ul>
						<h4><?php esc_html_e( 'Result', 'rocketpd' ); ?></h4>
						<ul>
							<?php foreach ( array_filter( array_map( 'trim', explode( "\n", $card['result'] ?? '' ) ) ) as $item ) : ?>
								<li><?php echo esc_html( $item ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<blockquote><?php echo esc_html( $card['quote'] ?? '' ); ?></blockquote>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
