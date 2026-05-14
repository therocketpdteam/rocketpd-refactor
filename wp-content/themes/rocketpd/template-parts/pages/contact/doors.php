<?php
/**
 * Contact audience cards.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$community_url = rocketpd_get_option( 'rpd_community_signup_url', home_url( '/community/' ) );
$jesse_url     = rocketpd_get_option( 'rpd_jesse_schedule_url', 'https://rocketpd.com/jesse-schedule/' );
$support_email = rocketpd_get_option( 'rpd_support_email', 'support@rocketpd.com' );
$eyebrow       = rocketpd_get_field( 'rpd_contact_doors_eyebrow', __( 'Choose your door', 'rocketpd' ) );
$headline      = rocketpd_get_field( 'rpd_contact_doors_headline', __( "Tell us a bit about you, and we'll point you to the right spot.", 'rocketpd' ) );
$body          = rocketpd_get_field( 'rpd_contact_doors_body', __( 'Each path lands you with a real person on our team - no chatbot loops, no ticket purgatory.', 'rocketpd' ) );

$fallback_doors = array(
	array(
		'style'     => 'light',
		'title'     => __( "I'm an educator.", 'rocketpd' ),
		'body'      => __( 'Teacher, instructional coach, or anyone who works with kids? Start with LaunchPad - or just come hang out in the Community for free.', 'rocketpd' ),
		'bullets'   => array(
			__( 'Free Community access', 'rocketpd' ),
			__( '40,000+ educators already inside', 'rocketpd' ),
			__( 'LaunchPad self-serve from there', 'rocketpd' ),
		),
		'cta_label' => __( 'Join the Community', 'rocketpd' ),
		'cta_url'   => $community_url,
	),
	array(
		'style'          => 'dark-featured',
		'featured_badge' => __( 'Most contact us here', 'rocketpd' ),
		'title'          => __( 'I lead a school or district.', 'rocketpd' ),
		'body'           => __( "Looking at this for your team, building, or system? Book 20 minutes with Jesse - he'll listen first, then walk you through what fits.", 'rocketpd' ),
		'bullets'        => array(
			__( '20-minute walkthrough', 'rocketpd' ),
			__( 'Custom pilot and pricing options', 'rocketpd' ),
			__( 'Trusted by 850+ districts', 'rocketpd' ),
		),
		'cta_label'      => __( 'Book Time with Jesse', 'rocketpd' ),
		'cta_url'        => $jesse_url,
		'subcta_label'   => __( 'Or fill out a form to learn more', 'rocketpd' ),
		'subcta_url'     => '#walkthrough-form',
	),
	array(
		'style'     => 'light-alt',
		'title'     => __( "I'm already a member.", 'rocketpd' ),
		'body'      => __( "Need help with your account, billing, a course, or your district rollout? Our support team's got you.", 'rocketpd' ),
		'bullets'   => array(
			__( 'Account, login, and billing questions', 'rocketpd' ),
			__( 'Course or LaunchPad access issues', 'rocketpd' ),
			__( 'Replies within 1 business day', 'rocketpd' ),
		),
		'cta_label' => __( 'Email Support', 'rocketpd' ),
		'cta_url'   => 'mailto:' . $support_email,
	),
);

$doors = rocketpd_get_repeater_rows( 'rpd_contact_doors', $fallback_doors, array( 'title', 'body', 'cta_label', 'cta_url' ) );

if ( count( $doors ) < 3 ) {
	$doors = $fallback_doors;
}
?>

<section class="rpd-contact-doors rpd-section">
	<div class="rpd-container">
		<header class="rpd-section-header">
			<p class="rpd-section-header__eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2 class="rpd-section-header__title"><?php echo esc_html( $headline ); ?></h2>
			<p class="rpd-section-header__body"><?php echo esc_html( $body ); ?></p>
		</header>

		<?php if ( is_array( $doors ) && ! empty( $doors ) ) : ?>
			<div class="rpd-contact-door-grid">
				<?php foreach ( $doors as $door ) : ?>
					<?php
					$style         = isset( $door['style'] ) ? sanitize_html_class( $door['style'] ) : 'light';
					$featured_badge = isset( $door['featured_badge'] ) ? $door['featured_badge'] : '';
					$title         = isset( $door['title'] ) ? $door['title'] : '';
					$door_body     = isset( $door['body'] ) ? $door['body'] : '';
					$door_bullets   = isset( $door['bullets'] ) && is_array( $door['bullets'] ) ? $door['bullets'] : array();
					$cta_label     = isset( $door['cta_label'] ) ? $door['cta_label'] : '';
					$cta_url       = isset( $door['cta_url'] ) ? $door['cta_url'] : '';
					$cta_is_jesse  = $cta_url && $jesse_url && $cta_url === $jesse_url;
					$subcta_label  = isset( $door['subcta_label'] ) ? $door['subcta_label'] : '';
					$subcta_url    = isset( $door['subcta_url'] ) ? $door['subcta_url'] : '';
					?>
					<article class="rpd-contact-door rpd-contact-door--<?php echo esc_attr( $style ); ?>">
						<?php if ( $featured_badge ) : ?>
							<p class="rpd-contact-door__badge"><?php echo esc_html( $featured_badge ); ?></p>
						<?php endif; ?>
						<span class="rpd-icon-chip" aria-hidden="true"></span>
						<h3><?php echo esc_html( $title ); ?></h3>
						<p><?php echo esc_html( $door_body ); ?></p>
						<?php if ( ! empty( $door_bullets ) ) : ?>
							<ul class="rpd-contact-door__list">
								<?php foreach ( $door_bullets as $bullet ) : ?>
									<?php if ( $bullet ) : ?>
										<li><?php echo esc_html( $bullet ); ?></li>
									<?php endif; ?>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
						<?php if ( $cta_label && $cta_url ) : ?>
							<a class="rpd-btn <?php echo 'dark-featured' === $style ? 'rpd-btn--gold' : 'rpd-btn--purple'; ?>" href="<?php echo esc_url( $cta_url ); ?>"<?php echo $cta_is_jesse ? ' target="_blank" rel="noopener"' : ''; ?>>
								<?php echo esc_html( $cta_label ); ?>
							</a>
						<?php endif; ?>
						<?php if ( $subcta_label && $subcta_url ) : ?>
							<a class="rpd-contact-door__subcta" href="<?php echo esc_url( $subcta_url ); ?>"><?php echo esc_html( $subcta_label ); ?></a>
						<?php endif; ?>
					</article>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
