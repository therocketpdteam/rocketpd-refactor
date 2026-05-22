<?php
/**
 * Breadcrumb helpers.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'rocketpd_render_breadcrumbs' ) ) {
	/**
	 * Render a shared RocketPD breadcrumb trail.
	 *
	 * @param array $items Breadcrumb items. Each item supports label, url, and current.
	 * @param array $args  Reserved for future breadcrumb options.
	 */
	function rocketpd_render_breadcrumbs( $items, $args = array() ) {
		unset( $args );

		if ( empty( $items ) || ! is_array( $items ) ) {
			return;
		}

		$items = array_values(
			array_filter(
				$items,
				function ( $item ) {
					return is_array( $item ) && ! empty( $item['label'] );
				}
			)
		);

		if ( empty( $items ) ) {
			return;
		}
		?>
		<nav class="rpd-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rocketpd' ); ?>">
			<div class="rpd-container">
				<ol class="rpd-breadcrumb__list">
					<?php foreach ( $items as $item ) : ?>
						<?php
						$label      = (string) $item['label'];
						$url        = isset( $item['url'] ) ? (string) $item['url'] : '';
						$is_current = ! empty( $item['current'] );
						?>
						<li class="rpd-breadcrumb__item">
							<?php if ( $is_current ) : ?>
								<span class="rpd-breadcrumb__current" aria-current="page"><?php echo esc_html( $label ); ?></span>
							<?php elseif ( $url ) : ?>
								<a class="rpd-breadcrumb__link" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
							<?php else : ?>
								<span class="rpd-breadcrumb__current"><?php echo esc_html( $label ); ?></span>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ol>
			</div>
		</nav>
		<?php
	}
}
