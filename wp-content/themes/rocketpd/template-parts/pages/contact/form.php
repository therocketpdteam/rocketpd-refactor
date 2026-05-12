<?php
/**
 * Contact form section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gravity_form_id = rocketpd_get_field( 'rpd_contact_form_id' );
$eyebrow         = rocketpd_get_field( 'rpd_contact_form_eyebrow', __( 'Tell us more', 'rocketpd' ) );
$headline        = rocketpd_get_field( 'rpd_contact_form_headline', __( "Walkthrough, partnership, or something we haven't thought of yet?", 'rocketpd' ) );
$body            = rocketpd_get_field( 'rpd_contact_form_body', __( "Drop the details and we'll route it to the right person on our team.", 'rocketpd' ) );
$promise         = rocketpd_get_field( 'rpd_contact_form_promise', __( "Replies typically within 1 business day. We don't add you to a drip sequence.", 'rocketpd' ) );
?>

<section class="rpd-contact-form-section rpd-section" id="walkthrough-form">
	<div class="rpd-container rpd-contact-form-section__grid">
		<div>
			<p class="rpd-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</div>

		<div class="rpd-contact-form-card">
			<?php if ( $gravity_form_id && function_exists( 'gravity_form' ) ) : ?>
				<?php gravity_form( (int) $gravity_form_id, false, false, false, null, true ); ?>
			<?php else : ?>
				<div class="rpd-contact-form-placeholder" role="note">
					<h3><?php esc_html_e( 'Contact form placeholder', 'rocketpd' ); ?></h3>
					<p><?php esc_html_e( 'Add a Gravity Forms form ID in the Contact page fields to render the live form here.', 'rocketpd' ); ?></p>
				</div>
			<?php endif; ?>
			<p class="rpd-contact-form-card__promise"><?php echo esc_html( $promise ); ?></p>
		</div>
	</div>
</section>
