<?php
/**
 * Home trust and partnerships section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$partnership_label = rocketpd_get_field( 'rpd_home_partnership_label', __( 'Featured State Partnership', 'rocketpd' ) );
$partnership_name  = rocketpd_get_field( 'rpd_home_partnership_name', __( 'Colorado Association of School Boards', 'rocketpd' ) );
$partnership_body  = rocketpd_get_field( 'rpd_home_partnership_body', __( 'Statewide partner for board-level professional learning — bringing RocketPD into districts across Colorado.', 'rocketpd' ) );
$stat_value        = rocketpd_get_field( 'rpd_home_partnership_stat_value', __( '178', 'rocketpd' ) );
$stat_label        = rocketpd_get_field( 'rpd_home_partnership_stat_label', __( 'Colorado school boards served', 'rocketpd' ) );
$fallback_endorsements = array( array( 'name' => 'Digital Promise' ), array( 'name' => 'Center for Educational Leadership' ), array( 'name' => 'Modern Classrooms Project' ), array( 'name' => 'Cult of Pedagogy' ), array( 'name' => 'Marshall Memo' ), array( 'name' => 'NESDEC' ), array( 'name' => 'Building Thinking Classrooms' ) );
$endorsements      = rocketpd_get_field( 'rpd_home_endorsements', $fallback_endorsements );
$district_eyebrow  = rocketpd_get_field( 'rpd_home_district_eyebrow', __( 'District Community', 'rocketpd' ) );
$district_headline = rocketpd_get_field( 'rpd_home_district_headline', __( 'Districts learning with RocketPD', 'rocketpd' ) );
$district_stat     = rocketpd_get_field( 'rpd_home_district_stat', __( '850+ districts in 47 states · and counting', 'rocketpd' ) );
$district_note     = rocketpd_get_field( 'rpd_home_district_note', __( 'A representative sample. Want your district featured?', 'rocketpd' ) );
$district_note_url = rocketpd_get_field( 'rpd_home_district_note_url', home_url( '/contact/' ) );
$fallback_districts = array(
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
$districts         = rocketpd_get_field( 'rpd_home_districts', $fallback_districts );
$endorsements      = array_filter(
	is_array( $endorsements ) ? $endorsements : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['name'] );
	}
);
$endorsements      = $endorsements ? $endorsements : $fallback_endorsements;
$districts         = array_filter(
	is_array( $districts ) ? $districts : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['name'] );
	}
);
$districts         = $districts ? $districts : $fallback_districts;
?>

<section class="rpd-home-trust rpd-home-section rpd-home-section--soft">
	<div class="rpd-container">
		<div class="rpd-home-partnership">
			<span class="rpd-home-medal" aria-hidden="true"></span>
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
