<?php
/**
 * About split checklist section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$default_headline        = __( 'Unlike traditional professional learning that ends when the session ends...', 'rocketpd' );
$default_body            = __( 'RocketPD is designed to support continuous growth. We combine expert insight, practical frameworks, and collaborative learning experiences so educators can apply new ideas directly to their work.', 'rocketpd' );
$default_list_heading    = __( 'Every RocketPD experience is designed to be:', 'rocketpd' );
$default_closing         = __( 'This is professional learning designed for real schools.', 'rocketpd' );
$default_image_alt       = __( 'Educators collaborating around a laptop', 'rocketpd' );
$default_checklist_items = array(
	array( 'text' => __( 'Practical and job-embedded', 'rocketpd' ) ),
	array( 'text' => __( 'Collaborative and flexible', 'rocketpd' ) ),
	array( 'text' => __( 'Sustainable over time', 'rocketpd' ) ),
	array( 'text' => __( 'Measurable and outcomes-focused', 'rocketpd' ) ),
	array( 'text' => __( 'Credit-bearing and career-aligned', 'rocketpd' ) ),
);

$mode = rocketpd_get_field( 'rpd_about_checklist_mode', 'defaults' );

if ( 'hidden' === $mode ) {
	return;
}

if ( 'custom' === $mode ) {
	$headline        = rocketpd_get_field( 'rpd_about_checklist_headline', $default_headline );
	$body            = rocketpd_get_field( 'rpd_about_checklist_body', $default_body );
	$list_heading    = rocketpd_get_field( 'rpd_about_checklist_list_heading', $default_list_heading );
	$closing         = rocketpd_get_field( 'rpd_about_checklist_closing', $default_closing );
	$image           = rocketpd_get_field( 'rpd_about_checklist_image' );
	$image_alt       = $default_image_alt;
	$checklist_items = rocketpd_get_field( 'rpd_about_checklist_items', $default_checklist_items );
} else {
	$headline        = $default_headline;
	$body            = $default_body;
	$list_heading    = $default_list_heading;
	$closing         = $default_closing;
	$default_image_url = home_url( '/wp-content/uploads/2024/03/topic_img_8.jpg' );
	$default_image_id  = attachment_url_to_postid( $default_image_url );
	$image             = $default_image_id ?: $default_image_url;
	$image_alt       = $default_image_alt;
	$checklist_items = $default_checklist_items;
}
$image_markup = $image ? rocketpd_get_image_markup( $image, 'rpd-about-checklist__image', $image_alt ) : '';
?>

<section class="rpd-about-checklist rpd-about-section">
	<div class="rpd-container rpd-about-checklist__grid">
		<div class="rpd-about-checklist__copy">
			<h2><?php echo esc_html( $headline ); ?></h2>

			<?php if ( $body ) : ?>
				<p><?php echo esc_html( $body ); ?></p>
			<?php endif; ?>

			<?php if ( $list_heading ) : ?>
				<p class="rpd-about-small-heading"><?php echo esc_html( $list_heading ); ?></p>
			<?php endif; ?>

			<?php if ( is_array( $checklist_items ) && ! empty( $checklist_items ) ) : ?>
				<ul class="rpd-about-check-list">
					<?php foreach ( $checklist_items as $item ) : ?>
						<?php $text = isset( $item['text'] ) ? $item['text'] : ''; ?>
						<?php if ( $text ) : ?>
							<li><span aria-hidden="true"><?php echo rocketpd_get_icon( 'check', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><?php echo esc_html( $text ); ?></li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if ( $closing ) : ?>
				<p class="rpd-about-linkline"><?php echo esc_html( $closing ); ?></p>
			<?php endif; ?>
		</div>

		<div class="rpd-about-checklist__media">
			<?php if ( $image_markup ) : ?>
				<?php echo wp_kses_post( $image_markup ); ?>
			<?php else : ?>
				<div class="rpd-about-checklist__fallback" role="img" aria-label="<?php echo esc_attr( $image_alt ); ?>">
					<span></span>
					<span></span>
					<span></span>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
