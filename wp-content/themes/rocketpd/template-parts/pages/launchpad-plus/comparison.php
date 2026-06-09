<?php
/**
 * LaunchPad Plus comparison.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$rows = rocketpd_lpp_get_field(
	'rpd_lpp_comparison_rows',
	array(
		array( 'capability' => __( 'RocketPD Courses', 'rocketpd' ), 'lp' => true, 'lpp' => true ),
		array( 'capability' => __( 'Workbooks & Certificates', 'rocketpd' ), 'lp' => true, 'lpp' => true ),
		array( 'capability' => __( 'Searchable Learning', 'rocketpd' ), 'lp' => true, 'lpp' => true ),
		array( 'capability' => __( 'District Branding', 'rocketpd' ), 'lp' => false, 'lpp' => true ),
		array( 'capability' => __( 'District Content Hosting', 'rocketpd' ), 'lp' => false, 'lpp' => true ),
		array( 'capability' => __( 'Central Resource Hub', 'rocketpd' ), 'lp' => false, 'lpp' => true ),
	)
);
?>

<section class="rpd-lpp-comparison rpd-lpp-section">
	<div class="rpd-container rpd-lpp-comparison__grid">
		<div>
			<p class="rpd-lpp-eyebrow"><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_comparison_eyebrow', __( 'How They Compare', 'rocketpd' ) ) ); ?></p>
			<h2><?php echo wp_kses_post( rocketpd_lpp_get_field( 'rpd_lpp_comparison_headline', __( 'Start with LaunchPad. Expand with LaunchPad<span>+</span>.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_comparison_body_1', __( 'Many districts begin with LaunchPad to provide immediate access to high-quality professional learning.', 'rocketpd' ) ) ); ?></p>
			<p><strong><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_comparison_body_2', __( 'LaunchPad+ builds on that foundation — adding a branded environment and the ability to organize district-specific content and resources.', 'rocketpd' ) ) ); ?></strong></p>
			<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( rocketpd_lpp_get_field( 'rpd_lpp_comparison_cta_url', home_url( '/launchpad/' ) ) ); ?>"><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_comparison_cta_label', __( 'Explore LaunchPad', 'rocketpd' ) ) ); ?> <span aria-hidden="true">→</span></a>
		</div>
		<div class="rpd-lpp-compare-shell">
			<table class="rpd-lpp-compare-table">
				<caption class="rpd-visually-hidden"><?php esc_html_e( 'LaunchPad and LaunchPad Plus comparison', 'rocketpd' ); ?></caption>
				<thead>
					<tr>
						<th scope="col"><?php esc_html_e( 'Capability', 'rocketpd' ); ?></th>
						<th scope="col"><?php esc_html_e( 'LaunchPad', 'rocketpd' ); ?></th>
						<th scope="col"><?php esc_html_e( 'LaunchPad+', 'rocketpd' ); ?><small><?php esc_html_e( 'Branded edition', 'rocketpd' ); ?></small></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $rows as $row ) : ?>
						<?php
						$capability = isset( $row['capability'] ) ? $row['capability'] : '';
						$lp         = ! empty( $row['lp'] );
						$lpp        = ! empty( $row['lpp'] );
						?>
						<?php if ( $capability ) : ?>
							<tr>
								<th scope="row"><?php echo esc_html( $capability ); ?></th>
								<td>
									<span aria-hidden="true"><?php echo esc_html( $lp ? '✓' : '✗' ); ?></span>
									<span class="rpd-visually-hidden"><?php echo esc_html( $lp ? __( 'Included', 'rocketpd' ) : __( 'Not included', 'rocketpd' ) ); ?></span>
								</td>
								<td>
									<span aria-hidden="true"><?php echo esc_html( $lpp ? '✓' : '✗' ); ?></span>
									<span class="rpd-visually-hidden"><?php echo esc_html( $lpp ? __( 'Included', 'rocketpd' ) : __( 'Not included', 'rocketpd' ) ); ?></span>
								</td>
							</tr>
						<?php endif; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
			<div class="rpd-lpp-compare-table__foot"><span><?php esc_html_e( "For districts that want immediate access to RocketPD's library", 'rocketpd' ); ?></span><span><?php esc_html_e( 'For districts ready to centralize their entire PL environment', 'rocketpd' ); ?></span></div>
		</div>
	</div>
</section>
