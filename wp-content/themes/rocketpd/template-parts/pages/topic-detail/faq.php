<?php
/**
 * Topic detail FAQ.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$topic = $args['topic'] ?? array();
$faqs  = $topic['faqs'] ?? array();

if ( ! $faqs ) {
	return;
}

$schema = array(
	'@context'   => 'https://schema.org',
	'@type'      => 'FAQPage',
	'mainEntity' => array_map(
		function ( $faq ) {
			return array(
				'@type'          => 'Question',
				'name'           => wp_strip_all_tags( $faq['question'] ?? '' ),
				'acceptedAnswer' => array(
					'@type' => 'Answer',
					'text'  => wp_strip_all_tags( $faq['answer'] ?? '' ),
				),
			);
		},
		$faqs
	),
);
?>

<section class="rpd-topic-faq rpd-topic-detail-section rpd-topic-detail-anchor" id="topic-faq">
	<div class="rpd-container">
		<header class="rpd-topic-detail-section__header rpd-topic-detail-section__header--center">
			<p class="rpd-topic-detail-kicker"><?php esc_html_e( 'Topic FAQ', 'rocketpd' ); ?></p>
			<h2><?php esc_html_e( 'Educator questions about teacher supervision, evaluation, and coaching.', 'rocketpd' ); ?></h2>
		</header>
		<div class="rpd-topic-faq__list" data-rpd-topic-detail-faq>
			<?php foreach ( $faqs as $index => $faq ) : ?>
				<?php
				$button_id = 'rpd-topic-detail-faq-button-' . ( $index + 1 );
				$panel_id  = 'rpd-topic-detail-faq-panel-' . ( $index + 1 );
				$is_open   = 0 === $index;
				?>
				<div class="rpd-topic-faq__item">
					<button id="<?php echo esc_attr( $button_id ); ?>" type="button" aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr( $panel_id ); ?>">
						<span><?php echo esc_html( $faq['question'] ?? '' ); ?></span>
						<i aria-hidden="true"></i>
					</button>
					<div id="<?php echo esc_attr( $panel_id ); ?>" role="region" aria-labelledby="<?php echo esc_attr( $button_id ); ?>"<?php echo $is_open ? '' : ' hidden'; ?>>
						<p><?php echo esc_html( $faq['answer'] ?? '' ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<script type="application/ld+json"><?php echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?></script>
</section>
