<?php
/**
 * Single post content column.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article class="rpd-post-article">
	<div class="rpd-post-content">
		<?php the_content(); ?>
	</div>
</article>
