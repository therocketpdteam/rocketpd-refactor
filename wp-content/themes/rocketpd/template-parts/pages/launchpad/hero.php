<?php
/**
 * LaunchPad hero section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow         = rocketpd_get_field( 'rpd_launchpad_hero_eyebrow', __( 'RocketPD LaunchPad', 'rocketpd' ) );
$headline        = rocketpd_get_field( 'rpd_launchpad_hero_headline', __( 'LaunchPad', 'rocketpd' ) );
$secondary       = rocketpd_get_field( 'rpd_launchpad_hero_secondary', __( 'The Professional Learning System for Educator Growth', 'rocketpd' ) );
$body            = rocketpd_get_field( 'rpd_launchpad_hero_body', __( 'LaunchPad helps districts move beyond disconnected professional development — giving teams one place to access high-quality learning, support educator growth, and turn professional learning into meaningful outcomes.', 'rocketpd' ) );
$primary_label   = rocketpd_get_field( 'rpd_launchpad_hero_primary_label', __( 'Explore LaunchPad', 'rocketpd' ) );
$primary_url     = rocketpd_get_field( 'rpd_launchpad_hero_primary_url', '#explore' );
$secondary_label = rocketpd_get_field( 'rpd_launchpad_hero_secondary_label', __( 'See It In Action', 'rocketpd' ) );
$secondary_url   = rocketpd_get_field( 'rpd_launchpad_hero_secondary_url', '#launchpad-demo' );
$cards           = rocketpd_get_field(
	'rpd_launchpad_hero_cards',
	array(
		array( 'label' => __( 'Certificate', 'rocketpd' ), 'value' => __( '3 earned this term', 'rocketpd' ), 'style' => 'certificate' ),
		array( 'label' => __( 'In progress', 'rocketpd' ), 'value' => __( '78%', 'rocketpd' ), 'style' => 'progress' ),
		array( 'label' => __( 'Recommended', 'rocketpd' ), 'value' => __( 'AI in the Classroom', 'rocketpd' ), 'style' => 'course' ),
	)
);
?>

<section class="rpd-lp-hero rpd-lp-section">
	<div class="rpd-container rpd-lp-hero__grid">
		<div class="rpd-lp-hero__copy">
			<p class="rpd-lp-pill rpd-lp-pill--gold"><?php echo esc_html( $eyebrow ); ?></p>
			<h1><?php echo esc_html( $headline ); ?></h1>
			<p class="rpd-lp-hero__secondary"><?php echo esc_html( $secondary ); ?></p>
			<p class="rpd-lp-hero__body"><?php echo esc_html( $body ); ?></p>
			<div class="rpd-lp-actions">
				<?php if ( $primary_label && $primary_url ) : ?>
					<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?> <span aria-hidden="true">→</span></a>
				<?php endif; ?>
				<?php if ( $secondary_label && $secondary_url ) : ?>
					<a class="rpd-btn rpd-btn--outline-white" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
				<?php endif; ?>
			</div>
		</div>

		<div class="rpd-lp-dashboard-wrap" aria-label="<?php esc_attr_e( 'LaunchPad dashboard preview', 'rocketpd' ); ?>">
			<div class="rpd-lp-browser">
				<div class="rpd-lp-browser__bar">
					<span></span><span></span><span></span>
					<b><?php esc_html_e( 'app.rocketpd.com/dashboard', 'rocketpd' ); ?></b>
				</div>
				<div class="rpd-lp-dashboard">
					<div class="rpd-lp-dashboard__top">
						<strong><?php esc_html_e( 'RocketPD', 'rocketpd' ); ?></strong>
						<span><?php esc_html_e( '+ View Library', 'rocketpd' ); ?></span>
					</div>
					<div class="rpd-lp-dashboard__grid">
						<?php foreach ( array( 'Beth Estill', 'Jennifer Gonzalez', 'Steve Constantino', 'Catlin Tucker', 'Luvelle Brown', 'Veronica Sopher' ) as $index => $name ) : ?>
							<article>
								<span><?php esc_html_e( 'Course', 'rocketpd' ); ?></span>
								<div class="rpd-lp-dashboard__portrait rpd-lp-dashboard__portrait--<?php echo esc_attr( (string) ( $index + 1 ) ); ?>"></div>
								<strong><?php echo esc_html( $name ); ?></strong>
							</article>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

			<?php if ( is_array( $cards ) && ! empty( $cards ) ) : ?>
				<?php foreach ( $cards as $card ) : ?>
					<?php
					$label = isset( $card['label'] ) ? $card['label'] : '';
					$value = isset( $card['value'] ) ? $card['value'] : '';
					$style = isset( $card['style'] ) ? sanitize_html_class( $card['style'] ) : 'course';
					?>
					<?php if ( $label || $value ) : ?>
						<div class="rpd-lp-float-card rpd-lp-float-card--<?php echo esc_attr( $style ); ?>">
							<span class="rpd-lp-mini-icon" aria-hidden="true"></span>
							<span>
								<small><?php echo esc_html( $label ); ?></small>
								<strong><?php echo esc_html( $value ); ?></strong>
							</span>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
