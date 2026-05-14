<?php
/**
 * Course detail free resources.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course    = function_exists( 'rocketpd_get_current_course_detail' ) ? rocketpd_get_current_course_detail() : array();
$resources = function_exists( 'rocketpd_get_enabled_course_resources' ) ? rocketpd_get_enabled_course_resources( $course ) : array();
$guide     = $resources['guide'] ?? array();

if ( ! $resources ) {
	return;
}
?>

<section class="rpd-course-resources" id="free-resources">
	<div class="rpd-container">
		<header class="rpd-course-resources__header">
			<div>
				<p class="rpd-course-section-kicker"><?php esc_html_e( 'Free resources from Kim Marshall', 'rocketpd' ); ?></p>
				<h2><?php esc_html_e( "Start exploring Kim's work - free.", 'rocketpd' ); ?></h2>
			</div>
			<span><?php esc_html_e( "Want a feel for Kim's voice before you enroll? These are all free and instantly accessible.", 'rocketpd' ); ?></span>
		</header>
		<?php if ( $guide ) : ?>
			<article class="rpd-course-featured-guide">
				<div>
					<p><?php esc_html_e( 'Featured Free Guide', 'rocketpd' ); ?></p>
					<h3><?php echo esc_html( $guide['title'] ?? '' ); ?></h3>
					<span><?php echo esc_html( $guide['meta'] ?? '' ); ?></span>
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
				<article class="rpd-course-resource-card">
					<p><?php echo esc_html( $resource['meta'] ?? ucfirst( $key ) ); ?></p>
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
