<?php
/**
 * LaunchPad Plus includes section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cards = rocketpd_lpp_get_field(
	'rpd_lpp_includes_cards',
	array(
		array( 'title' => __( 'Custom-Branded Platform', 'rocketpd' ), 'body' => __( 'A district-specific environment with your logo, colors, and subdomain — creating a consistent experience for staff.', 'rocketpd' ), 'proof' => __( 'Your brand, your subdomain', 'rocketpd' ), 'icon' => 'palette' ),
		array( 'title' => __( 'RocketPD Content Library Included', 'rocketpd' ), 'body' => __( "Full access to RocketPD's expert-led video courses, workbooks, and certificates — already in your platform on day one.", 'rocketpd' ), 'proof' => __( '100s of courses, ready to go', 'rocketpd' ), 'icon' => 'library' ),
		array( 'title' => __( 'District Content Hosting', 'rocketpd' ), 'body' => __( 'Upload and organize your own training materials, courses, and resources alongside RocketPD content.', 'rocketpd' ), 'proof' => __( 'Combine internal + external content', 'rocketpd' ), 'icon' => 'upload' ),
	)
);
?>

<section class="rpd-lpp-includes rpd-lpp-section rpd-lpp-dark">
	<div class="rpd-container">
		<header class="rpd-lpp-section-header rpd-lpp-section-header--center">
			<p class="rpd-lpp-eyebrow"><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_includes_eyebrow', __( "What's Included", 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_includes_headline', __( 'What LaunchPad+ Includes.', 'rocketpd' ) ) ); ?></h2>
		</header>
		<div class="rpd-lpp-card-row rpd-lpp-card-row--three">
			<?php foreach ( $cards as $card ) : ?>
				<?php
				$title = isset( $card['title'] ) ? $card['title'] : '';
				$body = isset( $card['body'] ) ? $card['body'] : '';
				$proof = isset( $card['proof'] ) ? $card['proof'] : '';
				$icon = isset( $card['icon'] ) ? $card['icon'] : 'check';
				?>
				<article class="rpd-lpp-dark-card"><span class="rpd-lpp-icon rpd-lpp-icon--gold" aria-hidden="true"><?php rocketpd_lpp_icon( $icon ); ?></span><h3><?php echo esc_html( $title ); ?></h3><p><?php echo esc_html( $body ); ?></p><?php if ( $proof ) : ?><strong><?php rocketpd_lpp_icon( 'check' ); ?> <?php echo esc_html( $proof ); ?></strong><?php endif; ?></article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
