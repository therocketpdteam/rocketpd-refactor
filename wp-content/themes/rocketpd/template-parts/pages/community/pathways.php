<?php
/**
 * Community pathways section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_community_pathways_eyebrow', __( "When you're ready", 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_community_pathways_headline', __( "Start free. Go further when you're ready.", 'rocketpd' ) );
$body = rocketpd_get_field( 'rpd_community_pathways_body', __( "The RocketPD Community is the starting point. As a member, you'll also get early visibility into deeper learning opportunities - along with preferred access and pricing.", 'rocketpd' ) );
$note = rocketpd_get_field( 'rpd_community_pathways_note', __( 'You can start here - and grow into what you need.', 'rocketpd' ) );
$plans = rocketpd_get_repeater_rows(
	'rpd_community_pathway_cards',
	array(
		array( 'badge' => __( "You're Here", 'rocketpd' ), 'title' => __( 'Community', 'rocketpd' ), 'audience' => __( 'Free for educators', 'rocketpd' ), 'body' => __( 'Practical resources, live sessions, and connection with peers - at no cost.', 'rocketpd' ), 'bullets' => "Curated guides & playbooks\nLive webinars & meet-ups\nDiscussion spaces", 'cta_label' => '', 'cta_url' => '', 'featured' => 0 ),
		array( 'badge' => '', 'title' => __( 'LaunchPad', 'rocketpd' ), 'audience' => __( 'For educators & teams', 'rocketpd' ), 'body' => __( 'Access to a full library of expert-led courses, workbooks, and professional credit pathways.', 'rocketpd' ), 'bullets' => "Expert-led courses\nWorkbooks & certificates\nCredit pathways", 'cta_label' => __( 'Explore LaunchPad', 'rocketpd' ), 'cta_url' => home_url( '/launchpad/' ), 'featured' => 0 ),
		array( 'badge' => '', 'title' => __( 'LaunchPad+', 'rocketpd' ), 'audience' => __( 'For districts', 'rocketpd' ), 'body' => __( 'A custom-branded platform for districts to organize learning, host internal content, and support teams at scale.', 'rocketpd' ), 'bullets' => "District-branded platform\nHost internal content\nTeam-scale support", 'cta_label' => __( 'Explore LaunchPad+', 'rocketpd' ), 'cta_url' => home_url( '/launchpad-plus/' ), 'featured' => 1 ),
	),
	array( 'title' )
);
?>

<section class="rpd-community-pathways rpd-community-section rpd-community-section--lavender">
	<div class="rpd-container">
		<header class="rpd-community-section-header">
			<p class="rpd-community-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</header>
		<div class="rpd-community-pathway-grid">
			<?php foreach ( $plans as $plan ) : ?>
				<?php if ( empty( $plan['title'] ) ) { continue; } ?>
				<article class="rpd-community-plan-card<?php echo ! empty( $plan['featured'] ) ? ' rpd-community-plan-card--dark' : ''; ?>">
					<?php if ( ! empty( $plan['badge'] ) ) : ?>
						<p class="rpd-community-plan-card__badge"><?php echo esc_html( $plan['badge'] ); ?></p>
					<?php endif; ?>
					<h3><?php echo esc_html( $plan['title'] ); ?></h3>
					<?php if ( ! empty( $plan['audience'] ) ) : ?>
						<strong><?php echo esc_html( $plan['audience'] ); ?></strong>
					<?php endif; ?>
					<?php if ( ! empty( $plan['body'] ) ) : ?>
						<p><?php echo esc_html( $plan['body'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $plan['bullets'] ) ) : ?>
						<ul>
							<?php foreach ( preg_split( '/\r\n|\r|\n/', $plan['bullets'] ) as $bullet ) : ?>
								<?php if ( $bullet ) : ?>
									<li><?php echo esc_html( $bullet ); ?></li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<?php if ( ! empty( $plan['cta_label'] ) && ! empty( $plan['cta_url'] ) ) : ?>
						<a href="<?php echo esc_url( $plan['cta_url'] ); ?>"><?php echo esc_html( $plan['cta_label'] ); ?> <span aria-hidden="true">→</span></a>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
		<p class="rpd-community-pathways__note"><?php echo esc_html( $note ); ?></p>
	</div>
</section>
