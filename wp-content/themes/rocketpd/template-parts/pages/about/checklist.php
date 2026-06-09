<?php
/**
 * About philosophy checklist section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = rocketpd_about_get_rows(
	'phil_checklist',
	array(
		array( 'item' => __( 'Practical and job-embedded', 'rocketpd' ) ),
		array( 'item' => __( 'Collaborative and flexible', 'rocketpd' ) ),
		array( 'item' => __( 'Sustainable over time', 'rocketpd' ) ),
		array( 'item' => __( 'Measurable and outcomes-focused', 'rocketpd' ) ),
		array( 'item' => __( 'Credit-bearing and career-aligned', 'rocketpd' ) ),
	),
	array( 'item' )
);
$image = rocketpd_about_image_url( rocketpd_about_get_field( 'phil_image', '' ), rocketpd_about_asset( 'rocketpd-community-1.png' ) );
?>

<section class="rpd-about-checklist rpd-about-section" aria-labelledby="rpd-about-philosophy-title">
	<div class="rpd-container rpd-about-checklist__grid">
		<div class="rpd-about-checklist__copy">
			<h2 id="rpd-about-philosophy-title"><?php echo esc_html( rocketpd_about_get_field( 'phil_heading', __( 'Unlike traditional professional learning that ends when the session ends...', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_about_get_field( 'phil_intro', __( 'RocketPD is designed to support continuous growth. We combine expert insight, practical frameworks, and collaborative learning experiences so educators can apply new ideas directly to their work.', 'rocketpd' ) ) ); ?></p>
			<p class="rpd-about-small-heading"><?php echo esc_html( rocketpd_about_get_field( 'phil_leadin', __( 'Every RocketPD experience is designed to be:', 'rocketpd' ) ) ); ?></p>
			<ul class="rpd-about-check-list">
				<?php foreach ( $items as $item ) : ?>
					<li><span aria-hidden="true"><?php rocketpd_about_icon( 'Check' ); ?></span><?php echo esc_html( $item['item'] ?? '' ); ?></li>
				<?php endforeach; ?>
			</ul>
			<p class="rpd-about-linkline"><?php echo esc_html( rocketpd_about_get_field( 'phil_closing', __( 'This is professional learning designed for real schools.', 'rocketpd' ) ) ); ?></p>
		</div>
		<div class="rpd-about-checklist__media">
			<img class="rpd-about-checklist__image" src="<?php echo esc_url( $image ); ?>" alt="<?php esc_attr_e( 'Educators collaborating', 'rocketpd' ); ?>">
		</div>
	</div>
</section>
