<?php
/**
 * Home trust and partnerships section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_home_trust_mode', 'defaults' );

if ( 'hidden' === $mode ) {
	return;
}

$default_partnership_label = __( 'Featured State Partnership', 'rocketpd' );
$default_partnership_name  = __( 'Colorado Association of School Boards', 'rocketpd' );
$default_partnership_body  = __( 'Statewide partner for board-level professional learning — bringing RocketPD into districts across Colorado.', 'rocketpd' );
$default_stat_value        = __( '178', 'rocketpd' );
$default_stat_label        = __( 'Colorado school boards served', 'rocketpd' );
$default_endorsements      = array( array( 'name' => 'Digital Promise' ), array( 'name' => 'Center for Educational Leadership' ), array( 'name' => 'Modern Classrooms Project' ), array( 'name' => 'Cult of Pedagogy' ), array( 'name' => 'Marshall Memo' ), array( 'name' => 'NESDEC' ), array( 'name' => 'Building Thinking Classrooms' ) );
$default_district_eyebrow  = __( 'District Community', 'rocketpd' );
$default_district_headline = __( 'Districts learning with RocketPD', 'rocketpd' );
$default_district_stat     = __( '850+ districts in 47 states · and counting', 'rocketpd' );
$default_district_note     = __( 'A representative sample. Want your district featured?', 'rocketpd' );
$default_district_note_url = home_url( '/contact/' );
$default_districts         = array(
	array( 'name' => 'Denver Public Schools', 'state' => 'CO' ),
	array( 'name' => 'Cherry Creek Schools', 'state' => 'CO' ),
	array( 'name' => 'Boulder Valley SD', 'state' => 'CO' ),
	array( 'name' => 'Jeffco Public Schools', 'state' => 'CO' ),
	array( 'name' => 'Aurora Public Schools', 'state' => 'CO' ),
	array( 'name' => 'Adams 12 Five Star', 'state' => 'CO' ),
	array( 'name' => 'Stoughton Public Schools', 'state' => 'MA' ),
	array( 'name' => 'Austin ISD', 'state' => 'TX' ),
	array( 'name' => 'Fairfax County Public Schools', 'state' => 'VA' ),
	array( 'name' => 'Wake County Public Schools', 'state' => 'NC' ),
	array( 'name' => 'Mesa Public Schools', 'state' => 'AZ' ),
	array( 'name' => 'Tulsa Public Schools', 'state' => 'OK' ),
);

if ( 'custom' === $mode ) {
	$partnership_label = rocketpd_get_field( 'rpd_home_partnership_label', $default_partnership_label );
	$partnership_name  = rocketpd_get_field( 'rpd_home_partnership_name', $default_partnership_name );
	$partnership_body  = rocketpd_get_field( 'rpd_home_partnership_body', $default_partnership_body );
	$stat_value        = rocketpd_get_field( 'rpd_home_partnership_stat_value', $default_stat_value );
	$stat_label        = rocketpd_get_field( 'rpd_home_partnership_stat_label', $default_stat_label );
	$endorsements      = rocketpd_get_field( 'rpd_home_endorsements', $default_endorsements );
	$district_eyebrow  = rocketpd_get_field( 'rpd_home_district_eyebrow', $default_district_eyebrow );
	$district_headline = rocketpd_get_field( 'rpd_home_district_headline', $default_district_headline );
	$district_stat     = rocketpd_get_field( 'rpd_home_district_stat', $default_district_stat );
	$district_note     = rocketpd_get_field( 'rpd_home_district_note', $default_district_note );
	$district_note_url = rocketpd_get_field( 'rpd_home_district_note_url', $default_district_note_url );
	$districts         = rocketpd_get_field( 'rpd_home_districts', $default_districts );
	$endorsements      = array_filter(
		is_array( $endorsements ) ? $endorsements : array(),
		function ( $item ) {
			return is_array( $item ) && ! empty( $item['name'] );
		}
	);
	$endorsements      = $endorsements ? $endorsements : $default_endorsements;
	$districts         = array_filter(
		is_array( $districts ) ? $districts : array(),
		function ( $item ) {
			return is_array( $item ) && ! empty( $item['name'] );
		}
	);
	$districts         = $districts ? $districts : $default_districts;
} else {
	$partnership_label = $default_partnership_label;
	$partnership_name  = $default_partnership_name;
	$partnership_body  = $default_partnership_body;
	$stat_value        = $default_stat_value;
	$stat_label        = $default_stat_label;
	$endorsements      = $default_endorsements;
	$district_eyebrow  = $default_district_eyebrow;
	$district_headline = $default_district_headline;
	$district_stat     = $default_district_stat;
	$district_note     = $default_district_note;
	$district_note_url = $default_district_note_url;
	$districts         = $default_districts;
}
?>

<section class="rpd-home-trust rpd-home-section rpd-home-section--soft">
	<div class="rpd-container">
		<div class="rpd-home-partnership">
			<span class="rpd-home-medal" aria-hidden="true"><?php echo rocketpd_get_icon( 'award', 28 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
			<div>
				<p class="rpd-home-eyebrow"><?php echo esc_html( $partnership_label ); ?></p>
				<h2><?php echo esc_html( $partnership_name ); ?></h2>
				<p><?php echo esc_html( $partnership_body ); ?></p>
			</div>
			<div class="rpd-home-partnership__stat">
				<strong><?php echo esc_html( $stat_value ); ?></strong>
				<span><?php echo esc_html( $stat_label ); ?></span>
			</div>
		</div>

		<?php if ( $endorsements ) : ?>
			<div class="rpd-home-endorsements">
				<p class="rpd-home-eyebrow"><?php esc_html_e( 'Endorsed by leaders in education', 'rocketpd' ); ?></p>
				<div>
					<?php foreach ( $endorsements as $item ) : ?>
						<span><?php echo esc_html( $item['name'] ); ?></span>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>

		<div class="rpd-home-districts">
			<header>
				<div>
					<p class="rpd-home-eyebrow"><?php echo esc_html( $district_eyebrow ); ?></p>
					<h2><?php echo esc_html( $district_headline ); ?></h2>
				</div>
				<p><?php echo esc_html( $district_stat ); ?></p>
			</header>
			<div class="rpd-home-district-grid">
				<?php foreach ( $districts as $district ) : ?>
					<div>
						<strong><?php echo esc_html( $district['name'] ); ?></strong>
						<?php if ( ! empty( $district['state'] ) ) : ?>
							<span><?php echo esc_html( $district['state'] ); ?></span>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
			<p class="rpd-home-districts__note">
				<em><?php echo esc_html( $district_note ); ?></em>
				<?php if ( $district_note_url ) : ?>
					<a href="<?php echo esc_url( $district_note_url ); ?>"><?php esc_html_e( 'Bring RocketPD to your team', 'rocketpd' ); ?> <span aria-hidden="true">&rarr;</span></a>
				<?php endif; ?>
			</p>
		</div>
	</div>
</section>
