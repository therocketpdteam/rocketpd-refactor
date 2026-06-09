<?php
/**
 * LaunchPad what's inside.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cards = rocketpd_lp_get_field(
	'inside_cards',
	array(
		array( 'image' => rocketpd_lp_asset( 'teacher-1.jpg' ), 'alt' => 'RocketPD course library dashboard', 'icon' => 'graduation', 'title' => 'Expert-Led Video Courses', 'body' => 'Short, practical courses led by nationally recognized K–12 thought leaders — focused on real classroom and leadership application.', 'bullets' => array( 'Self-paced video modules', 'Practical, immediate application', 'Taught by leaders you know & respect' ) ),
		array( 'image' => rocketpd_lp_asset( 'teacher-2.jpg' ), 'alt' => 'RocketPD certificate and workbook', 'icon' => 'award', 'title' => 'Mastery-Based Credit Pathways', 'body' => 'Educators demonstrate learning through structured reflection and application — earning professional credit without unnecessary paperwork.', 'bullets' => array( 'Downloadable course workbooks', 'Mastery-Based PDP worksheets', 'Up to 3 credits per course' ) ),
		array( 'image' => rocketpd_lp_asset( 'love-img-2.png' ), 'alt' => 'District team using LaunchPad together', 'icon' => 'users', 'title' => 'Flexible Team-Based Learning', 'body' => 'Use LaunchPad across onboarding, PLCs, PD days, and individual growth plans without disrupting schedules.', 'bullets' => array( 'Use in PLCs and PD days', 'Onboarding-ready content', 'Individual growth pathways' ) ),
	)
);
?>
<section class="rpd-lp-section rpd-lp-inside">
	<div class="rpd-container">
		<header class="rpd-lp-section-header rpd-lp-section-header--center"><p class="rpd-lp-eyebrow"><?php echo esc_html( rocketpd_lp_get_field( 'inside_eyebrow', __( "What's Inside", 'rocketpd' ) ) ); ?></p><h2><?php echo esc_html( rocketpd_lp_get_field( 'inside_h2', __( 'What Districts Get with LaunchPad.', 'rocketpd' ) ) ); ?></h2></header>
		<div class="rpd-lp-card-grid rpd-lp-card-grid--three">
			<?php foreach ( $cards as $card ) : ?>
				<article class="rpd-lp-image-card">
					<img src="<?php echo esc_url( rocketpd_lp_image_url( $card['image'] ?? '', '' ) ); ?>" alt="<?php echo esc_attr( $card['alt'] ?? $card['title'] ?? '' ); ?>">
					<div><?php rocketpd_lp_icon( $card['icon'] ?? 'sparkles' ); ?><h3><?php echo esc_html( $card['title'] ?? '' ); ?></h3><p><?php echo esc_html( $card['body'] ?? '' ); ?></p><ul class="rpd-lp-check-list"><?php foreach ( $card['bullets'] ?? array() as $bullet ) : ?><li><?php echo esc_html( is_array( $bullet ) ? ( $bullet['text'] ?? '' ) : $bullet ); ?></li><?php endforeach; ?></ul></div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
