<?php
/**
 * Trust Cycle Guide continuous learning section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = rocketpd_get_field( 'rpd_trust_continuous_eyebrow', __( 'The shift', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_trust_continuous_headline', __( 'From isolated professional development to continuous learning.', 'rocketpd' ) );
$body     = rocketpd_get_field( 'rpd_trust_continuous_body', __( 'Traditional PD often feels like a workshop, a training day, a required session. Even when valuable, these experiences are disconnected from the moment of need and from the daily work educators face.', 'rocketpd' ) );
$quote    = rocketpd_get_field( 'rpd_trust_continuous_quote', __( 'Instead of learning once and hoping it sticks, educators engage, apply, reflect, and return.', 'rocketpd' ) );
$fallback = array(
	array(
		'label' => __( 'Traditional PD looks like', 'rocketpd' ),
		'title' => __( 'Step away to learn.', 'rocketpd' ),
		'items' => __( "A workshop\nA training day\nA required session", 'rocketpd' ),
		'style' => 'light',
	),
	array(
		'label' => __( 'Continuous learning works when', 'rocketpd' ),
		'title' => __( 'Learning lives in the work.', 'rocketpd' ),
		'items' => __( "Access learning when it's needed\nReflect and exchange ideas\nApply it immediately\nBuild confidence over time", 'rocketpd' ),
		'style' => 'dark',
	),
);
$cards = rocketpd_get_field( 'rpd_trust_continuous_cards', $fallback );
$cards = array_filter(
	is_array( $cards ) ? $cards : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['title'] );
	}
);
$cards = $cards ?: $fallback;
?>

<section class="rpd-trust-continuous rpd-trust-section">
	<div class="rpd-trust-container">
		<div class="rpd-trust-section-head">
			<p class="rpd-trust-kicker"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</div>
		<div class="rpd-trust-compare">
			<?php foreach ( $cards as $card ) : ?>
				<article class="<?php echo 'dark' === ( $card['style'] ?? '' ) ? 'rpd-trust-card-dark' : ''; ?>">
					<p><?php echo esc_html( $card['label'] ?? '' ); ?></p>
					<h3><?php echo esc_html( $card['title'] ?? '' ); ?></h3>
					<ul>
						<?php foreach ( array_filter( array_map( 'trim', explode( "\n", $card['items'] ?? '' ) ) ) as $item ) : ?>
							<li><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>
				</article>
			<?php endforeach; ?>
		</div>
		<blockquote><?php echo esc_html( $quote ); ?></blockquote>
	</div>
</section>
