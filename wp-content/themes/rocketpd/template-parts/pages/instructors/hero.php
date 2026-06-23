<?php
/**
 * Instructor Index hero.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_instructors_hero_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_eyebrow       = __( 'Trusted Expert Network - 18+ K-12 Thought Leaders', 'rocketpd' );
$default_headline      = __( "Learn From the Nation's Leading K-12 Experts.", 'rocketpd' );
$default_body          = __( 'Explore expert-led professional learning designed to help educators solve real-world challenges, strengthen instructional practice, and drive meaningful outcomes for students.', 'rocketpd' );
$default_primary       = __( 'Explore Experts', 'rocketpd' );
$default_primary_url   = '#instructor-discovery';
$default_secondary     = __( 'Browse by Topic', 'rocketpd' );
$default_secondary_url = '#instructor-topics';

if ( 'custom' === $mode ) {
	$eyebrow       = rocketpd_get_field( 'rpd_instructors_hero_eyebrow', $default_eyebrow );
	$headline      = rocketpd_get_field( 'rpd_instructors_hero_headline', $default_headline );
	$body          = rocketpd_get_field( 'rpd_instructors_hero_body', $default_body );
	$primary       = rocketpd_get_field( 'rpd_instructors_hero_primary_label', $default_primary );
	$primary_url   = rocketpd_get_field( 'rpd_instructors_hero_primary_url', $default_primary_url );
	$secondary     = rocketpd_get_field( 'rpd_instructors_hero_secondary_label', $default_secondary );
	$secondary_url = rocketpd_get_field( 'rpd_instructors_hero_secondary_url', $default_secondary_url );
} else {
	$eyebrow       = $default_eyebrow;
	$headline      = $default_headline;
	$body          = $default_body;
	$primary       = $default_primary;
	$primary_url   = $default_primary_url;
	$secondary     = $default_secondary;
	$secondary_url = $default_secondary_url;
}

$instructors = function_exists( 'rocketpd_get_instructors' ) ? rocketpd_get_instructors() : array();
$collage     = array_slice( $instructors, 0, 6 );

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
					<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary ); ?> <span aria-hidden="true">&rarr;</span></a>
				<?php endif; ?>
				<?php if ( $secondary && $secondary_url ) : ?>
					<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary ); ?></a>
				<?php endif; ?>
			</div>
		</div>

		<div class="rpd-instructors-hero__visual" aria-label="<?php esc_attr_e( 'Featured RocketPD instructors', 'rocketpd' ); ?>">
			<div class="rpd-instructors-collage">
				<?php foreach ( $collage as $instructor ) : ?>
					<?php
					$name        = $instructor['name'] ?? '';
					$headshot    = $instructor['headshot'] ?? '';
					$initials    = $instructor['initials'] ?? '';
					$is_featured = ! empty( $instructor['featured'] );
					?>
					<div class="rpd-instructors-collage__tile<?php echo $is_featured ? ' is-featured' : ''; ?>">
						<?php if ( $headshot ) : ?>
							<img src="<?php echo esc_url( $headshot ); ?>" alt="<?php echo esc_attr( $name ); ?>">
						<?php endif; ?>
						<span class="rpd-instructors-portrait-fallback" role="img" aria-label="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $initials ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>

			</div>
	</div>
</section>
