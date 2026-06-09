<?php
/**
 * Community network section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$proof = rocketpd_community_get_rows(
	'rpd_community_network_proof',
	array(
		array( 'icon' => 'compass', 'title' => __( 'Looking for practical solutions', 'rocketpd' ), 'desc' => __( 'to real challenges in their schools and classrooms.', 'rocketpd' ) ),
		array( 'icon' => 'message', 'title' => __( 'Sharing ideas', 'rocketpd' ), 'desc' => __( 'and learning from each other across grade levels and roles.', 'rocketpd' ) ),
		array( 'icon' => 'trend', 'title' => __( 'Building skills', 'rocketpd' ), 'desc' => __( 'that translate directly into their work — every day.', 'rocketpd' ) ),
	),
	array( 'title' )
);
$roles = rocketpd_community_get_rows(
	'rpd_community_network_roles',
	array(
		array( 'pct' => __( '62%', 'rocketpd' ), 'label' => __( 'Teachers & Coaches', 'rocketpd' ) ),
		array( 'pct' => __( '21%', 'rocketpd' ), 'label' => __( 'Principals & APs', 'rocketpd' ) ),
		array( 'pct' => __( '17%', 'rocketpd' ), 'label' => __( 'District Leaders', 'rocketpd' ) ),
	),
	array( 'pct' )
);
?>

<section class="rpd-community-network rpd-community-section">
	<div class="rpd-container">
		<header class="rpd-community-section-header rpd-community-section-header--network">
			<p class="rpd-community-eyebrow"><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_network_eyebrow', __( 'A Growing Network', 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_network_stat', __( '40,000+', 'rocketpd' ) ) ); ?></h2>
			<h3><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_network_subhead', __( 'educators and school leaders', 'rocketpd' ) ) ); ?></h3>
			<p><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_network_body', __( 'Join a growing community of educators and school leaders who are working together to support real classrooms.', 'rocketpd' ) ) ); ?></p>
		</header>
		<div class="rpd-community-card-grid rpd-community-card-grid--three">
			<?php foreach ( $proof as $card ) : ?>
				<article class="rpd-community-network-card">
					<span class="rpd-community-icon" aria-hidden="true"><?php rocketpd_community_icon( $card['icon'] ?? 'compass' ); ?></span>
					<h3><?php echo esc_html( $card['title'] ?? '' ); ?></h3>
					<p><?php echo esc_html( $card['desc'] ?? '' ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
		<div class="rpd-community-stat-strip">
			<p><span><?php esc_html_e( 'Members include', 'rocketpd' ); ?></span><?php esc_html_e( 'Educators across every K–12 role', 'rocketpd' ); ?></p>
			<?php foreach ( $roles as $role ) : ?>
				<div><strong><?php echo esc_html( $role['pct'] ?? '' ); ?></strong><span><?php echo esc_html( $role['label'] ?? '' ); ?></span></div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
