<?php
/**
 * Home resources section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$badge           = rocketpd_get_field( 'rpd_home_resources_badge', __( 'Start Exploring — Free for Educators', 'rocketpd' ) );
$headline        = rocketpd_get_field( 'rpd_home_resources_headline', __( 'Real Resources. Real Classrooms. Zero Cost.', 'rocketpd' ) );
$body            = rocketpd_get_field( 'rpd_home_resources_body', __( 'Dive into our growing library of guides, playbooks, webinars, podcasts, videos, and templates — created by educators, for educators. No paywall. No fluff. Just the practical resources you need to lead, teach, and grow.', 'rocketpd' ) );
$fallback_filters = array( array( 'label' => 'All' ), array( 'label' => 'Guides' ), array( 'label' => 'Webinars' ), array( 'label' => 'Playbooks' ), array( 'label' => 'Podcasts' ), array( 'label' => 'Videos' ), array( 'label' => 'Templates' ) );
$fallback_resources = array(
	array( 'type' => 'Guide', 'title' => __( "The First-Year Principal's Playbook", 'rocketpd' ), 'body' => __( 'Twenty-four pages of practical advice from veteran school leaders on navigating your first year in the corner office.', 'rocketpd' ), 'meta' => __( '24-page PDF · 15 min read', 'rocketpd' ), 'icon' => 'book', 'accent' => 'purple', 'cta_label' => __( 'Open', 'rocketpd' ), 'cta_url' => home_url( '/resources/' ) ),
	array( 'type' => 'Webinar', 'title' => __( "What's Actually Working in MTSS This Year", 'rocketpd' ), 'body' => __( "Three district leaders share what they've learned from a full year of implementation — including what they'd do differently.", 'rocketpd' ), 'meta' => __( 'On-demand · 45 min', 'rocketpd' ), 'icon' => 'play', 'accent' => 'navy', 'cta_label' => __( 'Open', 'rocketpd' ), 'cta_url' => home_url( '/resources/' ) ),
	array( 'type' => 'Playbook', 'title' => __( 'Designing Coaching Cycles That Stick', 'rocketpd' ), 'body' => __( 'A field-tested framework for instructional coaches working with K-12 teachers across content areas.', 'rocketpd' ), 'meta' => __( 'Playbook · 18 pages', 'rocketpd' ), 'icon' => 'doc', 'accent' => 'gold', 'cta_label' => __( 'Open', 'rocketpd' ), 'cta_url' => home_url( '/resources/' ) ),
	array( 'type' => 'Podcast', 'title' => __( 'Inside the Lounge', 'rocketpd' ), 'body' => __( 'Weekly conversations with the educators, leaders, and thinkers shaping K-12 — recorded with the lights on and the polish off.', 'rocketpd' ), 'meta' => __( 'Weekly · 32 min episodes', 'rocketpd' ), 'icon' => 'audio', 'accent' => 'pink', 'cta_label' => __( 'Open', 'rocketpd' ), 'cta_url' => home_url( '/resources/' ) ),
	array( 'type' => 'Video Series', 'title' => __( '5-Minute Classroom Reset', 'rocketpd' ), 'body' => __( 'Quick, practical strategies you can use tomorrow morning. Eight short episodes from teachers in the room.', 'rocketpd' ), 'meta' => __( 'Video Series · 8 episodes', 'rocketpd' ), 'icon' => 'video', 'accent' => 'blue', 'cta_label' => __( 'Open', 'rocketpd' ), 'cta_url' => home_url( '/resources/' ) ),
	array( 'type' => 'Template', 'title' => __( 'PLC Agenda + Reflection Template', 'rocketpd' ), 'body' => __( 'A ready-to-use Google Doc structure for high-impact professional learning communities. Used by 600+ schools.', 'rocketpd' ), 'meta' => __( 'Editable Doc · Free', 'rocketpd' ), 'icon' => 'doc', 'accent' => 'dark', 'cta_label' => __( 'Open', 'rocketpd' ), 'cta_url' => home_url( '/resources/' ) ),
);
$filters         = rocketpd_get_field( 'rpd_home_resource_filters', $fallback_filters );
$resource_cards  = rocketpd_get_field( 'rpd_home_resource_cards', $fallback_resources );
$cta_headline    = rocketpd_get_field( 'rpd_home_resource_cta_headline', __( 'Join free to unlock the full library.', 'rocketpd' ) );
$cta_body        = rocketpd_get_field( 'rpd_home_resource_cta_body', __( '120+ guides, webinars, podcasts, and templates — plus weekly drops curated for educators and school leaders.', 'rocketpd' ) );
$primary_label   = rocketpd_get_field( 'rpd_home_resource_cta_primary_label', __( 'Join the Community Free', 'rocketpd' ) );
$primary_url     = rocketpd_get_field( 'rpd_home_resource_cta_primary_url', home_url( '/community/' ) );
$secondary_label = rocketpd_get_field( 'rpd_home_resource_cta_secondary_label', __( 'Browse All Resources', 'rocketpd' ) );
$secondary_url   = rocketpd_get_field( 'rpd_home_resource_cta_secondary_url', home_url( '/resources/' ) );
$filters         = array_filter(
	is_array( $filters ) ? $filters : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['label'] );
	}
);
$filters         = $filters ? $filters : $fallback_filters;
$resource_cards  = array_filter(
	is_array( $resource_cards ) ? $resource_cards : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['title'] );
	}
);
$resource_cards  = $resource_cards ? $resource_cards : $fallback_resources;

$resource_icon_map = array(
	'book'  => 'book-open',
	'play'  => 'play',
	'doc'   => 'file-text',
	'audio' => 'headphones',
	'video' => 'video',
);
?>

<section class="rpd-home-resources rpd-home-section">
	<div class="rpd-container">
		<header class="rpd-home-section-header">
			<p class="rpd-home-pill rpd-home-pill--gold"><?php echo esc_html( $badge ); ?></p>
			<h2>
				<?php
				$headline_parts = explode( 'Zero Cost.', $headline );
				if ( isset( $headline_parts[1] ) ) :
					echo esc_html( $headline_parts[0] );
					?>
					<span><?php esc_html_e( 'Zero Cost.', 'rocketpd' ); ?></span><?php echo esc_html( $headline_parts[1] ); ?>
				<?php else : ?>
					<?php echo esc_html( $headline ); ?>
				<?php endif; ?>
			</h2>
			<p><?php echo esc_html( $body ); ?></p>
		</header>
		<div class="rpd-home-filter-pills" aria-label="<?php esc_attr_e( 'Resource filters', 'rocketpd' ); ?>">
			<?php foreach ( $filters as $index => $filter ) : ?>
				<button class="<?php echo 0 === $index ? 'is-active' : ''; ?>" type="button"><?php echo esc_html( $filter['label'] ); ?></button>
			<?php endforeach; ?>
		</div>
		<div class="rpd-home-resource-grid">
			<?php foreach ( $resource_cards as $card ) : ?>
				<?php $resource_icon = $resource_icon_map[ $card['icon'] ?? 'book' ] ?? 'book'; ?>
				<article class="rpd-home-resource-card rpd-home-resource-card--<?php echo esc_attr( sanitize_html_class( $card['accent'] ?? 'purple' ) ); ?>">
					<div class="rpd-home-resource-card__top">
						<span><?php echo esc_html( $card['type'] ?? '' ); ?></span>
						<b><?php esc_html_e( 'Free', 'rocketpd' ); ?></b>
						<i aria-hidden="true"><?php echo rocketpd_get_icon( $resource_icon, 48 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></i>
					</div>
					<div class="rpd-home-resource-card__body">
						<h3><?php echo esc_html( $card['title'] ); ?></h3>
						<p><?php echo esc_html( $card['body'] ?? '' ); ?></p>
						<footer>
							<small><span aria-hidden="true"></span><?php echo esc_html( $card['meta'] ?? '' ); ?></small>
							<?php if ( ! empty( $card['cta_label'] ) && ! empty( $card['cta_url'] ) ) : ?>
								<a href="<?php echo esc_url( $card['cta_url'] ); ?>"><?php echo esc_html( $card['cta_label'] ); ?> <span aria-hidden="true">&rarr;</span></a>
							<?php endif; ?>
						</footer>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
		<div class="rpd-home-resource-cta">
			<div>
				<h3><?php echo esc_html( $cta_headline ); ?></h3>
				<p><?php echo esc_html( $cta_body ); ?></p>
			</div>
			<div class="rpd-home-actions">
				<?php if ( $primary_label && $primary_url ) : ?>
					<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?> <span aria-hidden="true">&rarr;</span></a>
				<?php endif; ?>
				<?php if ( $secondary_label && $secondary_url ) : ?>
					<a class="rpd-btn rpd-btn--outline-white" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
