<?php
/**
 * Solutions — product cards (Cohorts + Courses).
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cohorts_mode = rocketpd_get_field( 'rpd_sol_cohorts_mode', 'defaults' );
$courses_mode = rocketpd_get_field( 'rpd_sol_courses_mode', 'defaults' );

if ( 'hidden' === $cohorts_mode && 'hidden' === $courses_mode ) {
	return;
}

$cohorts_label    = rocketpd_get_field( 'rpd_sol_cohorts_label', __( 'Live', 'rocketpd' ) );
$cohorts_heading  = rocketpd_get_field( 'rpd_sol_cohorts_heading', __( 'Live-Virtual Cohorts', 'rocketpd' ) );
$cohorts_features = rocketpd_get_field(
	'rpd_sol_cohorts_features',
	array(
		array( 'text' => __( 'Live, multi-session', 'rocketpd' ) ),
		array( 'text' => __( 'Collaborative & interactive', 'rocketpd' ) ),
		array( 'text' => __( 'Delivered virtually', 'rocketpd' ) ),
	)
);
$cohorts_cta_text = rocketpd_get_field( 'rpd_sol_cohorts_cta_text', __( 'See our cohorts', 'rocketpd' ) );
$cohorts_cta_url  = rocketpd_get_field( 'rpd_sol_cohorts_cta_url', '/cohorts/' );
$cohorts_image_id = rocketpd_get_field( 'rpd_sol_cohorts_image_id', 0 );

$courses_label    = rocketpd_get_field( 'rpd_sol_courses_label', __( 'Video', 'rocketpd' ) );
$courses_heading  = rocketpd_get_field( 'rpd_sol_courses_heading', __( 'Video-Based Courses', 'rocketpd' ) );
$courses_features = rocketpd_get_field(
	'rpd_sol_courses_features',
	array(
		array( 'text' => __( "60-min. self-paced 'mini-courses'", 'rocketpd' ) ),
		array( 'text' => __( '3 key lessons per course', 'rocketpd' ) ),
		array( 'text' => __( 'Downloadable learning workbooks', 'rocketpd' ) ),
	)
);
$courses_cta_text = rocketpd_get_field( 'rpd_sol_courses_cta_text', __( 'Try LaunchPad™', 'rocketpd' ) );
$courses_cta_url  = rocketpd_get_field( 'rpd_sol_courses_cta_url', '/launchpad/' );
$courses_image_id = rocketpd_get_field( 'rpd_sol_courses_image_id', 0 );
?>

<section class="rpd-sol-products rpd-sol-section">
	<div class="rpd-sol-container">

		<?php if ( 'hidden' !== $cohorts_mode ) : ?>
		<!-- Live-Virtual Cohorts -->
		<div class="rpd-sol-product-card rpd-sol-product-card--cohorts">
		<div class="rpd-sol-product">
			<div class="rpd-sol-product__content">
				<?php if ( $cohorts_label ) : ?>
					<p class="rpd-sol-product__label rpd-sol-product__label--live"><?php echo esc_html( $cohorts_label ); ?></p>
				<?php endif; ?>
				<?php if ( $cohorts_heading ) : ?>
					<h2><?php echo esc_html( $cohorts_heading ); ?></h2>
				<?php endif; ?>
				<?php if ( is_array( $cohorts_features ) && $cohorts_features ) : ?>
					<ul class="rpd-sol-product__list">
						<?php foreach ( $cohorts_features as $item ) : ?>
							<?php $text = $item['text'] ?? ''; ?>
							<?php if ( $text ) : ?>
								<li><?php echo esc_html( $text ); ?></li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				<?php if ( $cohorts_cta_text && $cohorts_cta_url ) : ?>
					<a class="rpd-sol-btn rpd-sol-btn--primary" href="<?php echo esc_url( $cohorts_cta_url ); ?>">
						<?php echo esc_html( $cohorts_cta_text ); ?>
					</a>
				<?php endif; ?>
			</div>
			<div class="rpd-sol-product__media">
				<?php if ( $cohorts_image_id ) : ?>
					<?php echo wp_get_attachment_image( $cohorts_image_id, 'large', false, array( 'class' => 'rpd-sol-product__img', 'alt' => esc_attr( $cohorts_heading ) ) ); ?>
				<?php else : ?>
					<img class="rpd-sol-product__img" src="/wp-content/uploads/2024/03/solution_img_1.jpg" alt="<?php echo esc_attr( $cohorts_heading ); ?>">
				<?php endif; ?>
			</div>
		</div>
		</div><!-- /.rpd-sol-product-card--cohorts -->
	<?php endif; ?>

	<?php if ( 'hidden' !== $courses_mode ) : ?>
		<!-- Video-Based Courses -->
		<div class="rpd-sol-product-card rpd-sol-product-card--courses">
		<div class="rpd-sol-product rpd-sol-product--reverse rpd-sol-product--alt">
			<div class="rpd-sol-product__content">
				<?php if ( $courses_label ) : ?>
					<p class="rpd-sol-product__label rpd-sol-product__label--video"><?php echo esc_html( $courses_label ); ?></p>
				<?php endif; ?>
				<?php if ( $courses_heading ) : ?>
					<h2><?php echo esc_html( $courses_heading ); ?></h2>
				<?php endif; ?>
				<?php if ( is_array( $courses_features ) && $courses_features ) : ?>
					<ul class="rpd-sol-product__list">
						<?php foreach ( $courses_features as $item ) : ?>
							<?php $text = $item['text'] ?? ''; ?>
							<?php if ( $text ) : ?>
								<li><?php echo esc_html( $text ); ?></li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				<?php if ( $courses_cta_text && $courses_cta_url ) : ?>
					<a class="rpd-sol-btn rpd-sol-btn--primary" href="<?php echo esc_url( $courses_cta_url ); ?>">
						<?php echo esc_html( $courses_cta_text ); ?>
					</a>
				<?php endif; ?>
			</div>
			<div class="rpd-sol-product__media">
				<?php if ( $courses_image_id ) : ?>
					<?php echo wp_get_attachment_image( $courses_image_id, 'large', false, array( 'class' => 'rpd-sol-product__img', 'alt' => esc_attr( $courses_heading ) ) ); ?>
				<?php else : ?>
					<img class="rpd-sol-product__img" src="/wp-content/uploads/2024/03/solution_img_2.jpg" alt="<?php echo esc_attr( $courses_heading ); ?>">
				<?php endif; ?>
			</div>
		</div>
		</div><!-- /.rpd-sol-product-card--courses -->
	<?php endif; ?>

	</div>
</section>
