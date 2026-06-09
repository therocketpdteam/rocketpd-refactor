<?php
/**
 * Community hero section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow         = rocketpd_community_get_field( 'rpd_community_hero_eyebrow', __( 'Free for K–12 Educators', 'rocketpd' ) );
$headline        = rocketpd_community_get_field( 'rpd_community_hero_headline', __( 'The RocketPD Community', 'rocketpd' ) );
$subhead         = rocketpd_community_get_field( 'rpd_community_hero_subhead', __( 'Free, practical professional learning — built for educators.', 'rocketpd' ) );
$body            = rocketpd_community_get_field( 'rpd_community_hero_body', __( 'Join a growing network of <strong>40,000+ K–12 educators and school leaders</strong> accessing real-world resources, expert insights, and practical strategies — designed to support your work every day.', 'rocketpd' ) );
$primary_label   = rocketpd_community_get_field( 'rpd_community_hero_primary_cta_label', __( "Join the Community — It's Free", 'rocketpd' ) );
$primary_url     = rocketpd_community_get_field( 'rpd_community_hero_primary_cta_url', '#' );
$secondary_label = rocketpd_community_get_field( 'rpd_community_hero_secondary_cta_label', __( 'Explore Resources', 'rocketpd' ) );
$secondary_url   = rocketpd_community_get_field( 'rpd_community_hero_secondary_cta_url', '#' );
$trust_items     = rocketpd_community_get_rows(
	'rpd_community_hero_trust_items',
	array(
		array( 'item' => __( 'Always free', 'rocketpd' ) ),
		array( 'item' => __( 'No credit card', 'rocketpd' ) ),
		array( 'item' => __( 'Instant access', 'rocketpd' ) ),
	),
	array( 'item' )
);
?>

<section class="rpd-community-hero rpd-community-section">
	<div class="rpd-community-glow rpd-community-glow--magenta"></div>
	<div class="rpd-community-glow rpd-community-glow--gold"></div>
	<div class="rpd-container rpd-community-hero__grid">
		<div class="rpd-community-hero__copy">
			<p class="rpd-community-pill"><?php rocketpd_community_icon( 'heart' ); ?><?php echo esc_html( $eyebrow ); ?></p>
			<h1><?php echo esc_html( $headline ); ?></h1>
			<p class="rpd-community-hero__subhead"><?php echo esc_html( $subhead ); ?></p>
			<p class="rpd-community-hero__body"><?php echo wp_kses_post( $body ); ?></p>
			<div class="rpd-community-actions">
				<?php if ( $primary_label ) : ?>
					<a class="rpd-community-btn rpd-community-btn--gold" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?><?php rocketpd_community_icon( 'arrow' ); ?></a>
				<?php endif; ?>
				<?php if ( $secondary_label ) : ?>
					<a class="rpd-community-btn rpd-community-btn--outline" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
				<?php endif; ?>
			</div>
			<?php if ( $trust_items ) : ?>
				<ul class="rpd-community-trust-list" aria-label="<?php esc_attr_e( 'Community signup details', 'rocketpd' ); ?>">
					<?php foreach ( $trust_items as $item ) : ?>
						<?php if ( ! empty( $item['item'] ) ) : ?>
							<li><?php rocketpd_community_icon( 'check' ); ?><?php echo esc_html( $item['item'] ); ?></li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
		<div class="rpd-community-hero__visual" aria-label="<?php esc_attr_e( 'RocketPD community resources preview', 'rocketpd' ); ?>">
			<article class="rpd-community-stack-card rpd-community-stack-card--webinar">
				<p class="rpd-community-stack-card__meta"><?php rocketpd_community_icon( 'calendar' ); ?><?php esc_html_e( 'Live Webinar · Thu 4pm ET', 'rocketpd' ); ?></p>
				<h3><?php esc_html_e( 'Building Reading Stamina in Middle School', 'rocketpd' ); ?></h3>
				<p><?php esc_html_e( 'with Dr. Maya Chen, Literacy Specialist', 'rocketpd' ); ?></p>
				<div class="rpd-community-avatar-row" aria-hidden="true"><i></i><i></i><i></i><i></i><span><?php esc_html_e( '+312 attending', 'rocketpd' ); ?></span></div>
			</article>
			<article class="rpd-community-stack-card rpd-community-stack-card--guide">
				<p class="rpd-community-stack-card__meta rpd-community-stack-card__meta--purple"><?php rocketpd_community_icon( 'book' ); ?><?php esc_html_e( 'Guide · 18 pages', 'rocketpd' ); ?></p>
				<h3><?php esc_html_e( 'The Practical Guide to Student Engagement', 'rocketpd' ); ?></h3>
				<p><?php esc_html_e( 'A field-tested playbook for K–12 classrooms', 'rocketpd' ); ?></p>
				<div class="rpd-community-stack-card__footer"><span><?php rocketpd_community_icon( 'play' ); ?><?php esc_html_e( 'Read in 12 min', 'rocketpd' ); ?></span><b><?php esc_html_e( 'Free', 'rocketpd' ); ?></b></div>
			</article>
			<article class="rpd-community-stack-card rpd-community-stack-card--discussion">
				<div class="rpd-community-person">
					<span aria-hidden="true">JR</span>
					<p><strong><?php esc_html_e( 'Jamie R.', 'rocketpd' ); ?></strong><small><?php esc_html_e( '3rd Grade Teacher · IL', 'rocketpd' ); ?></small></p>
				</div>
				<blockquote><?php esc_html_e( '"Has anyone tried small-group conferring during independent reading? Looking for routines that actually fit a 45-min block."', 'rocketpd' ); ?></blockquote>
				<div class="rpd-community-discussion-meta"><span><?php rocketpd_community_icon( 'message' ); ?><?php esc_html_e( '24 replies', 'rocketpd' ); ?></span><span><?php rocketpd_community_icon( 'heart' ); ?><?php esc_html_e( '47', 'rocketpd' ); ?></span></div>
			</article>
		</div>
	</div>
</section>
