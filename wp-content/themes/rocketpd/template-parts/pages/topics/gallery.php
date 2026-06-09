<?php
/**
 * Topic Index gallery.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$topics     = function_exists( 'rocketpd_get_topics' ) ? rocketpd_get_topics() : array();
$categories = function_exists( 'rocketpd_get_topic_categories' ) ? rocketpd_get_topic_categories() : array();
$filters    = array(
	'all'             => __( 'All Topics', 'rocketpd' ),
	'featured'        => __( 'Featured', 'rocketpd' ),
	'newest'          => __( 'Newest', 'rocketpd' ),
	'leadership'      => __( 'Leadership', 'rocketpd' ),
	'instruction'     => __( 'Instruction', 'rocketpd' ),
	'student-support' => __( 'Student Support', 'rocketpd' ),
	'technology'      => __( 'Technology', 'rocketpd' ),
	'wellness'        => __( 'Wellness & Culture', 'rocketpd' ),
);
?>

<section class="rpd-topics-gallery rpd-topics-section" id="gallery" data-rpd-topics>
	<div class="rpd-container">
		<header class="rpd-topics-section__header">
			<p class="rpd-topics-kicker"><?php esc_html_e( 'Topic Gallery', 'rocketpd' ); ?></p>
			<h2><?php esc_html_e( 'Browse every RocketPD topic hub.', 'rocketpd' ); ?></h2>
			<span><?php esc_html_e( 'Search by keyword or filter by category to find the educational hub aligned to the work in front of you.', 'rocketpd' ); ?></span>
		</header>
		<div class="rpd-topics-gallery__controls">
			<div class="rpd-topics-gallery__search-row">
				<label class="screen-reader-text" for="rpd-topics-search"><?php esc_html_e( 'Search topic hubs', 'rocketpd' ); ?></label>
				<span aria-hidden="true"></span>
				<input id="rpd-topics-search" type="search" data-rpd-topics-search placeholder="<?php esc_attr_e( 'Search topics, instructors, or descriptions...', 'rocketpd' ); ?>">
				<button type="button" data-rpd-topics-clear data-rpd-topics-clear-inline hidden><?php esc_html_e( 'Clear all', 'rocketpd' ); ?> <span data-rpd-topics-active-count></span></button>
			</div>
			<div class="rpd-topics-filter-row" aria-label="<?php esc_attr_e( 'Topic filters', 'rocketpd' ); ?>">
				<span><?php esc_html_e( 'Category', 'rocketpd' ); ?></span>
				<?php foreach ( $filters as $filter => $label ) : ?>
					<button class="<?php echo 'all' === $filter ? 'is-active' : ''; ?>" type="button" data-rpd-topic-filter="<?php echo esc_attr( $filter ); ?>" aria-pressed="<?php echo 'all' === $filter ? 'true' : 'false'; ?>"><?php echo esc_html( $label ); ?></button>
				<?php endforeach; ?>
			</div>
		</div>
		<p class="rpd-topics-gallery__status" aria-live="polite" data-rpd-topics-status>
			<?php
			printf(
				/* translators: %d: topic count. */
				esc_html__( 'Showing %d of %d topics', 'rocketpd' ),
				count( $topics ),
				count( $topics )
			);
			?>
		</p>
		<div class="rpd-topics-card-grid">
			<?php foreach ( $topics as $topic ) : ?>
				<?php
				$category = rocketpd_get_topic_category( $topic['category'] );
				$search   = implode( ' ', array( $topic['title'], $topic['category'], $category['label'], $topic['description'], $topic['expert'] ) );
				?>
				<a
					class="rpd-topic-card rpd-topic-tone--<?php echo esc_attr( $category['tone'] ); ?>"
					href="<?php echo esc_url( $topic['href'] ); ?>"
					aria-label="<?php echo esc_attr( sprintf( __( 'Explore %s topic hub', 'rocketpd' ), $topic['title'] ) ); ?>"
					data-rpd-topic-card
					data-category="<?php echo esc_attr( $topic['category'] ); ?>"
					data-featured="<?php echo ! empty( $topic['featured'] ) ? 'true' : 'false'; ?>"
					data-newest="<?php echo ! empty( $topic['newest'] ) ? 'true' : 'false'; ?>"
					data-search="<?php echo esc_attr( strtolower( $search ) ); ?>"
				>
					<div class="rpd-topic-card__top">
						<span class="rpd-topics-icon-shell" aria-hidden="true">
							<?php echo rocketpd_topic_icon_svg( $topic['icon'], 'rpd-topics-icon' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</span>
						<span class="rpd-topics-category-chip"><?php echo esc_html( $category['label'] ); ?></span>
					</div>
					<h3><?php echo esc_html( $topic['title'] ); ?></h3>
					<p><?php echo esc_html( $topic['description'] ); ?></p>
					<div class="rpd-topic-card__expert">
						<?php if ( ! empty( $topic['headshot'] ) ) : ?>
							<img src="<?php echo esc_url( $topic['headshot'] ); ?>" alt="" loading="lazy" decoding="async">
						<?php endif; ?>
						<div>
							<span><?php esc_html_e( 'Featured Expert', 'rocketpd' ); ?></span>
							<strong><?php echo esc_html( $topic['expert'] ); ?></strong>
						</div>
					</div>
					<footer>
						<span><?php echo esc_html( $topic['resources'] ); ?> <?php esc_html_e( 'resources', 'rocketpd' ); ?></span>
						<span><?php echo esc_html( $topic['upcoming'] ); ?> <?php esc_html_e( 'upcoming', 'rocketpd' ); ?></span>
						<strong><?php esc_html_e( 'Explore', 'rocketpd' ); ?> <span aria-hidden="true">-&gt;</span></strong>
					</footer>
				</a>
			<?php endforeach; ?>
		</div>
		<div class="rpd-topics-empty" data-rpd-topics-empty hidden>
			<h3><?php esc_html_e( 'No topic hubs match those filters.', 'rocketpd' ); ?></h3>
			<p><?php esc_html_e( 'Try a broader search or clear the filters to see every topic hub.', 'rocketpd' ); ?></p>
			<button class="rpd-btn rpd-btn--outline-purple" type="button" data-rpd-topics-clear><?php esc_html_e( 'Clear all filters', 'rocketpd' ); ?></button>
		</div>
	</div>
</section>
