<?php
/**
 * Instructor Index hero.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$instructors = function_exists( 'rocketpd_get_instructors' ) ? rocketpd_get_instructors() : array();
$featured    = array_values(
	array_filter(
		$instructors,
		function ( $instructor ) {
			return ! empty( $instructor['featured'] );
		}
	)
);
$featured    = $featured ? $featured[0] : ( $instructors[0] ?? array() );
$collage     = array_slice( $instructors, 0, 6 );
$eyebrow     = rocketpd_get_field( 'rpd_instructors_hero_eyebrow', __( 'Trusted Expert Network - 18+ K-12 Thought Leaders', 'rocketpd' ) );
$headline    = rocketpd_get_field( 'rpd_instructors_hero_headline', __( "Learn From the Nation's Leading K-12 Experts.", 'rocketpd' ) );
$body        = rocketpd_get_field( 'rpd_instructors_hero_body', __( 'Explore expert-led professional learning designed to help educators solve real-world challenges, strengthen instructional practice, and drive meaningful outcomes for students.', 'rocketpd' ) );
$primary     = rocketpd_get_field( 'rpd_instructors_hero_primary_label', __( 'Explore Experts', 'rocketpd' ) );
$primary_url = rocketpd_get_field( 'rpd_instructors_hero_primary_url', '#instructor-discovery' );
$secondary   = rocketpd_get_field( 'rpd_instructors_hero_secondary_label', __( 'Browse by Topic', 'rocketpd' ) );
$secondary_url = rocketpd_get_field( 'rpd_instructors_hero_secondary_url', '#instructor-topics' );
$headline_html = preg_replace( '/\bLeading\b/', '<span>Leading</span>', esc_html( $headline ), 1 );
?>

<section class="rpd-instructors-hero">
	<div class="rpd-container rpd-instructors-hero__grid">
		<div class="rpd-instructors-hero__copy">
			<p class="rpd-instructors-pill"><?php echo esc_html( $eyebrow ); ?></p>
			<h1><?php echo wp_kses( $headline_html, array( 'span' => array() ) ); ?></h1>
			<p class="rpd-instructors-hero__lede"><?php echo esc_html( $body ); ?></p>
			<div class="rpd-instructors-hero__actions">
				<?php if ( $primary && $primary_url ) : ?>
					<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary ); ?> <span aria-hidden="true">-></span></a>
				<?php endif; ?>
				<?php if ( $secondary && $secondary_url ) : ?>
					<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( $secondary_url ); ?>"><span aria-hidden="true">o</span> <?php echo esc_html( $secondary ); ?></a>
				<?php endif; ?>
			</div>
		</div>

		<div class="rpd-instructors-hero__visual" aria-label="<?php esc_attr_e( 'Featured RocketPD instructors', 'rocketpd' ); ?>">
			<div class="rpd-instructors-collage">
				<?php foreach ( $collage as $instructor ) : ?>
					<?php
					$name     = $instructor['name'] ?? '';
					$headshot = $instructor['headshot'] ?? '';
					$initials = $instructor['initials'] ?? '';
					$is_featured = ! empty( $instructor['featured'] );
					?>
					<div class="rpd-instructors-collage__tile<?php echo $is_featured ? ' is-featured' : ''; ?>">
						<?php if ( $headshot ) : ?>
							<img src="<?php echo esc_url( $headshot ); ?>" alt="<?php echo esc_attr( $name ); ?>">
						<?php else : ?>
							<span role="img" aria-label="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $initials ); ?></span>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>

			<?php if ( ! empty( $featured['name'] ) ) : ?>
				<div class="rpd-instructors-featured">
					<span class="rpd-instructors-featured__icon" aria-hidden="true">*</span>
					<span>
						<span><?php esc_html_e( 'Featured this month', 'rocketpd' ); ?></span>
						<strong><?php echo esc_html( $featured['name'] ); ?></strong>
					</span>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
