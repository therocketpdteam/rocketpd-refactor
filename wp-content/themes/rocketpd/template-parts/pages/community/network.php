<?php
/**
 * Community network section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_community_network_eyebrow', __( 'A growing network', 'rocketpd' ) );
$stat = rocketpd_get_field( 'rpd_community_network_stat', __( '40,000+', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_community_network_headline', __( 'educators and school leaders', 'rocketpd' ) );
$body = rocketpd_get_field( 'rpd_community_network_body', __( 'Join a growing community of educators and school leaders who are working together to support real classrooms.', 'rocketpd' ) );
$cards = rocketpd_get_field(
	'rpd_community_network_cards',
	array(
		array( 'title' => __( 'Looking for practical solutions', 'rocketpd' ), 'body' => __( 'to real challenges in their schools and classrooms.', 'rocketpd' ), 'icon' => 'compass' ),
		array( 'title' => __( 'Sharing ideas', 'rocketpd' ), 'body' => __( 'and learning from each other across grade levels and roles.', 'rocketpd' ), 'icon' => 'chat' ),
		array( 'title' => __( 'Building skills', 'rocketpd' ), 'body' => __( 'that translate directly into their work - every day.', 'rocketpd' ), 'icon' => 'growth' ),
	)
);
$stats = rocketpd_get_field(
	'rpd_community_distribution_stats',
	array(
		array( 'value' => __( '62%', 'rocketpd' ), 'label' => __( 'Teachers & Coaches', 'rocketpd' ) ),
		array( 'value' => __( '21%', 'rocketpd' ), 'label' => __( 'Principals & APs', 'rocketpd' ) ),
		array( 'value' => __( '17%', 'rocketpd' ), 'label' => __( 'District Leaders', 'rocketpd' ) ),
	)
);
?>

<section class="rpd-community-network rpd-community-section">
	<div class="rpd-container">
		<header class="rpd-community-section-header">
			<p class="rpd-community-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $stat ); ?></h2>
			<h3><?php echo esc_html( $headline ); ?></h3>
			<p><?php echo esc_html( $body ); ?></p>
		</header>
		<div class="rpd-community-card-grid rpd-community-card-grid--three">
			<?php foreach ( $cards as $card ) : ?>
				<?php if ( empty( $card['title'] ) ) { continue; } ?>
				<article class="rpd-community-network-card">
					<span class="rpd-community-icon rpd-community-icon--<?php echo esc_attr( sanitize_html_class( $card['icon'] ?? 'compass' ) ); ?>" aria-hidden="true"></span>
					<h3><?php echo esc_html( $card['title'] ); ?></h3>
					<?php if ( ! empty( $card['body'] ) ) : ?>
						<p><?php echo esc_html( $card['body'] ); ?></p>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
		<div class="rpd-community-stat-strip">
			<p><span><?php esc_html_e( 'Members include', 'rocketpd' ); ?></span><?php esc_html_e( 'Educators across every K-12 role', 'rocketpd' ); ?></p>
			<?php foreach ( $stats as $item ) : ?>
				<?php if ( empty( $item['value'] ) ) { continue; } ?>
				<div>
					<strong><?php echo esc_html( $item['value'] ); ?></strong>
					<span><?php echo esc_html( $item['label'] ?? '' ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
