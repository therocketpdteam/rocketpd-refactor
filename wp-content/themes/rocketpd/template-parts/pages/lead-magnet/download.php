<?php
/**
 * Lead Magnet download form section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow        = rocketpd_get_field( 'rpd_lead_download_eyebrow', __( 'Get the guide', 'rocketpd' ) );
$headline       = rocketpd_get_field( 'rpd_lead_download_headline', __( 'Download the Guide.', 'rocketpd' ) );
$body           = rocketpd_get_field( 'rpd_lead_download_body', __( 'Get a practical framework you can start applying immediately. No fluff, no follow-up sales sequence - just the guide and a few useful next steps.', 'rocketpd' ) );
$form_eyebrow   = rocketpd_get_field( 'rpd_lead_form_eyebrow', __( 'Send me the guide', 'rocketpd' ) );
$form_headline  = rocketpd_get_field( 'rpd_lead_form_headline', __( 'Where should we send it?', 'rocketpd' ) );
$button_label   = rocketpd_get_field( 'rpd_lead_form_button_label', __( 'Download the Guide', 'rocketpd' ) );
$promise        = rocketpd_get_field( 'rpd_lead_form_promise', __( "We send the guide right away. We don't add you to a drip sequence - promise.", 'rocketpd' ) );
$shortcode      = rocketpd_get_field( 'rpd_lead_form_shortcode' );
$fallback_items = array(
	array( 'text' => __( '28 pages, designed for skimming or deep reading', 'rocketpd' ) ),
	array( 'text' => __( 'Two real district case studies', 'rocketpd' ) ),
	array( 'text' => __( 'A 7-step implementation blueprint', 'rocketpd' ) ),
);
$items          = rocketpd_get_field( 'rpd_lead_download_items', $fallback_items );
$items          = array_filter(
	is_array( $items ) ? $items : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['text'] );
	}
);
$items          = $items ? $items : $fallback_items;
?>

<section id="rpd-lead-download" class="rpd-lead-download rpd-lead-section">
	<div class="rpd-container rpd-lead-download__grid">
		<div class="rpd-lead-download__copy">
			<p class="rpd-lead-pill rpd-lead-pill--gold"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
			<ul>
				<?php foreach ( $items as $item ) : ?>
					<li><?php echo esc_html( $item['text'] ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="rpd-lead-form-card">
			<?php if ( $shortcode ) : ?>
				<?php echo do_shortcode( wp_kses_post( $shortcode ) ); ?>
			<?php else : ?>
				<p><?php echo esc_html( $form_eyebrow ); ?></p>
				<h2><?php echo esc_html( $form_headline ); ?></h2>
				<form aria-label="<?php esc_attr_e( 'Static guide download form preview', 'rocketpd' ); ?>">
					<label>
						<span><?php esc_html_e( 'Your Name', 'rocketpd' ); ?></span>
						<input type="text" placeholder="<?php esc_attr_e( 'Jane Smith', 'rocketpd' ); ?>">
					</label>
					<label>
						<span><?php esc_html_e( 'Your Role', 'rocketpd' ); ?></span>
						<input type="text" placeholder="<?php esc_attr_e( 'Director of PD', 'rocketpd' ); ?>">
					</label>
					<label class="rpd-lead-form-card__wide">
						<span><?php esc_html_e( 'District / Organization', 'rocketpd' ); ?></span>
						<input type="text" placeholder="<?php esc_attr_e( 'Atlanta Public Schools', 'rocketpd' ); ?>">
					</label>
					<label class="rpd-lead-form-card__wide">
						<span><?php esc_html_e( 'Work Email', 'rocketpd' ); ?></span>
						<input type="email" placeholder="<?php esc_attr_e( 'jane@yourdistrict.org', 'rocketpd' ); ?>">
					</label>
					<button type="button"><?php echo esc_html( $button_label ); ?> <span aria-hidden="true">v</span></button>
				</form>
				<small><?php echo esc_html( $promise ); ?></small>
			<?php endif; ?>
		</div>
	</div>
</section>
