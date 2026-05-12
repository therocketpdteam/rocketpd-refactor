<?php
/**
 * Global footer shell.
 *
 * @package RocketPD
 */

?>
<footer class="rpd-site-footer">
	<div class="rpd-container rpd-site-footer__inner">
		<p>
			<?php
			printf(
				/* translators: %s: current year. */
				esc_html__( 'Copyright %s RocketPD. All rights reserved.', 'rocketpd' ),
				esc_html( gmdate( 'Y' ) )
			);
			?>
		</p>
	</div>
</footer>

