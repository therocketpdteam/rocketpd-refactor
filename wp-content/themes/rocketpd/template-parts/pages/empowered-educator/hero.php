<?php
/**
 * Empowered Educator Experience hero section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow   = rocketpd_get_field( 'rpd_ee_hero_eyebrow', __( 'How we\'re different', 'rocketpd' ) );
$headline  = rocketpd_get_field( 'rpd_ee_hero_headline', __( 'Teachers and staff need access to quality professional development.', 'rocketpd' ) );
$highlight = rocketpd_get_field( 'rpd_ee_hero_highlight', __( 'quality professional development', 'rocketpd' ) );
$sub       = rocketpd_get_field( 'rpd_ee_hero_sub', __( 'A practical, research-backed experience designed for busy K-12 educators.', 'rocketpd' ) );

$headline_html = $highlight ? str_replace(
	esc_html( $highlight ),
	'<mark>' . esc_html( $highlight ) . '</mark>',
	esc_html( $headline )
) : esc_html( $headline );
?>

<section class="rpd-ee-hero rpd-ee-section">
	<div class="rpd-ee-container">
		<div class="rpd-ee-hero__inner">
			<?php if ( $eyebrow ) : ?>
				<p class="rpd-ee-pill"><?php echo esc_html( $eyebrow ); ?></p>
			<?php endif; ?>
			<h1><?php echo wp_kses( $headline_html, array( 'mark' => array() ) ); ?></h1>
			<?php if ( $sub ) : ?>
				<p class="rpd-ee-hero__sub"><?php echo esc_html( $sub ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section>
