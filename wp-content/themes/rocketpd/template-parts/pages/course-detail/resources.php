<?php
/**
 * Course detail free resources.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course        = function_exists( 'rocketpd_get_current_course_detail' ) ? rocketpd_get_current_course_detail() : array();
$resources     = function_exists( 'rocketpd_get_enabled_course_resources' ) ? rocketpd_get_enabled_course_resources( $course ) : array();
$guide         = $resources['guide'] ?? array();
$instructor    = $course['instructor']['name'] ?? __( 'our instructor', 'rocketpd' );
$first_name    = explode( ' ', trim( $instructor ) );
$first_name    = end( $first_name ); // Last name as fallback; override below.
// Use first name if not prefixed with Dr./Mr./Ms. etc., otherwise use full name.
$display_name  = preg_match( '/^(Dr\.|Mr\.|Ms\.|Mrs\.|Prof\.)/i', $instructor ) ? $instructor : $first_name;

if ( ! $resources ) {
	return;
}
?>

<section class="rpd-course-resources" id="free-resources">
	<div class="rpd-container">
		<header class="rpd-course-resources__header">
			<div>
				<p class="rpd-course-section-kicker"><?php echo esc_html( sprintf( __( 'Free resources from %s', 'rocketpd' ), $instructor ) ); ?></p>
				<h2><?php echo esc_html( sprintf( __( "Start exploring %s's work - free.", 'rocketpd' ), $display_name ) ); ?></h2>
			</div>
			<span><?php echo esc_html( sprintf( __( "Want a feel for %s's voice before you enroll? These are all free and instantly accessible.", 'rocketpd' ), $display_name ) ); ?></span>
		</header>
		<?php if ( $guide ) : ?>
			<article class="rpd-course-featured-guide">
				<div>
					<p class="rpd-course-featured-guide__badge"><span aria-hidden="true">▱</span><?php esc_html_e( 'Featured Free Guide', 'rocketpd' ); ?></p>
					<h3><?php echo esc_html( $guide['title'] ?? '' ); ?></h3>
					<span><?php echo esc_html( $guide['meta'] ?? '' ); ?></span>
					<small class="rpd-course-featured-guide__footer"><span aria-hidden="true">☆</span> <?php echo esc_html( sprintf( __( 'Most-downloaded resource from %s', 'rocketpd' ), $instructor ) ); ?></small>
				</div>
				<div>
					<p><?php echo esc_html( $guide['summary'] ?? '' ); ?></p>
					<?php if ( ! empty( $guide['deliverables'] ) && is_array( $guide['deliverables'] ) ) : ?>
						<ul>
							<?php foreach ( $guide['deliverables'] as $deliverable ) : ?>
								<li><?php echo esc_html( $deliverable ); ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<?php if ( ! empty( $guide['href'] ) ) : ?>
						<div class="rpd-course-resource-actions">
							<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $guide['href'] ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Get the Free Guide', 'rocketpd' ); ?></a>
							<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( $guide['href'] ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Preview a sample chapter', 'rocketpd' ); ?></a>
						</div>
					<?php endif; ?>
				</div>
			</article>
		<?php endif; ?>
		<div class="rpd-course-resource-grid">
			<?php foreach ( $resources as $key => $resource ) : ?>
				<?php if ( 'guide' === $key ) : ?>
					<?php continue; ?>
				<?php endif; ?>
				<?php
				$type_meta  = function_exists( 'rocketpd_get_course_resource_type_meta' ) ? rocketpd_get_course_resource_type_meta( $key ) : array();
				$type_icon  = sanitize_key( $type_meta['icon'] ?? 'article' );
				$type_tone  = sanitize_key( $type_meta['tone'] ?? 'purple' );
				$type_label = $resource['meta'] ?? $type_meta['label'] ?? ucfirst( $key );
				?>
				<article class="rpd-course-resource-card rpd-course-resource-card--<?php echo esc_attr( $key ); ?>">
					<p class="rpd-course-resource-type-pill rpd-course-resource-type-pill--<?php echo esc_attr( $type_tone ); ?>">
						<span aria-hidden="true">
							<?php if ( 'mic' === $type_icon ) : ?>
								<svg viewBox="0 0 24 24" focusable="false"><rect x="9" y="4" width="6" height="10" rx="3"></rect><path d="M6 11a6 6 0 0 0 12 0"></path><path d="M12 17v3"></path><path d="M9 20h6"></path></svg>
							<?php elseif ( 'video' === $type_icon ) : ?>
								<svg viewBox="0 0 24 24" focusable="false"><rect x="4" y="6" width="13" height="12" rx="2"></rect><path d="m17 10 4-2v8l-4-2"></path><path d="m9 10 4 2-4 2Z"></path></svg>
							<?php elseif ( 'article' === $type_icon ) : ?>
								<svg viewBox="0 0 24 24" focusable="false"><path d="M7 4h7l3 3v13H7Z"></path><path d="M14 4v4h3"></path><path d="M10 12h4"></path><path d="M10 15h5"></path></svg>
							<?php elseif ( 'download' === $type_icon ) : ?>
								<svg viewBox="0 0 24 24" focusable="false"><path d="M12 4v10"></path><path d="m8 10 4 4 4-4"></path><path d="M5 19h14"></path></svg>
							<?php elseif ( 'users' === $type_icon ) : ?>
								<svg viewBox="0 0 24 24" focusable="false"><path d="M8.5 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"></path><path d="M3.5 19a5 5 0 0 1 10 0"></path><path d="M16 11.5a2.5 2.5 0 1 0 0-5"></path><path d="M15.5 15a4 4 0 0 1 5 4"></path></svg>
							<?php elseif ( 'course' === $type_icon ) : ?>
								<svg viewBox="0 0 24 24" focusable="false"><rect x="4" y="5" width="16" height="12" rx="2"></rect><path d="M8 21h8"></path><path d="M12 17v4"></path><path d="m10 9 5 2.5-5 2.5Z"></path></svg>
							<?php else : ?>
								<svg viewBox="0 0 24 24" focusable="false"><path d="M6 5h8a4 4 0 0 1 4 4v10h-8a4 4 0 0 0-4 0Z"></path><path d="M6 5v14"></path><path d="M10 9h4"></path><path d="M10 12h4"></path></svg>
							<?php endif; ?>
						</span>
						<?php echo esc_html( $type_label ); ?>
					</p>
					<h3><?php echo esc_html( $resource['title'] ?? '' ); ?></h3>
					<span><?php echo esc_html( $resource['summary'] ?? '' ); ?></span>
					<?php if ( ! empty( $resource['href'] ) ) : ?>
						<a href="<?php echo esc_url( $resource['href'] ); ?>" target="_blank" rel="noopener noreferrer">
							<?php echo esc_html( 'blog' === $key ? __( 'Read article', 'rocketpd' ) : __( 'Open', 'rocketpd' ) ); ?>
							<span aria-hidden="true">-&gt;</span>
						</a>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
