<?php
/**
 * Topic Index hero.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$featured = function_exists( 'rocketpd_get_featured_topics' ) ? array_slice( rocketpd_get_featured_topics(), 0, 3 ) : array();
$headline = rocketpd_get_field( 'rpd_topics_hero_headline', __( 'Explore Topics That Matter Most in K-12 Education', 'rocketpd' ) );
$headline = str_replace( 'K-12', '<span class="rpd-topics-nowrap">K-12</span>', esc_html( $headline ) );
?>

<section class="rpd-topics-hero">
	<span class="rpd-topics-orb rpd-topics-orb--blue" aria-hidden="true"></span>
	<span class="rpd-topics-orb rpd-topics-orb--magenta" aria-hidden="true"></span>
	<div class="rpd-container rpd-topics-hero__inner">
		<div class="rpd-topics-hero__copy">
			<p class="rpd-topics-eyebrow"><?php echo esc_html( rocketpd_get_field( 'rpd_topics_hero_eyebrow', __( '16 Educator Topic Hubs · Updated Weekly', 'rocketpd' ) ) ); ?></p>
			<h1><?php echo wp_kses( $headline, array( 'span' => array( 'class' => true ) ) ); ?></h1>
			<p><?php echo esc_html( rocketpd_get_field( 'rpd_topics_hero_body', __( 'Discover practical resources, expert guidance, professional learning opportunities, and community conversations designed to help educators solve real challenges in schools and classrooms.', 'rocketpd' ) ) ); ?></p>
			<form class="rpd-topics-hero-search" action="#topic-gallery" role="search">
				<label class="screen-reader-text" for="rpd-topics-hero-search"><?php esc_html_e( 'Search topics', 'rocketpd' ); ?></label>
				<span aria-hidden="true"></span>
				<input id="rpd-topics-hero-search" type="search" placeholder="<?php esc_attr_e( 'Search topics - teacher evaluation, AI, family engagement...', 'rocketpd' ); ?>" data-rpd-topics-hero-search>
			</form>
			<div class="rpd-topics-hero__actions">
				<a class="rpd-btn rpd-btn--gold" href="#topic-gallery"><?php echo esc_html( rocketpd_get_field( 'rpd_topics_hero_primary_label', __( 'Explore Topics', 'rocketpd' ) ) ); ?> <span aria-hidden="true">-&gt;</span></a>
				<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( rocketpd_get_field( 'rpd_topics_hero_secondary_url', home_url( '/community/' ) ) ); ?>"><?php echo esc_html( rocketpd_get_field( 'rpd_topics_hero_secondary_label', __( 'Join the RocketPD Community', 'rocketpd' ) ) ); ?></a>
			</div>
			<div class="rpd-topics-hero__stats" aria-label="<?php esc_attr_e( 'RocketPD topic hub statistics', 'rocketpd' ); ?>">
				<div><strong>16</strong><span><?php esc_html_e( 'Topic Hubs', 'rocketpd' ); ?></span></div>
				<div><strong>400+</strong><span><?php esc_html_e( 'Resources', 'rocketpd' ); ?></span></div>
				<div><strong>40K+</strong><span><?php esc_html_e( 'Educators', 'rocketpd' ); ?></span></div>
			</div>
		</div>
		<div class="rpd-topics-hero__cards" aria-hidden="true">
			<?php foreach ( $featured as $index => $topic ) : ?>
				<?php $category = rocketpd_get_topic_category( $topic['category'] ); ?>
				<article class="rpd-topics-preview-card rpd-topic-tone--<?php echo esc_attr( $category['tone'] ); ?>">
					<div class="rpd-topics-preview-card__glyph">
						<?php echo rocketpd_topic_icon_svg( $topic['icon'], 'rpd-topics-icon' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
					<span><?php echo esc_html( $category['label'] ); ?></span>
					<h2><?php echo esc_html( $topic['title'] ); ?></h2>
					<p><?php echo esc_html( $topic['resources'] ); ?> <?php esc_html_e( 'resources', 'rocketpd' ); ?> · <?php echo esc_html( $topic['upcoming'] ); ?> <?php esc_html_e( 'upcoming', 'rocketpd' ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
