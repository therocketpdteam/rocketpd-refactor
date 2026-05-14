<?php
/**
 * Instructor professional learning offerings.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$instructor = function_exists( 'rocketpd_get_current_instructor_detail' ) ? rocketpd_get_current_instructor_detail() : array();
$name       = $instructor['name'] ?? __( 'Kim Marshall', 'rocketpd' );
$first_name = function_exists( 'rocketpd_get_instructor_first_name' ) ? rocketpd_get_instructor_first_name( $name ) : trim( strtok( $name, ' ' ) );
$offerings  = isset( $instructor['offerings'] ) && is_array( $instructor['offerings'] ) ? array_filter(
	$instructor['offerings'],
	function ( $offering ) {
		return ! empty( $offering['enabled'] );
	}
) : array();

if ( ! $offerings ) {
	return;
}
?>

<section class="rpd-instructor-learning" id="professional-learning">
	<div class="rpd-container">
		<header class="rpd-instructor-section-header">
			<h2>
				<?php
				printf(
					/* translators: %s: instructor first name. */
					esc_html__( 'Work with %s through RocketPD.', 'rocketpd' ),
					esc_html( $first_name )
				);
				?>
			</h2>
		</header>
		<div class="rpd-instructor-offerings">
			<?php foreach ( $offerings as $key => $offering ) : ?>
				<?php $featured = ! empty( $offering['featured'] ); ?>
				<article class="rpd-instructor-offering-card<?php echo $featured ? ' is-featured' : ''; ?>">
					<?php if ( ! empty( $offering['badge'] ) ) : ?>
						<span class="rpd-instructor-offering-card__badge"><?php echo esc_html( $offering['badge'] ); ?></span>
					<?php endif; ?>
					<p><?php echo esc_html( $offering['price'] ?? '' ); ?></p>
					<h3><?php echo esc_html( $offering['title'] ?? '' ); ?></h3>
					<?php if ( ! empty( $offering['bullets'] ) && is_array( $offering['bullets'] ) ) : ?>
						<ul>
							<?php foreach ( $offering['bullets'] as $bullet ) : ?>
								<li><?php echo esc_html( $bullet ); ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<?php if ( ! empty( $offering['href'] ) && ! empty( $offering['cta'] ) ) : ?>
						<a class="rpd-btn <?php echo $featured ? 'rpd-btn--gold' : 'rpd-btn--outline-purple'; ?>" href="<?php echo esc_url( $offering['href'] ); ?>"><?php echo esc_html( $offering['cta'] ); ?></a>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
