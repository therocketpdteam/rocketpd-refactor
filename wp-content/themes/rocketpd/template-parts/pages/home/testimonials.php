<?php
/**
 * Home testimonials.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$headline     = rocketpd_get_field( 'rpd_home_testimonials_headline', __( 'Hear from the Community', 'rocketpd' ) );
$fallback_testimonials = array(
	array( 'quote' => __( "RocketPD has completely transformed how we approach professional learning in our district. It's not just checking boxes anymore; it's active, ongoing, and deeply relevant to our staff.", 'rocketpd' ), 'name' => 'Joe Baeta', 'role' => 'Superintendent', 'organization' => 'Stoughton Public Schools, MA', 'initials' => 'JB', 'accent' => 'purple' ),
	array( 'quote' => __( 'The quality of the instructors and the depth of the conversations in the cohorts are unmatched. I finally found a space where I feel challenged and supported as a leader.', 'rocketpd' ), 'name' => 'Sarah Jenkins', 'role' => 'Middle School Principal', 'organization' => 'Denver Public Schools, CO', 'initials' => 'SJ', 'accent' => 'gold' ),
	array( 'quote' => __( 'LaunchPad gave us the data we needed to understand what our teachers actually wanted to learn. The engagement rates are through the roof compared to our old system.', 'rocketpd' ), 'name' => 'Marcus Rivera', 'role' => 'Director of Curriculum', 'organization' => 'Austin ISD, TX', 'initials' => 'MR', 'accent' => 'pink' ),
);
$testimonials = rocketpd_get_field( 'rpd_home_testimonials', $fallback_testimonials );
$testimonials = array_filter(
	is_array( $testimonials ) ? $testimonials : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['quote'] );
	}
);
$testimonials = $testimonials ? $testimonials : $fallback_testimonials;
?>

<section class="rpd-home-testimonials rpd-home-section">
	<div class="rpd-container">
		<header class="rpd-home-section-header">
			<h2><?php echo esc_html( $headline ); ?></h2>
		</header>
		<div class="rpd-home-card-grid rpd-home-card-grid--three">
			<?php foreach ( $testimonials as $index => $testimonial ) : ?>
				<article class="rpd-home-testimonial rpd-home-testimonial--<?php echo esc_attr( sanitize_html_class( $testimonial['accent'] ?? 'purple' ) ); ?><?php echo 2 === $index ? ' rpd-home-testimonial--tablet-hidden' : ''; ?>">
					<span class="rpd-home-quote" aria-hidden="true"><?php echo rocketpd_get_icon( 'quote', 44 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					<blockquote><?php echo esc_html( $testimonial['quote'] ); ?></blockquote>
					<footer>
						<?php
						$avatar = $testimonial['avatar'] ?? '';
						$image_markup = rocketpd_get_image_markup( $avatar, 'rpd-home-testimonial__avatar-image', $testimonial['name'] ?? '' );
						if ( $image_markup ) {
							echo $image_markup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						} else {
							$avatar_style = $testimonial['avatar_style'] ?? '';
							?>
							<span class="rpd-home-testimonial__avatar<?php echo $avatar_style ? ' rpd-home-testimonial__avatar--' . esc_attr( sanitize_html_class( $avatar_style ) ) : ''; ?>"><?php echo esc_html( $testimonial['initials'] ?? '' ); ?></span>
							<?php
						}
						?>
						<div>
							<strong><?php echo esc_html( $testimonial['name'] ?? '' ); ?></strong>
							<small><?php echo esc_html( trim( ( $testimonial['role'] ?? '' ) . ' ' . ( $testimonial['organization'] ?? '' ) ) ); ?></small>
						</div>
					</footer>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
