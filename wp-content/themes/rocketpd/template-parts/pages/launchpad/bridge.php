<?php
/**
 * LaunchPad+ comparison bridge.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bullets = rocketpd_get_field(
	'rpd_launchpad_bridge_bullets',
	array(
		array( 'text' => __( 'Create a branded, district-specific platform', 'rocketpd' ) ),
		array( 'text' => __( 'Organize internal documents, initiatives, and resources', 'rocketpd' ) ),
		array( 'text' => __( 'Combine RocketPD content with district-created content', 'rocketpd' ) ),
		array( 'text' => __( 'Build a centralized system for professional learning and implementation', 'rocketpd' ) ),
	)
);
$rows = rocketpd_get_field(
	'rpd_launchpad_bridge_rows',
	array(
		array( 'capability' => __( 'RocketPD expert course library', 'rocketpd' ), 'lp' => true, 'lpp' => true ),
		array( 'capability' => __( 'Workbooks and certificates', 'rocketpd' ), 'lp' => true, 'lpp' => true ),
		array( 'capability' => __( 'Searchable, organized content', 'rocketpd' ), 'lp' => true, 'lpp' => true ),
		array( 'capability' => __( 'Implementation support', 'rocketpd' ), 'lp' => true, 'lpp' => true ),
		array( 'capability' => __( 'District-branded platform', 'rocketpd' ), 'lp' => false, 'lpp' => true ),
		array( 'capability' => __( 'District-created content hosting', 'rocketpd' ), 'lp' => false, 'lpp' => true ),
		array( 'capability' => __( 'Custom resource hub', 'rocketpd' ), 'lp' => false, 'lpp' => true ),
	)
);
?>

<section class="rpd-lp-bridge rpd-lp-section">
	<div class="rpd-container rpd-lp-bridge__grid">
		<div>
			<p class="rpd-lp-eyebrow"><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_bridge_eyebrow', __( 'LaunchPad+', 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_bridge_headline', __( 'For Districts Ready to Go Further.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_bridge_intro', __( 'LaunchPad+ extends the LaunchPad experience into a fully customized, district-wide professional learning environment.', 'rocketpd' ) ) ); ?></p>
			<ul class="rpd-lp-checks">
				<?php foreach ( $bullets as $bullet ) : ?>
					<?php $text = isset( $bullet['text'] ) ? $bullet['text'] : ''; ?>
					<?php if ( $text ) : ?>
						<li><?php echo esc_html( $text ); ?></li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
			<a class="rpd-btn rpd-btn--purple" href="<?php echo esc_url( rocketpd_get_field( 'rpd_launchpad_bridge_cta_url', home_url( '/launchpad-plus/' ) ) ); ?>"><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_bridge_cta_label', __( 'Learn More About LaunchPad+', 'rocketpd' ) ) ); ?> <span aria-hidden="true">→</span></a>
		</div>
		<div class="rpd-lp-compare" role="table" aria-label="<?php esc_attr_e( 'LaunchPad and LaunchPad+ comparison', 'rocketpd' ); ?>">
			<div class="rpd-lp-compare__head" role="row">
				<span role="columnheader"><?php esc_html_e( 'Capability', 'rocketpd' ); ?></span>
				<span role="columnheader"><?php esc_html_e( 'LaunchPad', 'rocketpd' ); ?></span>
				<span role="columnheader"><?php esc_html_e( 'LaunchPad+', 'rocketpd' ); ?><small><?php esc_html_e( 'Branded edition', 'rocketpd' ); ?></small></span>
			</div>
			<?php foreach ( $rows as $row ) : ?>
				<?php
				$capability = isset( $row['capability'] ) ? $row['capability'] : '';
				$lp = ! empty( $row['lp'] );
				$lpp = ! empty( $row['lpp'] );
				?>
				<div class="rpd-lp-compare__row" role="row">
					<span role="cell"><?php echo esc_html( $capability ); ?></span>
					<span role="cell"><?php echo esc_html( $lp ? '✓' : '×' ); ?></span>
					<span role="cell"><?php echo esc_html( $lpp ? '✓' : '×' ); ?></span>
				</div>
			<?php endforeach; ?>
			<div class="rpd-lp-compare__foot">
				<span><?php esc_html_e( "For districts that want immediate access to RocketPD's library", 'rocketpd' ); ?></span>
				<span><?php esc_html_e( 'For districts ready to centralize their entire PL environment', 'rocketpd' ); ?></span>
			</div>
		</div>
	</div>
</section>
