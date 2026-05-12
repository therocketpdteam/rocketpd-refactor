<?php
/**
 * Contact audience cards.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$community_url = rocketpd_get_option( 'rpd_community_signup_url', home_url( '/' ) );
$jesse_url     = rocketpd_get_option( 'rpd_jesse_schedule_url', home_url( '/contact/#jesse' ) );
$support_email = rocketpd_get_option( 'rpd_support_email', 'support@rocketpd.com' );
$eyebrow       = rocketpd_get_field( 'rpd_contact_doors_eyebrow', __( 'Choose your door', 'rocketpd' ) );
$headline      = rocketpd_get_field( 'rpd_contact_doors_headline', __( "Tell us a bit about you, and we'll point you to the right spot.", 'rocketpd' ) );
$body          = rocketpd_get_field( 'rpd_contact_doors_body', __( 'Each path lands you with a real person on our team — no chatbot loops, no ticket purgatory.', 'rocketpd' ) );
$doors         = rocketpd_get_field(
	'rpd_contact_doors',
	array(
		array(
			'style'     => 'educator',
			'icon'      => 'learning',
			'title'     => __( "I'm an educator.", 'rocketpd' ),
			'body'      => __( 'Teacher, instructional coach, or anyone who works with kids? Start with LaunchPad — or just come hang out in the Community for free.', 'rocketpd' ),
			'bullets'   => array(
				array( 'text' => __( 'Free Community access (no card)', 'rocketpd' ) ),
				array( 'text' => __( '40,000+ educators already inside', 'rocketpd' ) ),
				array( 'text' => __( 'LaunchPad self-serve from there', 'rocketpd' ) ),
			),
			'cta_label' => __( 'Join the Community', 'rocketpd' ),
			'cta_url'   => $community_url,
		),
		array(
			'style'          => 'leader',
			'icon'           => 'building',
			'featured_badge' => __( 'Most contact us here', 'rocketpd' ),
			'title'          => __( 'I lead a school or district.', 'rocketpd' ),
			'body'           => __( "Looking at this for your team, building, or system? Book 20 minutes with Jesse — he'll listen first, then walk you through what fits.", 'rocketpd' ),
			'bullets'        => array(
				array( 'text' => __( '20-minute walkthrough (not a pitch)', 'rocketpd' ) ),
				array( 'text' => __( 'Custom pilot + pricing options', 'rocketpd' ) ),
				array( 'text' => __( 'Trusted by 850+ districts', 'rocketpd' ) ),
			),
			'cta_label'      => __( 'Book Time with Jesse', 'rocketpd' ),
			'cta_url'        => $jesse_url,
			'subcta_label'   => __( 'Or fill out a form to learn more', 'rocketpd' ),
			'subcta_url'     => '#walkthrough-form',
		),
		array(
			'style'     => 'member',
			'icon'      => 'support',
			'title'     => __( "I'm already a member.", 'rocketpd' ),
			'body'      => __( "Need help with your account, billing, a course, or your district rollout? Our support team's got you.", 'rocketpd' ),
			'bullets'   => array(
				array( 'text' => __( 'Account, login & billing questions', 'rocketpd' ) ),
				array( 'text' => __( 'Course or LaunchPad access issues', 'rocketpd' ) ),
				array( 'text' => __( 'Replies within 1 business day', 'rocketpd' ) ),
			),
			'cta_label' => __( 'Email Support', 'rocketpd' ),
			'cta_url'   => 'mailto:' . $support_email,
		),
	)
);
?>

<section class="rpd-contact-doors rpd-contact-section">
	<div class="rpd-container">
		<header class="rpd-contact-section-header">
			<p class="rpd-contact-pill rpd-contact-pill--gold"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</header>

		<?php if ( is_array( $doors ) && ! empty( $doors ) ) : ?>
			<div class="rpd-contact-door-grid">
				<?php foreach ( $doors as $door ) : ?>
					<?php
					$style          = isset( $door['style'] ) ? sanitize_html_class( $door['style'] ) : 'educator';
					$icon           = isset( $door['icon'] ) ? sanitize_html_class( $door['icon'] ) : 'learning';
					$featured_badge = isset( $door['featured_badge'] ) ? $door['featured_badge'] : '';
					$title          = isset( $door['title'] ) ? $door['title'] : '';
					$door_body      = isset( $door['body'] ) ? $door['body'] : '';
					$bullets        = isset( $door['bullets'] ) && is_array( $door['bullets'] ) ? $door['bullets'] : array();
					$cta_label      = isset( $door['cta_label'] ) ? $door['cta_label'] : '';
					$cta_url        = isset( $door['cta_url'] ) ? $door['cta_url'] : '';
					$subcta_label   = isset( $door['subcta_label'] ) ? $door['subcta_label'] : '';
					$subcta_url     = isset( $door['subcta_url'] ) ? $door['subcta_url'] : '';
					$cta_class      = 'leader' === $style ? 'rpd-btn--gold' : ( 'member' === $style ? 'rpd-btn--outline-purple' : 'rpd-btn--purple' );
					?>
					<?php if ( $title || $door_body ) : ?>
						<article class="rpd-contact-door rpd-contact-door--<?php echo esc_attr( $style ); ?>">
							<?php if ( $featured_badge ) : ?>
								<p class="rpd-contact-door__badge"><?php echo esc_html( $featured_badge ); ?></p>
							<?php endif; ?>
							<span class="rpd-contact-icon rpd-contact-icon--<?php echo esc_attr( $icon ); ?>" aria-hidden="true"></span>
							<?php if ( $title ) : ?>
								<h3><?php echo esc_html( $title ); ?></h3>
							<?php endif; ?>
							<?php if ( $door_body ) : ?>
								<p><?php echo esc_html( $door_body ); ?></p>
							<?php endif; ?>
							<?php if ( ! empty( $bullets ) ) : ?>
								<ul class="rpd-contact-check-list">
									<?php foreach ( $bullets as $bullet ) : ?>
										<?php $bullet_text = isset( $bullet['text'] ) ? $bullet['text'] : ''; ?>
										<?php if ( $bullet_text ) : ?>
											<li><?php echo esc_html( $bullet_text ); ?></li>
										<?php endif; ?>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
							<?php if ( $cta_label && $cta_url ) : ?>
								<a class="rpd-btn <?php echo esc_attr( $cta_class ); ?>" href="<?php echo esc_url( $cta_url ); ?>">
									<?php echo esc_html( $cta_label ); ?> <span aria-hidden="true">→</span>
								</a>
							<?php endif; ?>
							<?php if ( $subcta_label && $subcta_url ) : ?>
								<a class="rpd-contact-door__subcta" href="<?php echo esc_url( $subcta_url ); ?>"><?php echo esc_html( $subcta_label ); ?> <span aria-hidden="true">→</span></a>
							<?php endif; ?>
						</article>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
