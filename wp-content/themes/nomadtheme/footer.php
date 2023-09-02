<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NomadTheme
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-top">
			<div class="logo"><a href="/"><img src="<?php echo carbon_get_theme_option( 'crb_logo_white' ); ?>" alt=""></a></div>
			<ul class="social">
				<li><a href="<?php echo carbon_get_theme_option( 'crb_whatsapp' ); ?>"><i class="fab fa-whatsapp"></i></a></li>
				<li><a href="<?php echo carbon_get_theme_option( 'crb_vk' ); ?>"><i class="fab fa-vk"></i></a></li>
				<li><a href="<?php echo carbon_get_theme_option( 'crb_instagram' ); ?>"><i class="fab fa-instagram"></i></a></li>
			</ul>
		</div>
		<div class="footer-bottom">
			<?php
				wp_nav_menu( [
					'theme_location'  => 'footer-menu',
					'container'       => 'nav',
					'container_class' => 'footer-menu',
				] );			
			?>

			<div class="copyright">© 2019 NOMAD</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
