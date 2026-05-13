<?php
/**
 * Community topic request section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$badge      = rocketpd_get_field( 'rpd_community_topic_badge', __( "We're listening", 'rocketpd' ) );
$headline   = rocketpd_get_field( 'rpd_community_topic_headline', __( 'Want content on a particular topic?', 'rocketpd' ) );
$body       = rocketpd_get_field( 'rpd_community_topic_body', __( "The RocketPD Learning Community was built to listen. If you're facing a challenge - or looking for support in a specific area - we want to hear from you. Tell us what you're working on, and our team will let you know if we can develop resources, sessions, or content to support it.", 'rocketpd' ) );
$note       = rocketpd_get_field( 'rpd_community_topic_note', __( 'We review every request and use community input to guide future guides, webinars, and learning resources.', 'rocketpd' ) );
$shortcode  = rocketpd_get_field( 'rpd_community_topic_form_shortcode' );
$form_id    = rocketpd_get_field( 'rpd_community_topic_form_id' );
$submit     = rocketpd_get_field( 'rpd_community_topic_submit_label', __( "Share What You're Looking For", 'rocketpd' ) );
$topics     = rocketpd_get_field(
	'rpd_community_topic_options',
	array(
		array( 'label' => __( 'Instruction', 'rocketpd' ) ),
		array( 'label' => __( 'Leadership', 'rocketpd' ) ),
		array( 'label' => __( 'Literacy', 'rocketpd' ) ),
		array( 'label' => __( 'MTSS', 'rocketpd' ) ),
		array( 'label' => __( 'SEL', 'rocketpd' ) ),
		array( 'label' => __( 'Math', 'rocketpd' ) ),
		array( 'label' => __( 'School Culture', 'rocketpd' ) ),
	)
);
?>

<section class="rpd-community-topic rpd-community-section">
	<div class="rpd-container">
		<div class="rpd-community-topic__panel">
			<div class="rpd-community-topic__copy">
				<p class="rpd-community-badge"><?php echo esc_html( $badge ); ?></p>
				<h2><?php echo esc_html( $headline ); ?></h2>
				<p><?php echo esc_html( $body ); ?></p>
				<p class="rpd-community-topic__note"><?php echo esc_html( $note ); ?></p>
			</div>
			<div class="rpd-community-topic__form">
				<?php if ( $form_id && function_exists( 'gravity_form' ) ) : ?>
					<?php gravity_form( (int) $form_id, false, false, false, null, true ); ?>
				<?php elseif ( $shortcode ) : ?>
					<?php echo wp_kses_post( do_shortcode( $shortcode ) ); ?>
				<?php else : ?>
					<form aria-label="<?php esc_attr_e( 'Community topic request preview', 'rocketpd' ); ?>">
						<div class="rpd-community-form-row">
							<label>
								<span><?php esc_html_e( 'Name', 'rocketpd' ); ?></span>
								<input type="text" placeholder="<?php esc_attr_e( 'Your name', 'rocketpd' ); ?>">
							</label>
							<label>
								<span><?php esc_html_e( 'Email', 'rocketpd' ); ?></span>
								<input type="email" placeholder="<?php esc_attr_e( 'you@school.org', 'rocketpd' ); ?>">
							</label>
						</div>
						<label>
							<span><?php esc_html_e( 'Topic', 'rocketpd' ); ?></span>
							<select>
								<option><?php esc_html_e( 'Select a focus area', 'rocketpd' ); ?></option>
							</select>
						</label>
						<div class="rpd-community-topic-chips" aria-label="<?php esc_attr_e( 'Example focus areas', 'rocketpd' ); ?>">
							<?php foreach ( $topics as $topic ) : ?>
								<?php if ( ! empty( $topic['label'] ) ) : ?>
									<span><?php echo esc_html( $topic['label'] ); ?></span>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
						<label>
							<span><?php esc_html_e( 'What are you working on?', 'rocketpd' ); ?></span>
							<textarea rows="5" placeholder="<?php esc_attr_e( "Tell us about the challenge you're navigating or the kind of resource that would help...", 'rocketpd' ); ?>"></textarea>
						</label>
						<button class="rpd-btn rpd-btn--gold" type="button"><?php echo esc_html( $submit ); ?></button>
					</form>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
