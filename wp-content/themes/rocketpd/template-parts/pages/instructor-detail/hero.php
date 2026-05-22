<?php
/**
 * Instructor detail hero.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$instructor = function_exists( 'rocketpd_get_current_instructor_detail' ) ? rocketpd_get_current_instructor_detail() : array();
$hero       = $instructor['hero'] ?? array();
$name       = $instructor['name'] ?? get_the_title();
$first_name = function_exists( 'rocketpd_get_instructor_first_name' ) ? rocketpd_get_instructor_first_name( $name ) : trim( strtok( $name, ' ' ) );
$authority  = $instructor['authority'] ?? '';
$tags       = isset( $instructor['tags'] ) && is_array( $instructor['tags'] ) ? array_slice( $instructor['tags'], 0, 4 ) : array();
$stats      = isset( $instructor['stats'] ) && is_array( $instructor['stats'] ) ? $instructor['stats'] : array();
$follow     = isset( $instructor['follow'] ) && is_array( $instructor['follow'] ) ? $instructor['follow'] : array();
$headshot   = $instructor['headshot'] ?? '';
$name_parts = preg_split( '/\s+/', preg_replace( '/^(Dr\.|Mr\.|Mrs\.|Ms\.)\s+/i', '', (string) $name ) );
$initials   = '';

foreach ( array_slice( array_filter( (array) $name_parts ), 0, 2 ) as $part ) {
	$initials .= strtoupper( substr( $part, 0, 1 ) );
}

$initials = $initials ? $initials : strtoupper( substr( (string) $name, 0, 1 ) );

$follow_icons = array(
	'linkedin' => '<svg viewBox="0 0 24 24" focusable="false" aria-hidden="true"><path d="M5.2 8.9h3.4v10.8H5.2V8.9Zm1.7-5.3a2 2 0 1 1 0 4 2 2 0 0 1 0-4Zm4.4 5.3h3.2v1.5h.1c.4-.8 1.5-1.8 3.1-1.8 3.3 0 3.9 2.2 3.9 5v6.1h-3.4v-5.4c0-1.3 0-3-1.8-3s-2.1 1.4-2.1 2.9v5.5h-3.4V8.9Z"/></svg>',
	'twitter'  => '<svg viewBox="0 0 24 24" focusable="false" aria-hidden="true"><path d="M14.2 10.5 21.6 2h-1.8l-6.4 7.3L8.3 2H2.4l7.8 11.2L2.4 22h1.8l6.8-7.7 5.4 7.7h5.9l-8.1-11.5Zm-2.4 2.7-.8-1.1L4.7 3.3h2.7l5 7.1.8 1.1 6.6 9.4h-2.7l-5.3-7.7Z"/></svg>',
	'website'  => '<svg viewBox="0 0 24 24" focusable="false" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.2 2.4 3.3 5.4 3.3 9S14.2 18.6 12 21M12 3c-2.2 2.4-3.3 5.4-3.3 9S9.8 18.6 12 21"/></svg>',
);
$svg_allowed = array(
	'svg'    => array(
		'aria-hidden' => true,
		'focusable'   => true,
		'viewBox'     => true,
		'viewbox'     => true,
	),
	'path'   => array(
		'd' => true,
	),
	'circle' => array(
		'cx' => true,
		'cy' => true,
		'r'  => true,
	),
);
?>

<section class="rpd-instructor-hero">
	<div class="rpd-container rpd-instructor-hero__grid">
		<div class="rpd-instructor-hero__copy">
			<p class="rpd-instructor-eyebrow"><?php echo esc_html( $hero['eyebrow'] ?? __( 'RocketPD Instructor · Featured Expert', 'rocketpd' ) ); ?></p>
			<h1><?php echo esc_html( $name ); ?></h1>
			<p class="rpd-instructor-hero__authority"><?php echo esc_html( $authority ); ?></p>

			<?php if ( $tags ) : ?>
				<div class="rpd-instructor-tags" aria-label="<?php esc_attr_e( 'Instructor topics', 'rocketpd' ); ?>">
					<?php foreach ( $tags as $tag ) : ?>
						<span><?php echo esc_html( $tag ); ?></span>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<div class="rpd-instructor-hero__actions">
				<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $hero['primary_href'] ?? '#free-resources' ); ?>"><?php echo esc_html( $hero['primary_label'] ?? __( 'Explore Free Resources', 'rocketpd' ) ); ?></a>
				<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( $hero['secondary_href'] ?? '#professional-learning' ); ?>"><?php echo esc_html( $hero['secondary_label'] ?? __( 'View Professional Learning', 'rocketpd' ) ); ?></a>
			</div>

			<?php if ( $follow ) : ?>
				<div class="rpd-instructor-follow">
					<span><?php echo esc_html( sprintf( __( 'Follow %s', 'rocketpd' ), $first_name ) ); ?></span>
					<?php foreach ( $follow as $network => $url ) : ?>
						<?php if ( $url ) : ?>
							<a class="rpd-icon-link rpd-icon-link--circle rpd-icon-link--social" href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer">
								<span class="rpd-instructor-follow__icon" aria-hidden="true"><?php echo wp_kses( $follow_icons[ $network ] ?? $follow_icons['website'], $svg_allowed ); ?></span>
								<span class="screen-reader-text"><?php echo esc_html( sprintf( __( 'Follow %1$s on %2$s', 'rocketpd' ), $name, ucfirst( $network ) ) ); ?></span>
							</a>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>

		<div class="rpd-instructor-hero__visual">
			<div class="rpd-instructor-portrait">
				<?php if ( $headshot ) : ?>
					<img src="<?php echo esc_url( $headshot ); ?>" alt="<?php echo esc_attr( $name ); ?>">
				<?php endif; ?>
				<span class="rpd-instructor-portrait__fallback" aria-hidden="true"><?php echo esc_html( $initials ); ?></span>
			</div>
			<div class="rpd-instructor-award">
				<span aria-hidden="true">★</span>
				<strong><?php echo esc_html( $hero['award'] ?? __( '30+ years', 'rocketpd' ) ); ?></strong>
			</div>
			<?php if ( $stats ) : ?>
				<div class="rpd-instructor-hero-stats">
					<?php foreach ( $stats as $stat ) : ?>
						<div>
							<strong><?php echo esc_html( $stat['value'] ?? '' ); ?></strong>
							<span><?php echo esc_html( $stat['label'] ?? '' ); ?></span>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
