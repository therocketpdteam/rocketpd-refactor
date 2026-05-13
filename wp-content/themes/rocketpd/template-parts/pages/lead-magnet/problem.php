<?php
/**
 * Lead Magnet problem section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow        = rocketpd_get_field( 'rpd_lead_problem_eyebrow', __( 'The challenge', 'rocketpd' ) );
$headline       = rocketpd_get_field( 'rpd_lead_problem_headline', __( "Most professional learning isn't designed for how educators actually work.", 'rocketpd' ) );
$body           = rocketpd_get_field( 'rpd_lead_problem_body', __( "Across districts, leaders are seeing the same challenge: even strong content often fails to translate into real change.\n\nNot because educators aren't committed -", 'rocketpd' ) );
$emphasis       = rocketpd_get_field( 'rpd_lead_problem_emphasis', __( "But because the model doesn't support them.", 'rocketpd' ) );
$card_label     = rocketpd_get_field( 'rpd_lead_problem_card_label', __( 'What district leaders are seeing', 'rocketpd' ) );
$fallback_items = array(
	array( 'title' => __( 'Disconnected from daily practice', 'rocketpd' ), 'body' => __( 'Professional learning happens in one place. The actual work happens somewhere else.', 'rocketpd' ) ),
	array( 'title' => __( 'Inconsistent engagement', 'rocketpd' ), 'body' => __( "Some teams show up. Some don't. The model doesn't make showing up easy.", 'rocketpd' ) ),
	array( 'title' => __( 'Implementation is hard to sustain', 'rocketpd' ), 'body' => __( "What's learned in a session rarely makes it to Tuesday morning's lesson plan.", 'rocketpd' ) ),
	array( 'title' => __( 'Time is always limited', 'rocketpd' ), 'body' => __( "Educators are stretched. Adding more PD on top of that doesn't scale.", 'rocketpd' ) ),
);
$items          = rocketpd_get_field( 'rpd_lead_problem_items', $fallback_items );
$items          = array_filter(
	is_array( $items ) ? $items : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['title'] );
	}
);
$items          = $items ? $items : $fallback_items;
?>

<section class="rpd-lead-problem rpd-lead-section">
	<div class="rpd-container rpd-lead-split">
		<div class="rpd-lead-copy">
			<p class="rpd-lead-pill"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<?php foreach ( preg_split( '/\r\n\r\n|\n\n|\r\r/', $body ) as $paragraph ) : ?>
				<?php if ( trim( $paragraph ) ) : ?>
					<p><?php echo esc_html( trim( $paragraph ) ); ?></p>
				<?php endif; ?>
			<?php endforeach; ?>
			<strong><?php echo esc_html( $emphasis ); ?></strong>
		</div>
		<div class="rpd-lead-problem-card">
			<p><?php echo esc_html( $card_label ); ?></p>
			<div class="rpd-lead-problem-list">
				<?php foreach ( $items as $item ) : ?>
					<article>
						<span aria-hidden="true">x</span>
						<div>
							<h3><?php echo esc_html( $item['title'] ); ?></h3>
							<p><?php echo esc_html( $item['body'] ?? '' ); ?></p>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
