<?php
/**
 * Instructor learning ecosystem section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_instructors_learning_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_eyebrow  = __( 'The Learning Ecosystem', 'rocketpd' );
$default_headline = __( 'Multiple ways to learn from every expert.', 'rocketpd' );
$default_body     = __( "Whether you have 15 minutes or a full school year, there's a way to bring expert thinking into your team's work.", 'rocketpd' );
$default_cards    = array(
	array(
		'kicker'    => __( 'Free for educators', 'rocketpd' ),
		'title'     => __( 'Free Resources', 'rocketpd' ),
		'body'      => __( 'Guides, podcasts, webinars, playbooks, and articles designed to help educators explore ideas and solve immediate challenges.', 'rocketpd' ),
		'items'     => "Downloadable guides & playbooks\nOn-demand podcast library\nRecorded webinars",
		'cta_label' => __( 'Browse free library', 'rocketpd' ),
		'cta_url'   => home_url( '/resources/' ),
		'featured'  => 0,
		'icon'      => 'book',
	),
	array(
		'kicker'    => __( 'Most popular', 'rocketpd' ),
		'title'     => __( 'Flexible Professional Learning', 'rocketpd' ),
		'body'      => __( 'Self-paced LaunchPad courses and live-virtual cohort experiences that fit educator schedules and strategic priorities.', 'rocketpd' ),
		'items'     => "LaunchPad self-paced video courses\nLive-virtual cohorts (multi-session)\nCertificates of completion",
		'cta_label' => __( 'Explore LaunchPad', 'rocketpd' ),
		'cta_url'   => home_url( '/launchpad/' ),
		'featured'  => 1,
		'icon'      => 'graduation-cap',
	),
	array(
		'kicker'    => __( 'For schools & districts', 'rocketpd' ),
		'title'     => __( 'Customized District Support', 'rocketpd' ),
		'body'      => __( 'On-site workshops and tailored professional learning engagements designed around district goals and implementation needs.', 'rocketpd' ),
		'items'     => "On-site & live-virtual workshops\nOutcomes-based engagements\nBuilt for full teams",
		'cta_label' => __( 'Talk with RocketPD', 'rocketpd' ),
		'cta_url'   => home_url( '/contact/' ),
		'featured'  => 0,
		'icon'      => 'building-2',
	),
);

if ( 'custom' === $mode ) {
	$eyebrow  = rocketpd_get_field( 'rpd_instructors_learning_eyebrow', $default_eyebrow );
	$headline = rocketpd_get_field( 'rpd_instructors_learning_headline', $default_headline );
	$body     = rocketpd_get_field( 'rpd_instructors_learning_body', $default_body );
	$acf_cards = rocketpd_get_field( 'rpd_instructors_learning_cards', null );
	$cards    = is_array( $acf_cards ) && ! empty( $acf_cards ) ? $acf_cards : $default_cards;
} else {
	$eyebrow  = $default_eyebrow;
	$headline = $default_headline;
	$body     = $default_body;
	$cards    = $default_cards;
}
?>

<section class="rpd-instructors-learning">
	<div class="rpd-container">
		<header class="rpd-instructors-section-header">
			<p class="rpd-instructors-pill"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</header>
		<div class="rpd-instructors-learning__grid">
			<?php foreach ( $cards as $card ) : ?>
				<?php
				$items     = ! empty( $card['items'] ) ? preg_split( '/\r\n|\r|\n/', (string) $card['items'] ) : array();
				$featured  = ! empty( $card['featured'] );
				$icon_map  = array( 'cap' => 'graduation-cap', 'building' => 'building-2' );
				$card_icon = $icon_map[ $card['icon'] ?? '' ] ?? ( $card['icon'] ?? 'book' );
				?>
				<div class="rpd-instructors-learning-card__wrap<?php echo $featured ? ' has-badge' : ''; ?>">
					<?php if ( $featured ) : ?>
						<span class="rpd-instructors-learning-card__badge"><?php esc_html_e( 'Most popular', 'rocketpd' ); ?></span>
					<?php endif; ?>
					<article class="rpd-instructors-learning-card<?php echo $featured ? ' is-featured' : ''; ?>">
						<span class="rpd-instructors-learning-card__icon" data-icon="<?php echo esc_attr( $card_icon ); ?>"><?php echo rocketpd_get_icon( $card_icon, 24 ); ?></span>
						<?php if ( ! empty( $card['kicker'] ) && ! $featured ) : ?>
							<p class="rpd-instructors-learning-card__kicker"><?php echo esc_html( $card['kicker'] ); ?></p>
						<?php endif; ?>
						<h3><?php echo esc_html( $card['title'] ?? '' ); ?></h3>
						<p><?php echo esc_html( $card['body'] ?? '' ); ?></p>
						<?php if ( $items ) : ?>
							<ul>
								<?php foreach ( $items as $item ) : ?>
									<?php if ( trim( $item ) ) : ?>
										<li><?php echo esc_html( trim( $item ) ); ?></li>
									<?php endif; ?>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
						<?php if ( ! empty( $card['cta_label'] ) && ! empty( $card['cta_url'] ) ) : ?>
							<a class="rpd-instructors-learning-card__cta<?php echo $featured ? ' rpd-btn rpd-btn--gold' : ' rpd-btn rpd-btn--outline-purple'; ?>" href="<?php echo esc_url( $card['cta_url'] ); ?>"><?php echo esc_html( $card['cta_label'] ); ?></a>
						<?php endif; ?>
					</article>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
