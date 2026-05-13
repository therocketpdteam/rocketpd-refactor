<?php
/**
 * LaunchPad instructor grid.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$instructors = rocketpd_get_field(
	'rpd_launchpad_instructors',
	array(
		array( 'name' => __( 'Robert Barnett', 'rocketpd' ), 'topic' => __( 'Personalized Instruction', 'rocketpd' ), 'body' => __( 'Redesigning instruction to meet every learner’s needs.', 'rocketpd' ) ),
		array( 'name' => __( 'Dr. Luvelle Brown', 'rocketpd' ), 'topic' => __( 'Schools, Equity & Leadership', 'rocketpd' ), 'body' => __( 'Creating a culture of love that supports the needs of every learner.', 'rocketpd' ) ),
		array( 'name' => __( 'Dr. Steve Constantino', 'rocketpd' ), 'topic' => __( 'Family Engagement', 'rocketpd' ), 'body' => __( 'Six life principles for engaging families in student success.', 'rocketpd' ) ),
		array( 'name' => __( 'Beth P. Estill', 'rocketpd' ), 'topic' => __( 'Writing Instruction', 'rocketpd' ), 'body' => __( 'Identifying and addressing learning gaps with personalized instruction.', 'rocketpd' ) ),
		array( 'name' => __( 'Jennifer Gonzalez', 'rocketpd' ), 'topic' => __( 'Teaching Strategies', 'rocketpd' ), 'body' => __( 'Fine-tune your lessons with the fundamentals.', 'rocketpd' ) ),
		array( 'name' => __( 'Dr. Michael Hinojosa', 'rocketpd' ), 'topic' => __( 'Becoming an Influencer', 'rocketpd' ), 'body' => __( 'Identify and manage school politics.', 'rocketpd' ) ),
		array( 'name' => __( 'A.J. Juliani', 'rocketpd' ), 'topic' => __( 'Relevant Learning', 'rocketpd' ), 'body' => __( 'Make learning real and relevant for students now and in the future.', 'rocketpd' ) ),
		array( 'name' => __( 'Kim Marshall', 'rocketpd' ), 'topic' => __( 'Teacher Leadership', 'rocketpd' ), 'body' => __( 'Drive efficiencies and staff engagement through observations.', 'rocketpd' ) ),
		array( 'name' => __( 'Carla Tantillo Philibert', 'rocketpd' ), 'topic' => __( 'Academic Frameworks and Math', 'rocketpd' ), 'body' => __( 'Empower teachers and staff to advocate for wellness and growth.', 'rocketpd' ) ),
		array( 'name' => __( 'Veronica V. Sopher', 'rocketpd' ), 'topic' => __( 'School Communications', 'rocketpd' ), 'body' => __( 'Build trust and address sensitive topics with parents and community members.', 'rocketpd' ) ),
		array( 'name' => __( 'Dr. Catlin Tucker', 'rocketpd' ), 'topic' => __( 'Blended Learning', 'rocketpd' ), 'body' => __( 'Use blended learning models to put students at the center of the academic journey.', 'rocketpd' ) ),
	)
);
?>

<section class="rpd-lp-instructors rpd-lp-section">
	<div class="rpd-container">
		<header class="rpd-lp-instructors__header">
			<div>
				<p class="rpd-lp-eyebrow"><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_instructors_eyebrow', __( 'Meet Your Instructors', 'rocketpd' ) ) ); ?></p>
				<h2><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_instructors_headline', __( 'Learn from K–12’s Most Trusted Voices.', 'rocketpd' ) ) ); ?></h2>
				<p><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_instructors_intro', __( 'Every LaunchPad course is led by a nationally recognized educator, author, or K–12 leader — so your team learns from the voices already shaping the field.', 'rocketpd' ) ) ); ?></p>
			</div>
			<a href="<?php echo esc_url( rocketpd_get_field( 'rpd_launchpad_instructors_link', home_url( '/instructors/' ) ) ); ?>"><?php esc_html_e( 'See all instructors', 'rocketpd' ); ?> →</a>
		</header>
		<div class="rpd-lp-instructors__grid">
			<?php foreach ( $instructors as $index => $instructor ) : ?>
				<?php
				$name = isset( $instructor['name'] ) ? $instructor['name'] : '';
				$topic = isset( $instructor['topic'] ) ? $instructor['topic'] : '';
				$body = isset( $instructor['body'] ) ? $instructor['body'] : '';
				?>
				<article class="rpd-lp-instructor-card">
					<div class="rpd-lp-instructor-card__image rpd-lp-instructor-card__image--<?php echo esc_attr( (string) ( ( $index % 6 ) + 1 ) ); ?>">
						<span><?php esc_html_e( 'Watch trailer', 'rocketpd' ); ?></span>
					</div>
					<p><?php echo esc_html( $topic ); ?></p>
					<h3><?php echo esc_html( $name ); ?></h3>
					<span><?php echo esc_html( $body ); ?></span>
				</article>
			<?php endforeach; ?>
			<article class="rpd-lp-more-card">
				<span aria-hidden="true">→</span>
				<h3><?php esc_html_e( '+ More courses coming soon', 'rocketpd' ); ?></h3>
				<p><?php esc_html_e( 'Explore the full library of practical, recognized instructors.', 'rocketpd' ); ?></p>
				<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( home_url( '/instructors/' ) ); ?>"><?php esc_html_e( 'See all instructors', 'rocketpd' ); ?> →</a>
			</article>
		</div>
	</div>
</section>
