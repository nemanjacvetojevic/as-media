<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">
					<div class="row">
						<div id="kontakt-info" class="col-12 col-md-6 col-lg-3">
							<h3>Kontakt Info</h3>
							<div class="row">
								<div class="col-2">
									<img src="https://192.168.1.184/wp-content/uploads/2019/02/phone-call.svg" alt="">
								</div>
								<div class="col-10">
									<span>+381 11 40 40 410</span>
								</div>
							</div>
							<div class="row">
								<div class="col-2">
									<img src="https://192.168.1.184/wp-content/uploads/2019/02/fax.svg" alt="">
								</div>
								<div class="col-10">
									<span>+381 11 40 40 445</span>
								</div>
							</div>
							<div class="row">
								<div class="col-2">
									<img src="https://192.168.1.184/wp-content/uploads/2019/02/email.svg" alt="">
								</div>
								<div class="col-10">
									<span>office@as-media.rs</span>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<span>Finansije: +381 11 40 40 485</span>
								</div>
							</div>
						</div>
						<div id="mapa-sajta" class="phone-display-none col-md-6 col-lg-2">
							<h3>Mapa sajta</h3>
							<?php wp_nav_menu(
								array(
									'theme_location'  => 'footer-menu',
									'container_class' => 'content',
									'container_id'    => 'footer-container-menu',
									'menu_class'      => 'list',
									'fallback_cb'     => '',
									'menu_id'         => 'footer-menu',
									'depth'           => 2,
									'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
								)
							); ?>
						</div>
						<div id="contact-form" class="phone-display-none col-md-12 col-lg-5">
							<!-- ovde ide shortcode za wp-formu -->
						</div>
						<div class="col-12 col-md-12 col-lg-2">
							<h4>DRUŠTVENE MREŽE</h4>
							<a href="#"><img src="https://192.168.1.184/wp-content/uploads/2019/02/facebook.svg" alt=""></a>
							<a href="#"><img src="https://192.168.1.184/wp-content/uploads/2019/02/instagram.svg" alt=""></a>
							<a href="#"><img src="https://192.168.1.184/wp-content/uploads/2019/02/twitter.svg" alt=""></a>
						</div>
					</div>
					<div class="row">
						<div class="col-6 col-md-3">
							<li>
								<a href="#">Odluka o oglašavanju</a>
							</li>
						</div>
						<div class="col-6 col-md-3">
							<li>
								<a href="#">Podaci o firmi</a>
							</li>
						</div>
						<div class="col-12 col-md-6">
							<span>© 2019 · Sva prava zadržana! · Dizajn: Smedia Team</span>
						</div>
					</div>


				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>
