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
		array( 'title' => __( 'Learning', 'rocketpd' ), 'icon' => 'graduation', 'items' => array( array( 'text' => __( 'RocketPD expert-led courses', 'rocketpd' ), 'icon' => 'library' ), array( 'text' => __( 'District-created courses', 'rocketpd' ), 'icon' => 'upload' ), array( 'text' => __( 'Legacy district content', 'rocketpd' ), 'icon' => 'folder' ) ) ),
		array( 'title' => __( 'Resources', 'rocketpd' ), 'icon' => 'library', 'items' => array( array( 'text' => __( 'Strategic documents & frameworks', 'rocketpd' ), 'icon' => 'folder' ), array( 'text' => __( 'Guides and webinars', 'rocketpd' ), 'icon' => 'video' ), array( 'text' => __( 'Training materials', 'rocketpd' ), 'icon' => 'library' ) ) ),
		array( 'title' => __( 'Management', 'rocketpd' ), 'icon' => 'settings', 'items' => array( array( 'text' => __( 'User roles & permissions', 'rocketpd' ), 'icon' => 'users' ), array( 'text' => __( 'Participation tracking', 'rocketpd' ), 'icon' => 'eye' ), array( 'text' => __( 'Completion tracking', 'rocketpd' ), 'icon' => 'check' ) ) ),
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
				$icon  = isset( $pillar['icon'] ) ? $pillar['icon'] : 'library';
				$items = isset( $pillar['items'] ) && is_array( $pillar['items'] ) ? $pillar['items'] : array();
				?>
				<article class="rpd-lpp-pillar rpd-lpp-pillar--<?php echo esc_attr( (string) ( $index + 1 ) ); ?>">
					<header><span aria-hidden="true"><?php rocketpd_lpp_icon( $icon ); ?></span><small><?php esc_html_e( 'Pillar', 'rocketpd' ); ?></small><h3><?php echo esc_html( $title ); ?></h3></header>
					<ul>
						<?php foreach ( $items as $item ) : ?>
							<?php $text = isset( $item['text'] ) ? $item['text'] : ''; ?>
							<?php if ( $text ) : ?>
								<li><span aria-hidden="true"><?php rocketpd_lpp_icon( isset( $item['icon'] ) ? $item['icon'] : 'check' ); ?></span><?php echo esc_html( $text ); ?></li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</article>
			<?php endforeach; ?>
		</div>
		<p class="rpd-lpp-band-note"><span aria-hidden="true"><?php rocketpd_lpp_icon( 'zap' ); ?></span><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_pillars_callout', __( 'All in one branded LaunchPad+ platform — one place for staff to learn', 'rocketpd' ) ) ); ?></p>
		<p class="rpd-lpp-centered-note"><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_pillars_closing', __( 'This helps reduce fragmentation and keeps professional learning organized in one place.', 'rocketpd' ) ) ); ?></p>
	</div>
</section>
