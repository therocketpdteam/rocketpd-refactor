<?php
/**
 * Home community value cards.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$headline = rocketpd_get_field( 'rpd_home_value_headline', __( "The World's Most Engaged Professional Learning Community", 'rocketpd' ) );
$fallback_cards = array(
	array( 'icon' => 'book', 'title' => __( 'Explore Resources', 'rocketpd' ), 'body' => __( 'Discover topical resources, ongoing learning, and fresh ideas tailored to the challenges you face in your classroom or district.', 'rocketpd' ) ),
	array( 'icon' => 'cap', 'title' => __( 'Expert-led Upskilling', 'rocketpd' ), 'body' => __( 'Deliver practical, engaging upskilling and career growth opportunities led by top educational experts and practitioners.', 'rocketpd' ) ),
	array( 'icon' => 'target', 'title' => __( 'Measurable Outcomes', 'rocketpd' ), 'body' => __( 'Turn learning into action with structures designed to produce measurable outcomes for both staff development and student success.', 'rocketpd' ) ),
);
$cards          = rocketpd_get_field( 'rpd_home_value_cards', $fallback_cards );
$cards    = array_filter(
	is_array( $cards ) ? $cards : array(),
	function ( $card ) {
		return is_array( $card ) && ! empty( $card['title'] );
	}
);
$cards    = $cards ? $cards : $fallback_cards;

$value_icon_map = array(
	'book'   => 'book',
	'cap'    => 'graduation-cap',
	'target' => 'target',
);
?>

<section class="rpd-home-values rpd-home-section rpd-home-section--soft">
	<div class="rpd-container">
		<header class="rpd-home-section-header">
			<h2><?php echo esc_html( $headline ); ?></h2>
		</header>
		<div class="rpd-home-card-grid rpd-home-card-grid--three">
			<?php foreach ( $cards as $card ) : ?>
				<?php $value_icon = $value_icon_map[ $card['icon'] ?? 'book' ] ?? 'book'; ?>
				<article class="rpd-home-value-card">
					<span class="rpd-home-icon" aria-hidden="true"><?php echo rocketpd_get_icon( $value_icon, 24 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					<h3><?php echo esc_html( $card['title'] ); ?></h3>
					<?php if ( ! empty( $card['body'] ) ) : ?>
						<p><?php echo esc_html( $card['body'] ); ?></p>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
