<?php
/**
 * Community pathways section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$body = rocketpd_community_get_field(
	'rpd_community_pathways_body',
	'<p>' . esc_html__( 'The RocketPD Community is the starting point.', 'rocketpd' ) . '</p><p>' . esc_html__( "As a member, you'll also get early visibility into deeper learning opportunities — along with preferred access and pricing.", 'rocketpd' ) . '</p>'
);
$cards = rocketpd_community_get_rows(
	'rpd_community_pathways_cards',
	array(
		array( 'icon' => 'users', 'accent' => 'magenta', 'is_current' => 1, 'badge' => __( "You're Here", 'rocketpd' ), 'title' => __( 'Community', 'rocketpd' ), 'subtitle' => __( 'Free for educators', 'rocketpd' ), 'description' => __( 'Practical resources, live sessions, and connection with peers — at no cost.', 'rocketpd' ), 'features' => "Curated guides & playbooks\nLive webinars & meet-ups\nDiscussion spaces", 'link_label' => '', 'link_url' => '#' ),
		array( 'icon' => 'graduation', 'accent' => 'purple', 'is_current' => 0, 'badge' => '', 'title' => __( 'LaunchPad', 'rocketpd' ), 'subtitle' => __( 'For educators & teams', 'rocketpd' ), 'description' => __( 'Access to a full library of expert-led courses, workbooks, and professional credit pathways.', 'rocketpd' ), 'features' => "Expert-led courses\nWorkbooks & certificates\nCredit pathways", 'link_label' => __( 'Explore LaunchPad', 'rocketpd' ), 'link_url' => home_url( '/launchpad/' ) ),
		array( 'icon' => 'building', 'accent' => 'gold', 'is_current' => 0, 'badge' => '', 'title' => __( 'LaunchPad+', 'rocketpd' ), 'subtitle' => __( 'For districts', 'rocketpd' ), 'description' => __( 'A custom-branded platform for districts to organize learning, host internal content, and support teams at scale.', 'rocketpd' ), 'features' => "District-branded platform\nHost internal content\nTeam-scale support", 'link_label' => __( 'Explore LaunchPad+', 'rocketpd' ), 'link_url' => home_url( '/launchpad-plus/' ) ),
	),
	array( 'title' )
);
?>

<section class="rpd-community-pathways rpd-community-section rpd-community-section--tint">
	<div class="rpd-container">
		<header class="rpd-community-section-header">
			<p class="rpd-community-eyebrow"><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_pathways_eyebrow', __( "When You're Ready", 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_pathways_heading', __( "Start free. Go further when you're ready.", 'rocketpd' ) ) ); ?></h2>
			<div class="rpd-community-prose"><?php echo wp_kses_post( $body ); ?></div>
		</header>
		<div class="rpd-community-pathway-grid">
			<?php foreach ( $cards as $card ) : ?>
				<?php $is_plus = 'LaunchPad+' === ( $card['title'] ?? '' ); ?>
				<article class="rpd-community-plan-card<?php echo $is_plus ? ' rpd-community-plan-card--dark' : ''; ?><?php echo ! empty( $card['is_current'] ) ? ' rpd-community-plan-card--current' : ''; ?>">
					<?php if ( ! empty( $card['badge'] ) ) : ?><p class="rpd-community-plan-card__badge"><?php echo esc_html( $card['badge'] ); ?></p><?php endif; ?>
					<span class="rpd-community-icon" aria-hidden="true"><?php rocketpd_community_icon( $card['icon'] ?? 'users' ); ?></span>
					<h3><?php echo esc_html( $card['title'] ?? '' ); ?></h3>
					<strong><?php echo esc_html( $card['subtitle'] ?? '' ); ?></strong>
					<p><?php echo esc_html( $card['description'] ?? '' ); ?></p>
					<ul>
						<?php foreach ( preg_split( '/\r\n|\r|\n/', (string) ( $card['features'] ?? '' ) ) as $feature ) : ?>
							<?php if ( $feature ) : ?><li><?php rocketpd_community_icon( 'check' ); ?><?php echo esc_html( $feature ); ?></li><?php endif; ?>
						<?php endforeach; ?>
					</ul>
					<?php if ( ! empty( $card['link_label'] ) ) : ?><a href="<?php echo esc_url( $card['link_url'] ?? '#' ); ?>"><?php echo esc_html( $card['link_label'] ); ?> <span aria-hidden="true">→</span></a><?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
		<p class="rpd-community-pathways__note"><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_pathways_footnote', __( 'You can start here — and grow into what you need.', 'rocketpd' ) ) ); ?></p>
	</div>
</section>
