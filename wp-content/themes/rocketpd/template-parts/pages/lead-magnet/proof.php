<?php
/**
 * Lead Magnet proof section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow        = rocketpd_get_field( 'rpd_lead_proof_eyebrow', __( 'Proof', 'rocketpd' ) );
$headline       = rocketpd_get_field( 'rpd_lead_proof_headline', __( 'Built from real district experience.', 'rocketpd' ) );
$body           = rocketpd_get_field( 'rpd_lead_proof_body', __( 'This guide is grounded in the work of RocketPD and partner districts.', 'rocketpd' ) );
$quote          = rocketpd_get_field( 'rpd_lead_proof_quote', __( '"RocketPD helps districts connect expert-led learning to the everyday work of educators."', 'rocketpd' ) );
$fallback_items = array(
	array( 'stat' => '40,000+', 'label' => __( 'Educators Engaged', 'rocketpd' ), 'body' => __( 'Across the RocketPD Community, getting support where they need it most.', 'rocketpd' ), 'accent' => 'purple' ),
	array( 'stat' => '850+', 'label' => __( 'Districts', 'rocketpd' ), 'body' => __( 'From single-building pilots to statewide rollouts - diverse settings, real results.', 'rocketpd' ), 'accent' => 'pink' ),
	array( 'stat' => __( 'Real-world', 'rocketpd' ), 'label' => __( 'Implementation', 'rocketpd' ), 'body' => __( "What's in this guide came from districts running the work - not from a whiteboard.", 'rocketpd' ), 'accent' => 'gold' ),
);
$items          = rocketpd_get_field( 'rpd_lead_proof_items', $fallback_items );
$items          = array_filter(
	is_array( $items ) ? $items : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['stat'] );
	}
);
$items          = $items ? $items : $fallback_items;
?>

<section id="rpd-lead-proof" class="rpd-lead-proof rpd-lead-section">
	<div class="rpd-container">
		<header class="rpd-lead-section-header">
			<p class="rpd-lead-pill rpd-lead-pill--gold"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</header>
		<div class="rpd-lead-proof-grid">
			<?php foreach ( $items as $item ) : ?>
				<article class="rpd-lead-proof-card rpd-lead-proof-card--<?php echo esc_attr( sanitize_html_class( $item['accent'] ?? 'purple' ) ); ?>">
					<span aria-hidden="true"></span>
					<strong><?php echo esc_html( $item['stat'] ); ?></strong>
					<h3><?php echo esc_html( $item['label'] ?? '' ); ?></h3>
					<p><?php echo esc_html( $item['body'] ?? '' ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
		<blockquote><?php echo esc_html( $quote ); ?></blockquote>
	</div>
</section>
