<?php
/**
 * Instructor final CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$instructor = function_exists( 'rocketpd_get_current_instructor_detail' ) ? rocketpd_get_current_instructor_detail() : array();
$name       = $instructor['name'] ?? __( 'Kim Marshall', 'rocketpd' );
$first_name = function_exists( 'rocketpd_get_instructor_first_name' ) ? rocketpd_get_instructor_first_name( $name ) : trim( strtok( $name, ' ' ) );
$cta        = $instructor['final_cta'] ?? array();
?>

<section class="rpd-instructor-final">
	<div class="rpd-container">
		<h2>
			<?php
			echo esc_html(
				$cta['headline'] ?? sprintf(
					/* translators: %s: instructor first name. */
					__( "Bring %s's work to your district.", 'rocketpd' ),
					$first_name
				)
			);
			?>
		</h2>
		<p><?php echo esc_html( $cta['body'] ?? '' ); ?></p>
		<div class="rpd-instructor-final__actions">
			<?php if ( ! empty( $cta['primary_label'] ) && ! empty( $cta['primary_href'] ) ) : ?>
				<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $cta['primary_href'] ); ?>"><?php echo esc_html( $cta['primary_label'] ); ?></a>
			<?php endif; ?>
			<?php if ( ! empty( $cta['secondary_label'] ) && ! empty( $cta['secondary_href'] ) ) : ?>
				<a class="rpd-btn rpd-btn--outline-light" href="<?php echo esc_url( $cta['secondary_href'] ); ?>"><?php echo esc_html( $cta['secondary_label'] ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</section>
