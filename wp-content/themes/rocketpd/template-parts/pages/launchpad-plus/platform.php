<?php
/**
 * LaunchPad Plus central platform cards.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cards = rocketpd_lpp_get_field(
	'rpd_lpp_platform_cards',
	array(
		array( 'title' => __( 'RocketPD course library', 'rocketpd' ), 'body' => __( "Provide access to RocketPD's expert-led professional learning library.", 'rocketpd' ) ),
		array( 'title' => __( 'District content hosting', 'rocketpd' ), 'body' => __( 'Host your own asynchronous professional learning content alongside it.', 'rocketpd' ) ),
		array( 'title' => __( 'Resource organization', 'rocketpd' ), 'body' => __( 'Organize internal guides, webinars, and training materials in one place.', 'rocketpd' ) ),
		array( 'title' => __( 'User management', 'rocketpd' ), 'body' => __( 'Manage users and permissions across schools, departments, and roles.', 'rocketpd' ) ),
		array( 'title' => __( 'Participation tracking', 'rocketpd' ), 'body' => __( 'Track enrollment, participation, and course completion across teams.', 'rocketpd' ) ),
	)
);
?>

<section class="rpd-lpp-platform rpd-lpp-section">
	<div class="rpd-container">
		<header class="rpd-lpp-section-header rpd-lpp-section-header--center">
			<p class="rpd-lpp-eyebrow"><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_platform_eyebrow', __( 'What It Is', 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_platform_headline', __( 'A Central Platform for District Professional Learning.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_platform_intro', __( 'LaunchPad+ gives districts a structured way to manage professional learning across their organization.', 'rocketpd' ) ) ); ?></p>
		</header>
		<div class="rpd-lpp-card-row rpd-lpp-card-row--five">
			<?php foreach ( $cards as $card ) : ?>
				<?php
				$title = isset( $card['title'] ) ? $card['title'] : '';
				$body  = isset( $card['body'] ) ? $card['body'] : '';
				?>
				<?php if ( $title || $body ) : ?>
					<article class="rpd-lpp-light-card"><span class="rpd-lpp-icon" aria-hidden="true"></span><h3><?php echo esc_html( $title ); ?></h3><p><?php echo esc_html( $body ); ?></p></article>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<p class="rpd-lpp-centered-note"><?php echo wp_kses_post( rocketpd_lpp_get_field( 'rpd_lpp_platform_closing', __( "All within a platform <strong>customized to reflect your district's brand and priorities.</strong>", 'rocketpd' ) ) ); ?></p>
	</div>
</section>
