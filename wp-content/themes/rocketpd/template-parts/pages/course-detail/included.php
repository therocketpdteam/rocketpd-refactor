<?php
/**
 * Course detail included section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course   = function_exists( 'rocketpd_get_current_course_detail' ) ? rocketpd_get_current_course_detail() : array();
$format   = $course['format'] ?? 'self-paced';
$included = $course['included'][ $format ] ?? array();
$items    = isset( $included['items'] ) && is_array( $included['items'] ) ? $included['items'] : array();

if ( ! $items ) {
	return;
}
?>

<section class="rpd-course-included">
	<div class="rpd-container">
		<p class="rpd-course-section-kicker"><?php esc_html_e( "What's Included", 'rocketpd' ); ?></p>
		<h2><?php echo esc_html( $included['heading'] ?? __( 'Every RocketPD course includes', 'rocketpd' ) ); ?></h2>
		<ul class="rpd-course-included__list">
				<?php foreach ( $items as $item ) : ?>
					<?php
					$icon = sanitize_key( $item['icon'] ?? 'check' );
					?>
					<li>
						<span data-icon="<?php echo esc_attr( $icon ); ?>" aria-hidden="true">
							<?php if ( 'clock' === $icon ) : ?>
								<svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="8"></circle><path d="M12 7v5l3 2"></path></svg>
							<?php elseif ( in_array( $icon, array( 'layers', 'play' ), true ) ) : ?>
								<svg viewBox="0 0 24 24" focusable="false"><rect x="5" y="6" width="14" height="12" rx="2"></rect><path d="m10 10 5 2-5 2Z"></path></svg>
							<?php elseif ( 'book' === $icon ) : ?>
								<svg viewBox="0 0 24 24" focusable="false"><path d="M6 5h8a4 4 0 0 1 4 4v10h-8a4 4 0 0 0-4 0Z"></path><path d="M6 5v14"></path><path d="M10 9h4"></path><path d="M10 12h4"></path></svg>
							<?php elseif ( in_array( $icon, array( 'award', 'star' ), true ) ) : ?>
								<svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="9" r="5"></circle><path d="m9 14-1 6 4-2 4 2-1-6"></path></svg>
							<?php elseif ( 'screen' === $icon ) : ?>
								<svg viewBox="0 0 24 24" focusable="false"><rect x="4" y="5" width="16" height="11" rx="2"></rect><path d="M9 20h6"></path><path d="M12 16v4"></path><path d="M10 10.5 12 13l3-4"></path></svg>
							<?php elseif ( 'users' === $icon ) : ?>
								<svg viewBox="0 0 24 24" focusable="false"><path d="M8.5 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"></path><path d="M3.5 19a5 5 0 0 1 10 0"></path><path d="M16 11.5a2.5 2.5 0 1 0 0-5"></path><path d="M15.5 15a4 4 0 0 1 5 4"></path></svg>
							<?php elseif ( 'calendar' === $icon ) : ?>
								<svg viewBox="0 0 24 24" focusable="false"><rect x="5" y="5" width="14" height="15" rx="2"></rect><path d="M8 3v4"></path><path d="M16 3v4"></path><path d="M5 10h14"></path></svg>
							<?php else : ?>
								<svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="8"></circle><path d="m8.5 12 2.5 2.5 4.5-5"></path></svg>
							<?php endif; ?>
						</span>
						<?php echo esc_html( $item['label'] ?? '' ); ?>
					</li>
				<?php endforeach; ?>
		</ul>
	</div>
</section>
