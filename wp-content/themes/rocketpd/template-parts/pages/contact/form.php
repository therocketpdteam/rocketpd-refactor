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
$body            = rocketpd_get_field( 'rpd_contact_form_body', __( "Drop the details and we'll route it to the right person on our team. Schools, districts, education associations, ed-tech partners, conference organizers — all welcome here.", 'rocketpd' ) );
$promise         = rocketpd_get_field( 'rpd_contact_form_promise', __( "Replies typically within 1 business day. We don't add you to a drip sequence — promise.", 'rocketpd' ) );
$bullets         = rocketpd_get_field(
	'rpd_contact_form_bullets',
	array(
		array( 'text' => __( 'School / district walkthroughs — get a tailored look', 'rocketpd' ) ),
		array( 'text' => __( 'Association partnerships — bring RocketPD to your members', 'rocketpd' ) ),
		array( 'text' => __( 'Ed-tech partner inquiries — tap into our network', 'rocketpd' ) ),
		array( 'text' => __( "Press / speaking — we'd love to chat", 'rocketpd' ) ),
	)
);
$select_options  = rocketpd_get_field(
	'rpd_contact_form_interest_options',
	array(
		array( 'label' => __( 'School or district walkthrough', 'rocketpd' ) ),
		array( 'label' => __( 'Association partnership', 'rocketpd' ) ),
		array( 'label' => __( 'Ed-tech partner inquiry', 'rocketpd' ) ),
		array( 'label' => __( 'Press, speaking, or media', 'rocketpd' ) ),
		array( 'label' => __( 'Something else', 'rocketpd' ) ),
	)
);
?>

<section class="rpd-contact-form-section rpd-contact-section" id="walkthrough-form">
	<div class="rpd-container rpd-contact-form-section__grid">
		<div class="rpd-contact-form-section__copy">
			<p class="rpd-contact-pill rpd-contact-pill--brown"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>

			<?php if ( is_array( $bullets ) && ! empty( $bullets ) ) : ?>
				<ul class="rpd-contact-form-bullets">
					<?php foreach ( $bullets as $bullet ) : ?>
						<?php $text = isset( $bullet['text'] ) ? $bullet['text'] : ''; ?>
						<?php if ( $text ) : ?>
							<li><?php echo esc_html( $text ); ?></li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>

		<div class="rpd-contact-form-card">
			<?php if ( $gravity_form_id && function_exists( 'gravity_form' ) ) : ?>
				<?php gravity_form( (int) $gravity_form_id, false, false, false, null, true ); ?>
			<?php else : ?>
				<form class="rpd-contact-static-form" aria-label="<?php esc_attr_e( 'Contact form preview', 'rocketpd' ); ?>">
					<div class="rpd-contact-form-row">
						<label>
							<span><?php esc_html_e( 'Your Name', 'rocketpd' ); ?></span>
							<input type="text" placeholder="<?php esc_attr_e( 'Jane Smith', 'rocketpd' ); ?>">
						</label>
						<label>
							<span><?php esc_html_e( 'Work Email', 'rocketpd' ); ?></span>
							<input type="email" placeholder="<?php esc_attr_e( 'jane@yourdistrict.org', 'rocketpd' ); ?>">
						</label>
					</div>
					<div class="rpd-contact-form-row">
						<label>
							<span><?php esc_html_e( 'Organization', 'rocketpd' ); ?></span>
							<input type="text" placeholder="<?php esc_attr_e( 'Atlanta Public Schools', 'rocketpd' ); ?>">
						</label>
						<label>
							<span><?php esc_html_e( 'Your Role', 'rocketpd' ); ?></span>
							<input type="text" placeholder="<?php esc_attr_e( 'Director of PD', 'rocketpd' ); ?>">
						</label>
					</div>
					<label>
						<span><?php esc_html_e( "I'm Reaching Out About", 'rocketpd' ); ?></span>
						<select>
							<?php foreach ( $select_options as $option ) : ?>
								<?php $option_label = isset( $option['label'] ) ? $option['label'] : ''; ?>
								<?php if ( $option_label ) : ?>
									<option><?php echo esc_html( $option_label ); ?></option>
								<?php endif; ?>
							<?php endforeach; ?>
						</select>
					</label>
					<label>
						<span><?php esc_html_e( "What's On Your Mind?", 'rocketpd' ); ?></span>
						<textarea rows="5" placeholder="<?php esc_attr_e( \"A sentence or two is plenty — we'll follow up to learn more.\", 'rocketpd' ); ?>"></textarea>
					</label>
					<button class="rpd-btn rpd-btn--purple rpd-btn--full" type="button"><?php esc_html_e( 'Send It Over', 'rocketpd' ); ?> <span aria-hidden="true">✈</span></button>
				</form>
			<?php endif; ?>
			<p class="rpd-contact-form-card__promise"><?php echo esc_html( $promise ); ?></p>
		</div>
	</div>
</section>
