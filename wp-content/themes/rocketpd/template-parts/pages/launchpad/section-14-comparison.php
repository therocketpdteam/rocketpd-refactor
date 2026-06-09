<?php
/**
 * LaunchPad+ bridge and comparison.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bullets = rocketpd_lp_get_field( 'lpp_bullets', array( 'Create a branded, district-specific platform', 'Organize internal documents, initiatives, and resources', 'Combine RocketPD content with district-created content', 'Build a centralized system for professional learning and implementation' ) );
$cta = rocketpd_lp_get_field( 'lpp_cta', array( 'title' => __( 'Learn More About LaunchPad+', 'rocketpd' ), 'url' => home_url( '/launchpad-plus/' ) ) );
$rows = rocketpd_lp_get_field(
	'lpp_rows',
	array(
		array( 'capability' => 'RocketPD expert course library', 'launchpad' => true, 'launchpad_plus' => true ),
		array( 'capability' => 'Workbooks and certificates', 'launchpad' => true, 'launchpad_plus' => true ),
		array( 'capability' => 'Searchable, organized content', 'launchpad' => true, 'launchpad_plus' => true ),
		array( 'capability' => 'Implementation support', 'launchpad' => true, 'launchpad_plus' => true ),
		array( 'capability' => 'District-branded platform', 'launchpad' => false, 'launchpad_plus' => true ),
		array( 'capability' => 'District-created content hosting', 'launchpad' => false, 'launchpad_plus' => true ),
		array( 'capability' => 'Custom resource hub', 'launchpad' => false, 'launchpad_plus' => true ),
	)
);
?>
<section class="rpd-lp-section rpd-lp-comparison">
	<div class="rpd-container rpd-lp-split rpd-lp-split--wide">
		<div>
			<p class="rpd-lp-eyebrow"><?php echo esc_html( rocketpd_lp_get_field( 'lpp_eyebrow', __( 'LaunchPad+', 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_lp_get_field( 'lpp_h2', __( 'For Districts Ready to Go Further.', 'rocketpd' ) ) ); ?></h2>
			<p><strong><?php esc_html_e( 'LaunchPad+', 'rocketpd' ); ?></strong> <?php esc_html_e( 'extends the LaunchPad experience into a fully customized, district-wide professional learning environment.', 'rocketpd' ); ?></p>
			<ul class="rpd-lp-check-list"><?php foreach ( $bullets as $bullet ) : ?><li><?php echo esc_html( is_array( $bullet ) ? ( $bullet['text'] ?? '' ) : $bullet ); ?></li><?php endforeach; ?></ul>
			<a class="rpd-lp-btn rpd-lp-btn--purple" href="<?php echo esc_url( $cta['url'] ?? home_url( '/launchpad-plus/' ) ); ?>"><?php echo esc_html( $cta['title'] ?? __( 'Learn More About LaunchPad+', 'rocketpd' ) ); ?></a>
		</div>
		<div class="rpd-lp-table-wrap">
			<div class="rpd-lp-table" role="table" aria-label="<?php esc_attr_e( 'LaunchPad and LaunchPad+ capability comparison', 'rocketpd' ); ?>">
				<div class="rpd-lp-table__head" role="row"><strong role="columnheader"><?php esc_html_e( 'Capability', 'rocketpd' ); ?></strong><strong role="columnheader"><?php esc_html_e( 'LaunchPad', 'rocketpd' ); ?></strong><strong role="columnheader"><?php esc_html_e( 'LaunchPad+', 'rocketpd' ); ?><small><?php esc_html_e( 'Branded edition', 'rocketpd' ); ?></small></strong></div>
				<?php foreach ( $rows as $row ) : ?>
					<div class="rpd-lp-table__row" role="row"><span role="cell"><?php echo esc_html( $row['capability'] ?? '' ); ?></span><span role="cell"><?php echo ! empty( $row['launchpad'] ) ? '<b class="is-yes">✓</b>' : '<b class="is-no">✗</b>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><span role="cell"><?php echo ! empty( $row['launchpad_plus'] ) ? '<b class="is-yes is-plus">✓</b>' : '<b class="is-no">✗</b>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span></div>
				<?php endforeach; ?>
				<div class="rpd-lp-table__foot"><span></span><p><strong><?php esc_html_e( 'LaunchPad', 'rocketpd' ); ?></strong><?php esc_html_e( "For districts that want immediate access to RocketPD's library", 'rocketpd' ); ?></p><p><strong><?php esc_html_e( 'LaunchPad+', 'rocketpd' ); ?></strong><?php esc_html_e( 'For districts ready to centralize their entire PL environment', 'rocketpd' ); ?></p></div>
			</div>
		</div>
	</div>
</section>
