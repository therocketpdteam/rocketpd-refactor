<?php
/**
 * Community topic request section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$body = rocketpd_community_get_field(
	'rpd_community_topic_body',
	'<p>' . esc_html__( 'The RocketPD Learning Community was built to listen.', 'rocketpd' ) . '</p><p>' . esc_html__( "If you're facing a challenge — or looking for support in a specific area — we want to hear from you. Tell us what you're working on, and our team will let you know if we can develop resources, sessions, or content to support it.", 'rocketpd' ) . '</p>'
);
$topics = rocketpd_community_get_rows(
	'rpd_community_topic_options',
	array(
		array( 'option' => __( 'Instruction', 'rocketpd' ) ),
		array( 'option' => __( 'Leadership', 'rocketpd' ) ),
		array( 'option' => __( 'Literacy', 'rocketpd' ) ),
		array( 'option' => __( 'MTSS', 'rocketpd' ) ),
		array( 'option' => __( 'SEL', 'rocketpd' ) ),
		array( 'option' => __( 'Math', 'rocketpd' ) ),
		array( 'option' => __( 'School Culture', 'rocketpd' ) ),
	),
	array( 'option' )
);
$shortcode = rocketpd_community_get_field( 'rpd_community_topic_form_shortcode', '' );
?>

<section class="rpd-community-topic rpd-community-section">
	<div class="rpd-container">
		<div class="rpd-community-topic__panel">
			<div class="rpd-community-topic__copy">
				<p class="rpd-community-badge"><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_topic_badge', __( "We're Listening", 'rocketpd' ) ) ); ?></p>
				<h2><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_topic_heading', __( 'Want content on a particular topic?', 'rocketpd' ) ) ); ?></h2>
				<div class="rpd-community-prose"><?php echo wp_kses_post( $body ); ?></div>
				<p class="rpd-community-topic__note"><?php rocketpd_community_icon( 'sparkles' ); ?><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_topic_note', __( 'We review every request and use community input to guide future guides, webinars, and learning resources.', 'rocketpd' ) ) ); ?></p>
			</div>
			<div class="rpd-community-topic__form">
				<?php if ( $shortcode ) : ?>
					<?php echo wp_kses_post( do_shortcode( $shortcode ) ); ?>
				<?php else : ?>
					<form aria-label="<?php esc_attr_e( 'Community topic request preview', 'rocketpd' ); ?>">
						<div class="rpd-community-form-row">
							<label for="rpd-community-topic-name"><span><?php esc_html_e( 'Name', 'rocketpd' ); ?></span><input id="rpd-community-topic-name" type="text" placeholder="<?php esc_attr_e( 'Your name', 'rocketpd' ); ?>"></label>
							<label for="rpd-community-topic-email"><span><?php esc_html_e( 'Email', 'rocketpd' ); ?></span><input id="rpd-community-topic-email" type="email" placeholder="<?php esc_attr_e( 'you@school.org', 'rocketpd' ); ?>"></label>
						</div>
						<label for="rpd-community-topic-select"><span><?php esc_html_e( 'Topic', 'rocketpd' ); ?></span><select id="rpd-community-topic-select"><option><?php esc_html_e( 'Select a focus area', 'rocketpd' ); ?></option></select></label>
						<div class="rpd-community-topic-chips" aria-label="<?php esc_attr_e( 'Example focus areas', 'rocketpd' ); ?>">
							<?php foreach ( $topics as $topic ) : ?>
								<button type="button"><?php echo esc_html( $topic['option'] ?? '' ); ?></button>
							<?php endforeach; ?>
						</div>
						<label for="rpd-community-topic-message"><span><?php esc_html_e( 'What are you working on?', 'rocketpd' ); ?></span><textarea id="rpd-community-topic-message" rows="5" placeholder="<?php esc_attr_e( "Tell us about the challenge you're navigating or the kind of resource that would help...", 'rocketpd' ); ?>"></textarea></label>
						<button class="rpd-community-btn rpd-community-btn--gold" type="button"><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_topic_submit_label', __( "Share What You're Looking For", 'rocketpd' ) ) ); ?><?php rocketpd_community_icon( 'send' ); ?></button>
					</form>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
