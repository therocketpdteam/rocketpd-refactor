<?php
/**
 * Instructor learning ecosystem section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = rocketpd_get_field( 'rpd_instructors_learning_eyebrow', __( 'The Learning Ecosystem', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_instructors_learning_headline', __( 'Multiple ways to learn from every expert.', 'rocketpd' ) );
$body     = rocketpd_get_field( 'rpd_instructors_learning_body', __( "Whether you have 15 minutes or a full school year, there's a way to bring expert thinking into your team's work.", 'rocketpd' ) );
$cards    = rocketpd_get_repeater_rows(
	'rpd_instructors_learning_cards',
	array(
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
			'icon'      => 'cap',
		),
		array(
			'kicker'    => __( 'For schools & districts', 'rocketpd' ),
			'title'     => __( 'Customized District Support', 'rocketpd' ),
			'body'      => __( 'On-site workshops and tailored professional learning engagements designed around district goals and implementation needs.', 'rocketpd' ),
			'items'     => "On-site & live-virtual workshops\nOutcomes-based engagements\nBuilt for full teams",
			'cta_label' => __( 'Talk with RocketPD', 'rocketpd' ),
			'cta_url'   => home_url( '/contact/' ),
			'featured'  => 0,
			'icon'      => 'building',
		),
	),
	array( 'title', 'body' )
);
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
				$items = ! empty( $card['items'] ) ? preg_split( '/\r\n|\r|\n/', (string) $card['items'] ) : array();
				$featured = ! empty( $card['featured'] );
				?>
				<article class="rpd-instructors-learning-card<?php echo $featured ? ' is-featured' : ''; ?>">
					<span class="rpd-instructors-learning-card__icon" data-icon="<?php echo esc_attr( $card['icon'] ?? 'spark' ); ?>" aria-hidden="true"></span>
					<?php if ( ! empty( $card['kicker'] ) ) : ?>
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
						<a href="<?php echo esc_url( $card['cta_url'] ); ?>"><?php echo esc_html( $card['cta_label'] ); ?> <span aria-hidden="true">-></span></a>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
