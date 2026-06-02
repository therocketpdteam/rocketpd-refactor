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
$gender     = $instructor['gender'] ?? 'neutral';
$bio        = $instructor['bio'] ?? array();
$paragraphs = isset( $bio['paragraphs'] ) && is_array( $bio['paragraphs'] ) ? $bio['paragraphs'] : array();
$focus      = isset( $bio['focus'] ) && is_array( $bio['focus'] ) ? $bio['focus'] : array();

$focus_label = 'male' === $gender
	? __( 'His work focuses on', 'rocketpd' )
	: ( 'female' === $gender
		? __( 'Her work focuses on', 'rocketpd' )
		: __( 'Their work focuses on', 'rocketpd' ) );
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
				<h3><?php echo esc_html( $focus_label ); ?></h3>
				<ul class="rpd-instructor-focus-grid">
					<?php foreach ( $focus as $item ) : ?>
						<li><span aria-hidden="true"></span><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</section>
