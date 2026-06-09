<?php
/**
 * LaunchPad Plus learning experiences.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cards = rocketpd_lpp_get_field(
	'rpd_lpp_experiences_cards',
	array(
		array( 'title' => __( 'Live-virtual cohorts', 'rocketpd' ), 'body' => __( 'Join expert-led cohorts and learning experiences offered throughout the year.', 'rocketpd' ), 'icon' => 'users' ),
		array( 'title' => __( 'New course releases', 'rocketpd' ), 'body' => __( "Get continuous access to new RocketPD courses as they're added to the library.", 'rocketpd' ), 'icon' => 'sparkles' ),
		array( 'title' => __( 'Guides and PL resources', 'rocketpd' ), 'body' => __( 'Access ongoing guides, frameworks, and professional learning resources.', 'rocketpd' ), 'icon' => 'library' ),
	)
);
?>

<section class="rpd-lpp-experiences rpd-lpp-section rpd-lpp-dark">
	<div class="rpd-container">
		<header class="rpd-lpp-section-header rpd-lpp-section-header--center">
			<p class="rpd-lpp-eyebrow"><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_experiences_eyebrow', __( 'Beyond the Platform', 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_experiences_headline', __( 'Connected to RocketPD Learning Experiences.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_experiences_intro', __( "LaunchPad+ extends access to RocketPD's broader learning ecosystem.", 'rocketpd' ) ) ); ?></p>
		</header>
		<div class="rpd-lpp-card-row rpd-lpp-card-row--three">
			<?php foreach ( $cards as $card ) : ?>
				<?php
				$title = isset( $card['title'] ) ? $card['title'] : '';
				$body = isset( $card['body'] ) ? $card['body'] : '';
				$icon = isset( $card['icon'] ) ? $card['icon'] : 'library';
				?>
				<article class="rpd-lpp-dark-card"><span class="rpd-lpp-icon rpd-lpp-icon--gold" aria-hidden="true"><?php rocketpd_lpp_icon( $icon ); ?></span><h3><?php echo esc_html( $title ); ?></h3><p><?php echo esc_html( $body ); ?></p></article>
			<?php endforeach; ?>
		</div>
		<p class="rpd-lpp-centered-note rpd-lpp-centered-note--dark rpd-lpp-centered-note--italic"><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_experiences_closing', __( 'These experiences complement the platform and extend learning beyond asynchronous content.', 'rocketpd' ) ) ); ?></p>
	</div>
</section>
