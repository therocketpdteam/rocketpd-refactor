<?php
/**
 * LaunchPad evolution section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = rocketpd_get_field( 'rpd_launchpad_evolution_eyebrow', __( 'The Evolution', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_launchpad_evolution_headline', __( 'From Course Library to Professional Learning System.', 'rocketpd' ) );
$intro    = rocketpd_get_field( 'rpd_launchpad_evolution_intro', __( 'LaunchPad began as a video-based professional learning library. Today, it’s a unified system that helps districts bring learning, engagement, and growth into one place.', 'rocketpd' ) );
$cards    = rocketpd_get_field(
	'rpd_launchpad_evolution_cards',
	array(
		array( 'title' => __( 'Align learning to strategic priorities', 'rocketpd' ), 'body' => __( 'Anchor every course and pathway to your district’s strategic plan and instructional focus.', 'rocketpd' ) ),
		array( 'title' => __( 'Support growth across teams & roles', 'rocketpd' ), 'body' => __( 'Pathways for new hires, veteran teachers, coaches, and leadership.', 'rocketpd' ) ),
		array( 'title' => __( 'Flexible, on-demand access', 'rocketpd' ), 'body' => __( 'Expert-led video content available the moment educators need it.', 'rocketpd' ) ),
		array( 'title' => __( 'Streamline credit & documentation', 'rocketpd' ), 'body' => __( 'Cut the paperwork around professional credit and PDP tracking.', 'rocketpd' ) ),
		array( 'title' => __( 'Connect learning to practice', 'rocketpd' ), 'body' => __( 'Tied directly to classroom and leadership routines.', 'rocketpd' ) ),
	)
);
$closing  = rocketpd_get_field( 'rpd_launchpad_evolution_closing', __( 'District leaders gain a clearer view of how professional learning is being used — while educators gain access to meaningful, practical support when and where they need it.', 'rocketpd' ) );
?>

<section class="rpd-lp-evolution rpd-lp-section rpd-lp-dark">
	<div class="rpd-container">
		<header class="rpd-lp-section-header rpd-lp-section-header--center">
			<p class="rpd-lp-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $intro ); ?></p>
		</header>
		<div class="rpd-lp-evolution__grid">
			<?php foreach ( $cards as $card ) : ?>
				<?php
				$title = isset( $card['title'] ) ? $card['title'] : '';
				$body  = isset( $card['body'] ) ? $card['body'] : '';
				?>
				<?php if ( $title || $body ) : ?>
					<article class="rpd-lp-glass-card">
						<span class="rpd-lp-icon-tile rpd-lp-icon-tile--gold" aria-hidden="true"></span>
						<h3><?php echo esc_html( $title ); ?></h3>
						<p><?php echo esc_html( $body ); ?></p>
					</article>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<?php if ( $closing ) : ?>
			<p class="rpd-lp-evolution__closing"><?php echo esc_html( $closing ); ?></p>
		<?php endif; ?>
	</div>
</section>
