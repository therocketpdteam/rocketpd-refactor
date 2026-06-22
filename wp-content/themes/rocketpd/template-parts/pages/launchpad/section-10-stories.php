<?php
/**
 * LaunchPad stories.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_lp_get_field( 'lp_stories_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_eyebrow  = __( 'Hear from Districts', 'rocketpd' );
$default_h2       = __( 'Real stories from district leaders.', 'rocketpd' );
$default_subhead  = __( 'Hear how districts use LaunchPad to support educator growth and engagement at scale.', 'rocketpd' );
$default_featured = array(
	'video_url' => 'https://youtu.be/RQ8chrTTjIo',
	'thumbnail' => rocketpd_lp_asset( 'testimonial-1-thumb.jpg' ),
	'duration'  => '2:14',
	'quote'     => '"We have professional learning that is personalized to our professional learning goals."',
	'name'      => 'District Leader',
	'role'      => 'Professional Learning Director',
);
$default_all = array(
	'title' => __( 'See all customer stories', 'rocketpd' ),
	'url'   => 'https://www.youtube.com/watch?v=3jk0UdHKsLY&list=PL6e_Zm93bochKPB6Ome1inDLxYqF2yZo_',
);

if ( 'custom' === $mode ) {
	$eyebrow  = rocketpd_lp_get_field( 'stories_eyebrow', $default_eyebrow );
	$h2       = rocketpd_lp_get_field( 'stories_h2', $default_h2 );
	$subhead  = rocketpd_lp_get_field( 'stories_subhead', $default_subhead );
	$featured = rocketpd_lp_get_field( 'stories_featured', $default_featured );
	$featured = is_array( $featured ) && ! empty( $featured['video_url'] ) ? $featured : $default_featured;
	$all      = rocketpd_lp_get_field( 'stories_all_link', $default_all );
} else {
	$eyebrow  = $default_eyebrow;
	$h2       = $default_h2;
	$subhead  = $default_subhead;
	$featured = $default_featured;
	$all      = $default_all;
}

// Extract YouTube video ID for lightbox embed.
$video_id = '';
$video_url = $featured['video_url'] ?? '';
if ( preg_match( '/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/))([a-zA-Z0-9_-]{11})/', $video_url, $m ) ) {
	$video_id = $m[1];
}
?>
<section class="rpd-lp-section rpd-lp-stories">
	<div class="rpd-container">
		<header class="rpd-lp-section-header rpd-lp-section-header--center"><p class="rpd-lp-eyebrow"><?php echo esc_html( $eyebrow ); ?></p><h2><?php echo esc_html( $h2 ); ?></h2><p><?php echo esc_html( $subhead ); ?></p></header>
		<div class="rpd-lp-stories__grid">
			<a class="rpd-lp-story-card rpd-lp-story-card--featured" href="<?php echo esc_url( $video_url ); ?>" <?php if ( $video_id ) : ?>data-lp-video="<?php echo esc_attr( $video_id ); ?>" <?php endif; ?>target="_blank" rel="noopener noreferrer">
				<div class="rpd-lp-story-card__media"><img src="<?php echo esc_url( rocketpd_lp_image_url( $featured['thumbnail'] ?? '', rocketpd_lp_asset( 'testimonial-1-thumb.jpg' ) ) ); ?>" alt="<?php esc_attr_e( 'District leader testimonial about RocketPD LaunchPad', 'rocketpd' ); ?>"><span><?php esc_html_e( 'Featured', 'rocketpd' ); ?></span><b><?php rocketpd_lp_icon( 'play' ); ?></b><em><?php echo esc_html( $featured['duration'] ?? '2:14' ); ?></em></div>
				<div class="rpd-lp-story-card__body"><?php rocketpd_lp_icon( 'quote' ); ?><h3><?php echo esc_html( $featured['quote'] ?? '' ); ?></h3><p><strong><?php echo esc_html( $featured['name'] ?? '' ); ?></strong><small><?php echo esc_html( $featured['role'] ?? '' ); ?></small></p><span><?php esc_html_e( 'Watch story', 'rocketpd' ); ?> →</span></div>
			</a>
		</div>
		<p class="rpd-lp-link-row"><a href="<?php echo esc_url( $all['url'] ?? $default_all['url'] ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $all['title'] ?? __( 'See all customer stories', 'rocketpd' ) ); ?> →</a></p>
	</div>
</section>

<?php if ( $video_id ) : ?>
<div class="rpd-lp-lightbox" id="rpd-lp-lightbox" hidden aria-modal="true" role="dialog" aria-label="<?php esc_attr_e( 'District story video', 'rocketpd' ); ?>">
	<button class="rpd-lp-lightbox__close" aria-label="<?php esc_attr_e( 'Close video', 'rocketpd' ); ?>">×</button>
	<div class="rpd-lp-lightbox__frame">
		<iframe id="rpd-lp-lightbox-iframe" src="" title="<?php esc_attr_e( 'District story', 'rocketpd' ); ?>" allowfullscreen allow="autoplay; encrypted-media"></iframe>
	</div>
</div>
<script>
(function () {
	var lightbox = document.getElementById('rpd-lp-lightbox');
	var iframe   = document.getElementById('rpd-lp-lightbox-iframe');

	function openLightbox(videoId) {
		iframe.src = 'https://www.youtube-nocookie.com/embed/' + videoId + '?autoplay=1&rel=0';
		lightbox.hidden = false;
		document.body.style.overflow = 'hidden';
	}

	function closeLightbox() {
		iframe.src = '';
		lightbox.hidden = true;
		document.body.style.overflow = '';
	}

	document.querySelectorAll('[data-lp-video]').forEach(function (el) {
		el.addEventListener('click', function (e) {
			e.preventDefault();
			openLightbox(this.dataset.lpVideo);
		});
	});

	lightbox.addEventListener('click', function (e) {
		if (e.target === lightbox) closeLightbox();
	});

	document.querySelector('.rpd-lp-lightbox__close').addEventListener('click', closeLightbox);

	document.addEventListener('keydown', function (e) {
		if (e.key === 'Escape' && !lightbox.hidden) closeLightbox();
	});
}());
</script>
<?php endif; ?>
