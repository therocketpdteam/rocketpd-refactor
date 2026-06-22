<?php
/**
 * Cohorts FAQ.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_cohorts_faq_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_kicker    = __( 'Cohort FAQ', 'rocketpd' );
$default_headline  = __( 'Common questions, clear answers.', 'rocketpd' );
$default_faqs      = array(
	array( 'question' => __( 'Are sessions recorded?', 'rocketpd' ),                            'answer' => __( "Yes. Every live session is recorded and posted to your Learning Portal within 24 hours. You'll have access for the full duration of your cohort plus 90 days afterward.", 'rocketpd' ) ),
	array( 'question' => __( 'Can districts register teams?', 'rocketpd' ),                     'answer' => __( 'Yes. District teams can register together, request invoices, and ask about custom cohort schedules for leadership teams or school-based groups.', 'rocketpd' ) ),
	array( 'question' => __( 'Can educators earn professional learning credit?', 'rocketpd' ),   'answer' => __( 'Every cohort includes attendance records, completion certificates, and documentation educators can submit according to local district requirements.', 'rocketpd' ) ),
	array( 'question' => __( 'How long do participants have access to recordings?', 'rocketpd' ),'answer' => __( 'Participants keep recordings, slides, and downloadable resources during the cohort and for 90 days after the final live session.', 'rocketpd' ) ),
	array( 'question' => __( 'What if I miss a session?', 'rocketpd' ),                         'answer' => __( 'You can watch the recording, download the materials, and continue in the async discussion before the next session.', 'rocketpd' ) ),
	array( 'question' => __( 'Are cohorts live or self-paced?', 'rocketpd' ),                   'answer' => __( 'Cohorts are live-virtual programs. If you need self-paced learning, browse the RocketPD Courses gallery for on-demand options.', 'rocketpd' ) ),
);

if ( 'custom' === $mode ) {
	$kicker    = rocketpd_get_field( 'rpd_cohorts_faq_kicker', $default_kicker );
	$headline  = rocketpd_get_field( 'rpd_cohorts_faq_headline', $default_headline );
	$acf_faqs  = rocketpd_get_field( 'rpd_cohorts_faqs', null );
	$faqs      = is_array( $acf_faqs ) && ! empty( $acf_faqs ) ? $acf_faqs : $default_faqs;
} else {
	$kicker   = $default_kicker;
	$headline = $default_headline;
	$faqs     = $default_faqs;
}
?>

<section class="rpd-cohorts-section rpd-cohorts-faq">
	<div class="rpd-container">
		<header class="rpd-cohorts-section__header rpd-cohorts-section__header--center">
			<p class="rpd-cohorts-kicker"><?php echo esc_html( $kicker ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
		</header>
		<div class="rpd-cohorts-faq__list" data-rpd-cohorts-faq>
			<?php foreach ( $faqs as $index => $faq ) : ?>
				<?php
				$button_id = 'rpd-cohort-faq-button-' . ( $index + 1 );
				$panel_id  = 'rpd-cohort-faq-panel-' . ( $index + 1 );
				$is_open   = 0 === $index;
				?>
				<div class="rpd-cohorts-faq__item">
					<button id="<?php echo esc_attr( $button_id ); ?>" type="button" aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr( $panel_id ); ?>">
						<span><?php echo esc_html( $faq['question'] ); ?></span>
						<i aria-hidden="true"></i>
					</button>
					<div class="rpd-cohorts-faq__panel" id="<?php echo esc_attr( $panel_id ); ?>" role="region" aria-labelledby="<?php echo esc_attr( $button_id ); ?>"<?php echo $is_open ? '' : ' hidden'; ?>>
						<p><?php echo esc_html( $faq['answer'] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
