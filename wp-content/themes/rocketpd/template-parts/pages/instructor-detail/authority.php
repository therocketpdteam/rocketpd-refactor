<?php
/**
 * Instructor authority section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$instructor = function_exists( 'rocketpd_get_current_instructor_detail' ) ? rocketpd_get_current_instructor_detail() : array();
$name       = $instructor['name'] ?? __( 'Kim Marshall', 'rocketpd' );
$first_name = function_exists( 'rocketpd_get_instructor_first_name' ) ? rocketpd_get_instructor_first_name( $name ) : trim( strtok( $name, ' ' ) );
$bio        = $instructor['bio'] ?? array();
$paragraphs = isset( $bio['paragraphs'] ) && is_array( $bio['paragraphs'] ) ? $bio['paragraphs'] : array();
$focus      = isset( $bio['focus'] ) && is_array( $bio['focus'] ) ? $bio['focus'] : array();
$focus_heading = ! empty( $bio['focus_heading'] ) ? $bio['focus_heading'] : __( 'His work focuses on', 'rocketpd' );
?>

<section class="rpd-instructor-authority">
	<div class="rpd-container rpd-instructor-split">
		<div class="rpd-instructor-split__intro">
			<p class="rpd-instructor-section-kicker"><?php echo esc_html( $bio['eyebrow'] ?? __( 'Authority Positioning', 'rocketpd' ) ); ?></p>
			<h2>
				<?php
				echo esc_html(
					$bio['heading'] ?? sprintf(
						/* translators: %s: instructor first name. */
						__( 'Why educators learn from %s', 'rocketpd' ),
						$first_name
					)
				);
				?>
			</h2>
		</div>
		<div class="rpd-instructor-authority__body">
			<?php foreach ( $paragraphs as $paragraph ) : ?>
				<p><?php echo esc_html( $paragraph ); ?></p>
			<?php endforeach; ?>

			<?php if ( $focus ) : ?>
				<h3><?php echo esc_html( $focus_heading ); ?></h3>
				<ul class="rpd-instructor-focus-grid">
					<?php foreach ( $focus as $item ) : ?>
						<li><span aria-hidden="true"></span><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</section>
