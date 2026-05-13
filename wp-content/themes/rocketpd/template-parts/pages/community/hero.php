<?php
/**
 * Community hero section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$join_url       = rocketpd_get_field( 'rpd_community_join_url', rocketpd_get_option( 'rpd_community_signup_url', home_url( '/community/' ) ) );
$resources_url  = rocketpd_get_field( 'rpd_community_resources_url', home_url( '/resources/' ) );
$eyebrow        = rocketpd_get_field( 'rpd_community_hero_eyebrow', __( 'Free for K-12 educators', 'rocketpd' ) );
$headline       = rocketpd_get_field( 'rpd_community_hero_headline', __( 'The RocketPD Community', 'rocketpd' ) );
$subheadline    = rocketpd_get_field( 'rpd_community_hero_subheadline', __( 'Free, practical professional learning - built for educators.', 'rocketpd' ) );
$body           = rocketpd_get_field( 'rpd_community_hero_body', __( 'Join a growing network of 40,000+ K-12 educators and school leaders accessing real-world resources, expert insights, and practical strategies - designed to support your work every day.', 'rocketpd' ) );
$primary_label  = rocketpd_get_field( 'rpd_community_hero_primary_label', __( "Join the Community - It's Free", 'rocketpd' ) );
$primary_url    = rocketpd_get_field( 'rpd_community_hero_primary_url', $join_url );
$secondary_label = rocketpd_get_field( 'rpd_community_hero_secondary_label', __( 'Explore Resources', 'rocketpd' ) );
$secondary_url  = rocketpd_get_field( 'rpd_community_hero_secondary_url', $resources_url );
$proofs         = rocketpd_get_repeater_rows(
	'rpd_community_hero_proofs',
	array(
		array( 'text' => __( 'Always free', 'rocketpd' ) ),
		array( 'text' => __( 'No credit card', 'rocketpd' ) ),
		array( 'text' => __( 'Instant access', 'rocketpd' ) ),
	),
	array( 'text' )
);
$cards          = rocketpd_get_repeater_rows(
	'rpd_community_hero_cards',
	array(
		array(
			'type'     => __( 'Live webinar - Thu 4pm ET', 'rocketpd' ),
			'title'    => __( 'Building Reading Stamina in Middle School', 'rocketpd' ),
			'meta'     => __( 'with Dr. Maya Chen, Literacy Specialist', 'rocketpd' ),
			'footer'   => __( '+312 attending', 'rocketpd' ),
			'modifier' => 'webinar',
		),
		array(
			'type'     => __( 'Guide - 18 pages', 'rocketpd' ),
			'title'    => __( 'The Practical Guide to Student Engagement', 'rocketpd' ),
			'meta'     => __( 'A field-tested playbook for K-12 classrooms', 'rocketpd' ),
			'footer'   => __( 'Read in 12 min', 'rocketpd' ),
			'modifier' => 'guide',
		),
		array(
			'type'     => __( 'Jamie R. - 3rd Grade Teacher', 'rocketpd' ),
			'title'    => __( 'Has anyone tried small-group conferring during independent reading?', 'rocketpd' ),
			'meta'     => __( 'Looking for routines that actually fit a 45-min block.', 'rocketpd' ),
			'footer'   => __( '24 replies - 47 saves', 'rocketpd' ),
			'modifier' => 'discussion',
		),
	),
	array( 'title' )
);
?>

<section class="rpd-community-hero rpd-community-section">
	<div class="rpd-container rpd-community-hero__grid">
		<div class="rpd-community-hero__copy">
			<p class="rpd-community-pill">◆ <?php echo esc_html( $eyebrow ); ?></p>
			<h1><?php echo esc_html( $headline ); ?></h1>
			<p class="rpd-community-hero__subheadline"><?php echo esc_html( $subheadline ); ?></p>
			<p class="rpd-community-hero__body"><?php echo wp_kses_post( $body ); ?></p>
			<div class="rpd-community-actions">
				<?php if ( $primary_label && $primary_url ) : ?>
					<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?> <span aria-hidden="true">→</span></a>
				<?php endif; ?>
				<?php if ( $secondary_label && $secondary_url ) : ?>
					<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
				<?php endif; ?>
			</div>
			<?php if ( $proofs ) : ?>
				<ul class="rpd-community-proof-list" aria-label="<?php esc_attr_e( 'Community signup details', 'rocketpd' ); ?>">
					<?php foreach ( $proofs as $proof ) : ?>
						<?php if ( ! empty( $proof['text'] ) ) : ?>
							<li><?php echo esc_html( $proof['text'] ); ?></li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
		<div class="rpd-community-hero__visual" aria-label="<?php esc_attr_e( 'RocketPD community resources preview', 'rocketpd' ); ?>">
			<?php foreach ( $cards as $index => $card ) : ?>
				<?php
				$title = ! empty( $card['title'] ) ? $card['title'] : '';
				if ( ! $title ) {
					continue;
				}
				$modifier = ! empty( $card['modifier'] ) ? sanitize_html_class( $card['modifier'] ) : 'card';
				?>
				<article class="rpd-community-float-card rpd-community-float-card--<?php echo esc_attr( $modifier ); ?>">
					<?php if ( ! empty( $card['type'] ) ) : ?>
						<p><?php echo esc_html( $card['type'] ); ?></p>
					<?php endif; ?>
					<h3><?php echo esc_html( $title ); ?></h3>
					<?php if ( ! empty( $card['meta'] ) ) : ?>
						<span><?php echo esc_html( $card['meta'] ); ?></span>
					<?php endif; ?>
					<?php if ( 0 === $index ) : ?>
						<div class="rpd-community-color-dots" aria-hidden="true"><i></i><i></i><i></i><i></i></div>
					<?php endif; ?>
					<?php if ( ! empty( $card['footer'] ) ) : ?>
						<small><?php echo esc_html( $card['footer'] ); ?></small>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
