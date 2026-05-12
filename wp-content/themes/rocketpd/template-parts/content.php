<?php
/**
 * Default content partial.
 *
 * @package RocketPD
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'rpd-entry' ); ?>>
	<header class="rpd-entry__header">
		<?php the_title( '<h1 class="rpd-entry__title">', '</h1>' ); ?>
	</header>

	<div class="rpd-entry__content">
		<?php the_content(); ?>
	</div>
</article>

