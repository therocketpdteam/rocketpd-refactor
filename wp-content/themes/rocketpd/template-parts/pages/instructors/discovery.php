<?php
/**
 * Instructor discovery grid.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_instructors_discovery_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_eyebrow      = __( 'Explore by Topic', 'rocketpd' );
$default_headline     = __( 'Find the right expert for your challenge.', 'rocketpd' );
$default_body         = __( 'Every instructor maps to multiple topic areas - so you can explore by the work your team is doing right now.', 'rocketpd' );
$default_search_label = __( 'Search by name, topic, or format', 'rocketpd' );
$default_view_label   = __( 'Show more', 'rocketpd' );

if ( 'custom' === $mode ) {
	$eyebrow      = rocketpd_get_field( 'rpd_instructors_discovery_eyebrow', $default_eyebrow );
	$headline     = rocketpd_get_field( 'rpd_instructors_discovery_headline', $default_headline );
	$body         = rocketpd_get_field( 'rpd_instructors_discovery_body', $default_body );
	$search_label = rocketpd_get_field( 'rpd_instructors_search_label', $default_search_label );
	$view_label   = rocketpd_get_field( 'rpd_instructors_view_all_label', $default_view_label );
} else {
	$eyebrow      = $default_eyebrow;
	$headline     = $default_headline;
	$body         = $default_body;
	$search_label = $default_search_label;
	$view_label   = $default_view_label;
}

$topics        = function_exists( 'rocketpd_get_instructor_topics' ) ? rocketpd_get_instructor_topics() : array();
$instructors   = function_exists( 'rocketpd_get_instructors' ) ? rocketpd_get_instructors() : array();
$format_labels = function_exists( 'rocketpd_get_instructor_format_labels' ) ? rocketpd_get_instructor_format_labels() : array();
$format_icons  = function_exists( 'rocketpd_get_instructor_format_icons' ) ? rocketpd_get_instructor_format_icons() : array();
?>

<section class="rpd-instructors-discovery" id="instructor-discovery">
	<div class="rpd-container">
		<header class="rpd-instructors-section-header">
			<p class="rpd-instructors-section-header__eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</header>

		<?php if ( $topics ) : ?>
			<div class="rpd-instructors-topics" id="instructor-topics" data-rpd-instructor-topics>
				<?php foreach ( $topics as $index => $topic ) : ?>
					<?php
					$topic_name = is_array( $topic ) ? ( $topic['name'] ?? '' ) : $topic;
					$topic_slug = is_array( $topic ) ? ( $topic['slug'] ?? '' ) : sanitize_title( $topic_name );
					?>
					<button class="rpd-instructors-topic<?php echo 0 === $index ? ' is-active' : ''; ?>" type="button" data-topic="<?php echo esc_attr( $topic_slug ); ?>" aria-pressed="<?php echo 0 === $index ? 'true' : 'false'; ?>">
						<?php echo esc_html( $topic_name ); ?>
					</button>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<div class="rpd-instructors-search">
			<label class="screen-reader-text" for="rpd-instructor-search"><?php echo esc_html( $search_label ); ?></label>
			<span class="rpd-instructors-search__icon"><?php echo rocketpd_get_icon( 'search', 16 ); ?></span>
			<input id="rpd-instructor-search" type="search" data-rpd-instructor-search placeholder="<?php echo esc_attr__( 'Search by name, topic, or format...', 'rocketpd' ); ?>">
		</div>
		<p class="screen-reader-text" data-rpd-instructor-status aria-live="polite"></p>

		<div class="rpd-instructors-grid" data-rpd-instructor-grid>
			<?php foreach ( $instructors as $index => $instructor ) : ?>
				<?php
				$name       = $instructor['name'] ?? '';
				$slug       = $instructor['slug'] ?? '';
				$authority  = $instructor['authority'] ?? '';
				$tag_terms  = isset( $instructor['tag_terms'] ) && is_array( $instructor['tag_terms'] ) ? $instructor['tag_terms'] : array();
				$tags       = isset( $instructor['tags'] ) && is_array( $instructor['tags'] ) ? $instructor['tags'] : wp_list_pluck( $tag_terms, 'name' );
				$tag_slugs  = isset( $instructor['tag_slugs'] ) && is_array( $instructor['tag_slugs'] ) ? $instructor['tag_slugs'] : wp_list_pluck( $tag_terms, 'slug' );
				$formats    = isset( $instructor['formats'] ) && is_array( $instructor['formats'] ) ? $instructor['formats'] : array();
				$headshot   = $instructor['headshot'] ?? '';
				$initials   = $instructor['initials'] ?? '';
				$first_name = trim( strtok( str_replace( array( 'Dr. ', 'A.J.' ), array( '', 'A.J.' ), $name ), ' ' ) );
				$search_terms = strtolower( implode( ' ', array_merge( array( $name, $authority ), $tags, $formats ) ) );
				?>
				<article class="rpd-instructor-card" data-rpd-instructor-card data-tags="<?php echo esc_attr( implode( '|', $tag_slugs ) ); ?>" data-topics="<?php echo esc_attr( implode( '|', $tag_slugs ) ); ?>" data-search="<?php echo esc_attr( $search_terms ); ?>">
					<div class="rpd-instructor-card__image">
						<?php if ( $headshot ) : ?>
							<img src="<?php echo esc_url( $headshot ); ?>" alt="<?php echo esc_attr( $name ); ?>">
						<?php endif; ?>
						<span class="rpd-instructors-portrait-fallback" role="img" aria-label="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $initials ); ?></span>
					</div>
					<div class="rpd-instructor-card__body">
						<h3><?php echo esc_html( $name ); ?></h3>
						<p class="rpd-instructor-card__authority"><?php echo esc_html( $authority ); ?></p>
						<?php if ( $tags ) : ?>
							<div class="rpd-instructor-card__tags">
								<?php foreach ( $tags as $tag ) : ?>
									<span><?php echo esc_html( $tag ); ?></span>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
						<?php if ( $formats ) : ?>
							<div class="rpd-instructor-card__formats">
								<p><?php esc_html_e( 'Available formats', 'rocketpd' ); ?></p>
								<div>
									<?php foreach ( $formats as $format ) : ?>
										<?php if ( isset( $format_labels[ $format ] ) ) : ?>
											<span><?php echo rocketpd_get_instructor_icon( $format_icons[ $format ] ?? 'sparkles' ); ?><?php echo esc_html( $format_labels[ $format ] ); ?></span>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif; ?>
						<a class="rpd-instructor-card__link" href="<?php echo esc_url( home_url( '/instructors/' . $slug . '/' ) ); ?>">
							<?php
							printf(
								/* translators: %s: instructor first name. */
								esc_html__( 'Explore %s', 'rocketpd' ),
								esc_html( $first_name )
							);
							?>
							<span aria-hidden="true">&rarr;</span>
						</a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
		<p class="rpd-instructors-empty" data-rpd-instructor-empty hidden><?php esc_html_e( 'No instructors match those filters.', 'rocketpd' ); ?></p>

		<?php if ( $view_label ) : ?>
			<div class="rpd-instructors-view-all">
				<button class="rpd-btn rpd-btn--outline-purple" type="button" data-rpd-instructor-show-more><?php echo esc_html( $view_label ); ?></button>
			</div>
		<?php endif; ?>
	</div>
</section>
