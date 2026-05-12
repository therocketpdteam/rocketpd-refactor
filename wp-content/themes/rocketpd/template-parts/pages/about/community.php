<?php
/**
 * About community section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_about_community_eyebrow', __( 'Continued learning', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_about_community_headline', __( 'The learning gets stronger when educators do not have to carry it alone.', 'rocketpd' ) );
$body = rocketpd_get_field( 'rpd_about_community_body', __( 'RocketPD gives educators a place to revisit sessions, share implementation questions, and learn alongside peers who are solving similar problems in schools and districts.', 'rocketpd' ) );
$cards = rocketpd_get_field(
	'rpd_about_community_cards',
	array(
		array(
			'title' => __( 'Recordings and resources', 'rocketpd' ),
			'body'  => __( 'Teams can return to the learning when planning, coaching, or sharing with colleagues.', 'rocketpd' ),
		),
		array(
			'title' => __( 'Peer momentum', 'rocketpd' ),
			'body'  => __( 'Community helps educators compare notes and keep implementation moving.', 'rocketpd' ),
		),
		array(
			'title' => __( 'Ongoing pathways', 'rocketpd' ),
			'body'  => __( 'Professional learning can build over time instead of disappearing after one session.', 'rocketpd' ),
		),
	)
);
?>

<section class="rpd-about-community rpd-about-band rpd-section">
	<div class="rpd-container rpd-about-community__grid">
		<div class="rpd-about-community__visual" aria-hidden="true">
			<div class="rpd-about-community__ring">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>

		<div>
			<p class="rpd-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p class="rpd-lede"><?php echo esc_html( $body ); ?></p>

			<?php if ( is_array( $cards ) && ! empty( $cards ) ) : ?>
				<div class="rpd-about-community__cards">
					<?php foreach ( $cards as $card ) : ?>
						<?php
						$title = isset( $card['title'] ) ? $card['title'] : '';
						$card_body = isset( $card['body'] ) ? $card['body'] : '';
						?>
						<?php if ( $title || $card_body ) : ?>
							<article>
								<h3><?php echo esc_html( $title ); ?></h3>
								<p><?php echo esc_html( $card_body ); ?></p>
							</article>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
