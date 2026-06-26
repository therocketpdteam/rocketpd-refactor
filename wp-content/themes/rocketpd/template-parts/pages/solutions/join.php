<?php
/**
 * Solutions — community join / newsletter CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$heading  = rocketpd_get_field( 'rpd_sol_join_heading', __( 'Join our community of 10,000+ educators', 'rocketpd' ) );
$body     = rocketpd_get_field( 'rpd_sol_join_body', __( 'Want to bring agency & empowerment back to your schools? Don\'t miss our monthly roundup of headlines, resources and inspirational stories.', 'rocketpd' ) );
$cta_text = rocketpd_get_field( 'rpd_sol_join_cta_text', __( 'Join now', 'rocketpd' ) );
$cta_url  = rocketpd_get_field( 'rpd_sol_join_cta_url', '/community' );
?>

<section class="rpd-sol-join rpd-sol-section rpd-sol-dark">
	<div class="rpd-sol-container">
		<div class="rpd-sol-join__inner">
			<div class="rpd-sol-join__text">
				<?php if ( $heading ) : ?>
					<h2><?php echo esc_html( $heading ); ?></h2>
				<?php endif; ?>
				<?php if ( $body ) : ?>
					<p><?php echo esc_html( $body ); ?></p>
				<?php endif; ?>
			</div>
			<?php if ( $cta_text && $cta_url ) : ?>
				<div class="rpd-sol-join__action">
					<a class="rpd-sol-btn rpd-sol-btn--gold" href="<?php echo esc_url( $cta_url ); ?>">
						<?php echo esc_html( $cta_text ); ?>
					</a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
