<?php
/**
 * LaunchPad partners.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_lp_get_field( 'lp_partners_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_eyebrow  = __( 'Trusted Partners', 'rocketpd' );
$default_h2       = __( 'Join school leaders in 850+ districts that partner with RocketPD.', 'rocketpd' );
$default_subhead  = __( 'From single buildings to statewide rollouts.', 'rocketpd' );
$default_partners = array(
	array( 'logo' => rocketpd_lp_asset( 'partner-1.png' ), 'name' => 'Houston Independent School District' ),
	array( 'logo' => rocketpd_lp_asset( 'partner-2.png' ), 'name' => 'Fairfax County Public Schools' ),
	array( 'logo' => rocketpd_lp_asset( 'partner-3.png' ), 'name' => 'Charlotte-Mecklenburg Schools' ),
	array( 'logo' => rocketpd_lp_asset( 'partner-4.png' ), 'name' => 'Boston Public Schools' ),
	array( 'logo' => rocketpd_lp_asset( 'partner-5.png' ), 'name' => 'Denver Public Schools' ),
);

if ( 'custom' === $mode ) {
	$eyebrow      = rocketpd_lp_get_field( 'partners_eyebrow', $default_eyebrow );
	$h2           = rocketpd_lp_get_field( 'partners_h2', $default_h2 );
	$subhead      = rocketpd_lp_get_field( 'partners_subhead', $default_subhead );
	$acf_partners = rocketpd_lp_get_field( 'partners', null );
	$partners     = is_array( $acf_partners ) && ! empty( $acf_partners ) ? $acf_partners : $default_partners;
} else {
	$eyebrow  = $default_eyebrow;
	$h2       = $default_h2;
	$subhead  = $default_subhead;
	$partners = $default_partners;
}
?>
<section class="rpd-lp-section rpd-lp-partners">
	<div class="rpd-container">
		<header class="rpd-lp-section-header rpd-lp-section-header--center"><p class="rpd-lp-eyebrow"><?php echo esc_html( $eyebrow ); ?></p><h2><?php echo esc_html( $h2 ); ?></h2><p><?php echo esc_html( $subhead ); ?></p></header>
		<div class="rpd-lp-partners__logos"><?php foreach ( $partners as $partner ) : ?><img src="<?php echo esc_url( rocketpd_lp_image_url( $partner['logo'] ?? '', '' ) ); ?>" alt="<?php echo esc_attr( ( $partner['name'] ?? '' ) . ' — RocketPD partner district' ); ?>"><?php endforeach; ?></div>
	</div>
</section>
