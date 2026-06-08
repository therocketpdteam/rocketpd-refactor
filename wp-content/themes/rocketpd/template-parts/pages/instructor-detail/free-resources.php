<?php
/**
 * Instructor free resources.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$instructor = function_exists( 'rocketpd_get_current_instructor_detail' ) ? rocketpd_get_current_instructor_detail() : array();
$name       = $instructor['name'] ?? __( 'Kim Marshall', 'rocketpd' );
$first_name = function_exists( 'rocketpd_get_instructor_first_name' ) ? rocketpd_get_instructor_first_name( $name ) : trim( strtok( $name, ' ' ) );
$guide      = $instructor['guide'] ?? array();
$podcast    = $instructor['podcast'] ?? array();
$webinar    = $instructor['webinar'] ?? array();
$blog       = $instructor['blog'] ?? array();
$has_guide  = ! empty( $guide['enabled'] );
$has_podcast = ! empty( $podcast['enabled'] );
$has_webinar = ! empty( $webinar['enabled'] );
$has_blog   = ! empty( $blog['enabled'] ) && ! empty( $blog['posts'] ) && is_array( $blog['posts'] );

if ( ! $has_guide && ! $has_podcast && ! $has_webinar && ! $has_blog ) {
	return;
}
?>

<section class="rpd-instructor-resources" id="free-resources">
	<div class="rpd-container">
		<header class="rpd-instructor-section-header">
			<p class="rpd-instructor-section-kicker"><?php esc_html_e( 'Free resources', 'rocketpd' ); ?></p>
			<h2>
				<?php
				printf(
					/* translators: %s: instructor first name. */
					esc_html__( "Start exploring %s's work - free.", 'rocketpd' ),
					esc_html( $first_name )
				);
				?>
			</h2>
			<p><?php esc_html_e( 'Read, watch, and listen. Every resource below is designed to help school leaders take a single concrete step this week.', 'rocketpd' ); ?></p>
		</header>

		<?php if ( $has_guide ) : ?>
			<article class="rpd-instructor-guide-card">
				<div class="rpd-instructor-guide-card__feature">
					<?php echo rocketpd_get_icon( 'book-open', 32 ); ?>
					<p><?php esc_html_e( 'Featured Guide - Free', 'rocketpd' ); ?></p>
					<h3><?php echo esc_html( $guide['title'] ?? '' ); ?></h3>
					<span><?php echo esc_html( $guide['meta'] ?? '' ); ?></span>
				</div>
				<div class="rpd-instructor-guide-card__panel">
					<p><?php echo esc_html( $guide['summary'] ?? '' ); ?></p>
					<?php if ( ! empty( $guide['deliverables'] ) && is_array( $guide['deliverables'] ) ) : ?>
						<ul>
							<?php foreach ( $guide['deliverables'] as $deliverable ) : ?>
								<li><?php echo esc_html( $deliverable ); ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<?php if ( ! empty( $guide['href'] ) ) : ?>
						<div class="rpd-instructor-resource-actions">
							<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $guide['href'] ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Get the Free Guide', 'rocketpd' ); ?> <span aria-hidden="true">→</span></a>
							<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( $guide['href'] ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Preview a sample chapter', 'rocketpd' ); ?></a>
						</div>
					<?php endif; ?>
				</div>
			</article>
		<?php endif; ?>

		<?php if ( $has_podcast || $has_webinar ) : ?>
			<div class="rpd-instructor-media-grid">
				<?php foreach ( array( 'podcast' => $podcast, 'webinar' => $webinar ) as $type => $resource ) : ?>
					<?php if ( empty( $resource['enabled'] ) ) : ?>
						<?php continue; ?>
					<?php endif; ?>
					<article class="rpd-instructor-media-card">
						<?php
						$embed_id      = $resource['embed_id'] ?? '';
						$thumbnail_url = $embed_id ? 'https://img.youtube.com/vi/' . rawurlencode( $embed_id ) . '/hqdefault.jpg' : '';
						?>
						<div class="rpd-instructor-embed"<?php echo $thumbnail_url ? ' style="--rpd-instructor-embed-poster: url(' . esc_url( $thumbnail_url ) . ');"' : ''; ?>>
							<iframe loading="lazy" src="<?php echo esc_url( 'https://www.youtube-nocookie.com/embed/' . rawurlencode( $resource['embed_id'] ?? '' ) ); ?>" title="<?php echo esc_attr( $resource['title'] ?? sprintf( 'podcast' === $type ? __( '%s podcast episode', 'rocketpd' ) : __( '%s webinar', 'rocketpd' ), $name ) ); ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
						</div>
						<div class="rpd-instructor-media-card__body">
							<p><?php echo esc_html( $resource['meta'] ?? '' ); ?></p>
							<h3><?php echo esc_html( $resource['title'] ?? '' ); ?></h3>
							<span><?php echo esc_html( $resource['summary'] ?? '' ); ?></span>
							<?php if ( ! empty( $resource['href'] ) ) : ?>
								<a href="<?php echo esc_url( $resource['href'] ); ?>" target="_blank" rel="noopener noreferrer">
									<?php echo 'podcast' === $type ? esc_html__( 'Listen on YouTube', 'rocketpd' ) : esc_html__( 'Watch the webinar', 'rocketpd' ); ?>
									<span aria-hidden="true">-></span>
								</a>
							<?php endif; ?>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php if ( $has_blog ) : ?>
			<div class="rpd-instructor-blog-header">
				<div>
					<p class="rpd-instructor-section-kicker"><?php esc_html_e( 'LATEST FROM THE BLOG', 'rocketpd' ); ?></p>
					<h3><?php echo esc_html( sprintf( __( 'Recent articles featuring %s', 'rocketpd' ), $first_name ) ); ?></h3>
				</div>
				<a class="rpd-instructor-blog-header__link" href="<?php echo esc_url( home_url( '/resources/' ) ); ?>">
					<?php esc_html_e( 'See all articles', 'rocketpd' ); ?> <span aria-hidden="true">&rarr;</span>
				</a>
			</div>
			<div class="rpd-instructor-blog-grid">
				<?php foreach ( $blog['posts'] as $post_card ) : ?>
					<?php $placeholder = ! empty( $post_card['placeholder'] ); ?>
					<article class="rpd-instructor-blog-card<?php echo $placeholder ? ' is-placeholder' : ''; ?>">
						<p><?php echo esc_html( $post_card['meta'] ?? '' ); ?></p>
						<h3><?php echo esc_html( $post_card['title'] ?? '' ); ?></h3>
						<?php if ( ! empty( $post_card['excerpt'] ) ) : ?>
							<span><?php echo esc_html( $post_card['excerpt'] ); ?></span>
						<?php endif; ?>
						<?php if ( ! $placeholder && ! empty( $post_card['href'] ) ) : ?>
							<a href="<?php echo esc_url( $post_card['href'] ); ?>"><?php esc_html_e( 'Read article', 'rocketpd' ); ?> <span aria-hidden="true">-></span></a>
						<?php endif; ?>
					</article>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
