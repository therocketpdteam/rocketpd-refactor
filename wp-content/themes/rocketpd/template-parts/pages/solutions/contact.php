<?php
/**
 * Solutions — contact form section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_sol_contact_mode', 'defaults' );

if ( 'hidden' === $mode ) {
	return;
}

$heading = rocketpd_get_field( 'rpd_sol_contact_heading', __( 'Want to learn more about our solutions, or have questions about our cohorts and courses?', 'rocketpd' ) );
?>

<section class="rpd-sol-contact rpd-sol-section rpd-sol-dark">
	<div class="rpd-sol-container">
		<div class="rpd-sol-contact__inner">
			<?php if ( $heading ) : ?>
				<h2><?php echo esc_html( $heading ); ?></h2>
			<?php endif; ?>
			<div class="rpd-sol-contact__form">
				<script type="text/javascript" src="https://form.jotform.com/jsform/240914871923057"></script>
			</div>
		</div>
	</div>
</section>
