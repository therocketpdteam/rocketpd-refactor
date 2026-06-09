<?php
/**
 * LaunchPad Plus pillars.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pillars = rocketpd_lpp_get_field(
	'rpd_lpp_pillars',
	array(
		array( 'title' => __( 'Learning', 'rocketpd' ), 'items' => array( array( 'text' => __( 'RocketPD expert-led courses', 'rocketpd' ) ), array( 'text' => __( 'District-created courses', 'rocketpd' ) ), array( 'text' => __( 'Legacy district content', 'rocketpd' ) ) ) ),
		array( 'title' => __( 'Resources', 'rocketpd' ), 'items' => array( array( 'text' => __( 'Strategic documents & frameworks', 'rocketpd' ) ), array( 'text' => __( 'Guides and webinars', 'rocketpd' ) ), array( 'text' => __( 'Training materials', 'rocketpd' ) ) ) ),
		array( 'title' => __( 'Management', 'rocketpd' ), 'items' => array( array( 'text' => __( 'User roles & permissions', 'rocketpd' ) ), array( 'text' => __( 'Participation tracking', 'rocketpd' ) ), array( 'text' => __( 'Completion tracking', 'rocketpd' ) ) ) ),
	)
);
?>

<section class="rpd-lpp-pillars rpd-lpp-section">
	<div class="rpd-container">
		<header class="rpd-lpp-section-header rpd-lpp-section-header--center">
			<p class="rpd-lpp-eyebrow"><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_pillars_eyebrow', __( "How It's Organized", 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_pillars_headline', __( 'One Platform for Learning and Resources.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_pillars_intro', __( 'LaunchPad+ brings together the key components districts need to support professional learning.', 'rocketpd' ) ) ); ?></p>
		</header>
		<div class="rpd-lpp-pillars__grid">
			<?php foreach ( $pillars as $index => $pillar ) : ?>
				<?php
				$title = isset( $pillar['title'] ) ? $pillar['title'] : '';
				$items = isset( $pillar['items'] ) && is_array( $pillar['items'] ) ? $pillar['items'] : array();
				?>
				<article class="rpd-lpp-pillar rpd-lpp-pillar--<?php echo esc_attr( (string) ( $index + 1 ) ); ?>">
					<header><small><?php esc_html_e( 'Pillar', 'rocketpd' ); ?></small><h3><?php echo esc_html( $title ); ?></h3></header>
					<div>
						<?php foreach ( $items as $item ) : ?>
							<?php $text = isset( $item['text'] ) ? $item['text'] : ''; ?>
							<?php if ( $text ) : ?>
								<span><?php echo esc_html( $text ); ?></span>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
		<p class="rpd-lpp-band-note"><span aria-hidden="true">⚡</span><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_pillars_callout', __( 'All in one branded LaunchPad+ platform — one place for staff to learn', 'rocketpd' ) ) ); ?></p>
		<p class="rpd-lpp-centered-note"><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_pillars_closing', __( 'This helps reduce fragmentation and keeps professional learning organized in one place.', 'rocketpd' ) ) ); ?></p>
	</div>
</section>
