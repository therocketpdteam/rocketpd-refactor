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
$body            = rocketpd_get_field( 'rpd_contact_form_body', __( "Drop the details and we'll route it to the right person on our team. Schools, districts, education associations, ed-tech partners, conference organizers - all welcome here.", 'rocketpd' ) );
$promise         = rocketpd_get_field( 'rpd_contact_form_promise', __( "Replies typically within 1 business day. We don't add you to a drip sequence - promise.", 'rocketpd' ) );
$checklist       = array(
	array(
		'emphasis' => __( 'School or district', 'rocketpd' ),
		'detail'   => __( 'walkthroughs', 'rocketpd' ),
	),
	array(
		'emphasis' => __( 'Association', 'rocketpd' ),
		'detail'   => __( 'partnerships', 'rocketpd' ),
	),
	array(
		'emphasis' => __( 'Ed-tech partner', 'rocketpd' ),
		'detail'   => __( 'inquiries', 'rocketpd' ),
	),
	array(
		'emphasis' => __( 'Press, speaking,', 'rocketpd' ),
		'detail'   => __( 'or media', 'rocketpd' ),
	),
);
$fallback_fields = array(
	__( 'Your name', 'rocketpd' ),
	__( 'Work email', 'rocketpd' ),
	__( 'Organization', 'rocketpd' ),
	__( 'Your role', 'rocketpd' ),
);
?>

<section class="rpd-contact-form-section rpd-section" id="walkthrough-form">
	<div class="rpd-container rpd-contact-form-section__grid">
		<div>
			<p class="rpd-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
			<ul class="rpd-contact-form-section__list">
				<?php foreach ( $checklist as $item ) : ?>
					<li>
						<strong><?php echo esc_html( $item['emphasis'] ); ?></strong>
						<span><?php echo esc_html( $item['detail'] ); ?></span>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div class="rpd-contact-form-card">
			<?php if ( $gravity_form_id && function_exists( 'gravity_form' ) ) : ?>
				<?php gravity_form( (int) $gravity_form_id, false, false, false, null, true ); ?>
			<?php else : ?>
				<div class="rpd-contact-form-fallback" role="note" aria-label="<?php esc_attr_e( 'Contact form preview', 'rocketpd' ); ?>">
					<?php foreach ( $fallback_fields as $field_label ) : ?>
						<label class="rpd-contact-form-fallback__field rpd-contact-form-fallback__field--half">
							<span><?php echo esc_html( $field_label ); ?></span>
							<input type="text" disabled>
						</label>
					<?php endforeach; ?>
					<label class="rpd-contact-form-fallback__field rpd-contact-form-fallback__field--full">
						<span><?php esc_html_e( "I'm reaching out about", 'rocketpd' ); ?></span>
						<select disabled>
							<option><?php esc_html_e( 'School or district walkthrough', 'rocketpd' ); ?></option>
							<option><?php esc_html_e( 'Association partnership', 'rocketpd' ); ?></option>
							<option><?php esc_html_e( 'Ed-tech / vendor partnership', 'rocketpd' ); ?></option>
							<option><?php esc_html_e( 'Press, speaking, or media', 'rocketpd' ); ?></option>
							<option><?php esc_html_e( 'Something else', 'rocketpd' ); ?></option>
						</select>
					</label>
					<label class="rpd-contact-form-fallback__field rpd-contact-form-fallback__field--full">
						<span><?php esc_html_e( "What's on your mind?", 'rocketpd' ); ?></span>
						<textarea disabled rows="4" placeholder="<?php esc_attr_e( "A sentence or two is plenty - we'll follow up to learn more.", 'rocketpd' ); ?>"></textarea>
					</label>
					<button class="rpd-btn rpd-btn--purple" type="button" disabled><?php esc_html_e( 'Send It Over', 'rocketpd' ); ?></button>
				</div>
			<?php endif; ?>
			<p class="rpd-contact-form-card__promise"><?php echo esc_html( $promise ); ?></p>
		</div>
	</div>
</section>
