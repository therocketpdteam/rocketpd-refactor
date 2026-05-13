<?php
/**
 * Lead Magnet learning preview section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow        = rocketpd_get_field( 'rpd_lead_learn_eyebrow', __( 'Inside this guide', 'rocketpd' ) );
$headline       = rocketpd_get_field( 'rpd_lead_learn_headline', __( "What you'll learn.", 'rocketpd' ) );
$body           = rocketpd_get_field( 'rpd_lead_learn_body', __( 'Five practical shifts you can use to rethink how professional learning works in your district.', 'rocketpd' ) );
$fallback_items = array(
	array( 'icon' => 'compass', 'title' => __( 'Connect learning to real work', 'rocketpd' ), 'body' => __( 'How districts tie professional learning directly to classroom and leadership practice.', 'rocketpd' ), 'accent' => 'purple' ),
	array( 'icon' => 'bolt', 'title' => __( 'Use flexible async learning', 'rocketpd' ), 'body' => __( "Why short, on-demand modules drive engagement where workshops don't.", 'rocketpd' ), 'accent' => 'gold' ),
	array( 'icon' => 'heart', 'title' => __( 'Build educator confidence', 'rocketpd' ), 'body' => __( 'Systems that support continuous growth - not just one-time PD events.', 'rocketpd' ), 'accent' => 'pink' ),
	array( 'icon' => 'trend', 'title' => __( 'Improve retention', 'rocketpd' ), 'body' => __( 'How relevance and applicability help educators feel supported and stay.', 'rocketpd' ), 'accent' => 'blue' ),
	array( 'icon' => 'target', 'title' => __( 'Move from one-time PD', 'rocketpd' ), 'body' => __( 'A practical path from isolated PD to a continuous professional learning system.', 'rocketpd' ), 'accent' => 'gold' ),
);
$items          = rocketpd_get_field( 'rpd_lead_learn_items', $fallback_items );
$items          = array_filter(
	is_array( $items ) ? $items : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['title'] );
	}
);
$items          = $items ? $items : $fallback_items;
?>

<section class="rpd-lead-learn rpd-lead-section">
	<div class="rpd-container">
		<header class="rpd-lead-section-header rpd-lead-section-header--left">
			<p class="rpd-lead-pill"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</header>
		<div class="rpd-lead-learn-grid">
			<?php foreach ( $items as $item ) : ?>
				<article class="rpd-lead-icon-card rpd-lead-icon-card--<?php echo esc_attr( sanitize_html_class( $item['accent'] ?? 'purple' ) ); ?>">
					<span aria-hidden="true"><?php echo esc_html( substr( (string) ( $item['icon'] ?? 'guide' ), 0, 1 ) ); ?></span>
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['body'] ?? '' ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
