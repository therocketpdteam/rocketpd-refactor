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
			<p class="rpd-instructor-section-kicker"><?php esc_html_e( 'Go deeper', 'rocketpd' ); ?></p>
			<h2>
				<?php
				printf(
					/* translators: %s: instructor first name. */
					esc_html__( 'Work with %s through RocketPD.', 'rocketpd' ),
					esc_html( $first_name )
				);
				?>
			</h2>
			<p><?php esc_html_e( 'Three flexible ways to bring this work directly into your school or district.', 'rocketpd' ); ?></p>
		</header>
		<div class="rpd-instructor-offerings">
			<?php foreach ( $offerings as $key => $offering ) : ?>
				<?php
				$featured    = ! empty( $offering['featured'] );
				$title       = $offering['title'] ?? '';
				$title_lower = strtolower( $title );
				$icon_type   = 'workshop';
				$price       = isset( $offering['price'] ) ? trim( (string) $offering['price'] ) : '';
				$type        = isset( $offering['type'] ) ? trim( (string) $offering['type'] ) : '';

				if ( false !== strpos( $title_lower, 'launchpad' ) ) {
					$icon_type = 'launchpad';
				} elseif ( false !== strpos( $title_lower, 'cohort' ) || false !== strpos( $title_lower, 'virtual' ) ) {
					$icon_type = 'cohort';
				}

				if ( ! $type ) {
					if ( 'launchpad' === $key || 'launchpad' === $icon_type ) {
						$type = __( 'Self-paced', 'rocketpd' );
					} elseif ( 'cohort' === $key || 'cohort' === $icon_type ) {
						$type = __( 'Live-virtual cohort', 'rocketpd' );
					} else {
						$type = __( 'Custom district workshop', 'rocketpd' );
					}
				}

				if ( 'launchpad' === $icon_type && preg_match( '/^([^\\s]+)\\s+self-paced$/i', $price, $matches ) ) {
					$price = $matches[1];
				}
				?>
				<article class="rpd-instructor-offering-card rpd-instructor-offering-card--<?php echo esc_attr( $icon_type ); ?><?php echo $featured ? ' is-featured' : ''; ?>">
					<?php if ( ! empty( $offering['badge'] ) ) : ?>
						<span class="rpd-instructor-offering-card__badge"><?php echo esc_html( $offering['badge'] ); ?></span>
					<?php endif; ?>
					<span class="rpd-offering-card__icon rpd-offering-card__icon--<?php echo esc_attr( $icon_type ); ?>" aria-hidden="true">
						<?php if ( 'launchpad' === $icon_type ) : ?>
							<svg viewBox="0 0 24 24" focusable="false">
								<path d="M4.5 7.25A2.25 2.25 0 0 1 6.75 5h7.5a2.25 2.25 0 0 1 2.25 2.25v9.5A2.25 2.25 0 0 1 14.25 19h-7.5a2.25 2.25 0 0 1-2.25-2.25v-9.5Z" />
								<path d="m16.5 10.25 3.25-2v7.5l-3.25-2" />
								<path d="M9.25 9.25v5.5l4.5-2.75-4.5-2.75Z" />
							</svg>
						<?php elseif ( 'cohort' === $icon_type ) : ?>
							<svg viewBox="0 0 24 24" focusable="false">
								<path d="M8.5 11.25a3.25 3.25 0 1 0 0-6.5 3.25 3.25 0 0 0 0 6.5Z" />
								<path d="M15.75 10.75a2.75 2.75 0 1 0 0-5.5" />
								<path d="M3.75 19.25v-1.1c0-2.35 2.13-4.25 4.75-4.25s4.75 1.9 4.75 4.25v1.1" />
								<path d="M15 14.15c2.45.22 4.25 2.02 4.25 4.2v.9" />
							</svg>
						<?php else : ?>
							<svg viewBox="0 0 24 24" focusable="false">
								<path d="M4.75 19.25h14.5" />
								<path d="M6.25 19.25V6.75A2 2 0 0 1 8.25 4.75h7.5a2 2 0 0 1 2 2v12.5" />
								<path d="M9 8.25h1.5" />
								<path d="M13.5 8.25H15" />
								<path d="M9 11.5h1.5" />
								<path d="M13.5 11.5H15" />
								<path d="M10 19.25v-4h4v4" />
							</svg>
						<?php endif; ?>
					</span>
					<p class="rpd-instructor-offering-card__eyebrow"><?php echo esc_html( $type ); ?></p>
					<h3><?php echo esc_html( $offering['title'] ?? '' ); ?></h3>
					<?php if ( $price ) : ?>
						<p class="rpd-instructor-offering-card__meta"><?php echo esc_html( $price ); ?></p>
					<?php endif; ?>
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
