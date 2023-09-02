<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NomadTheme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="masthead" class="header-main site-header <?php if( !is_front_page()) echo 'header-position'; ?>">
		<div class="logo"><a href="/"><img src="<?php echo carbon_get_theme_option( 'crb_logo_black' ); ?>" alt="Логотип"></a></div>
		<div class="main-menu">
			<?php
				wp_nav_menu( [
					'theme_location'  => 'top-menu',
					'container'       => 'nav',
					'container_class' => 'destkop-menu',
					'menu_class'      => '',
				] );
			?>
			<a href="#" class="hamburger hamburger--slider">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
				</button></a>
		</div>
	</header>
	<?php
		wp_nav_menu( [
			'theme_location'  => 'main-menu',
			'container'       => 'div',
			'container_class' => 'mobile-menu',
			'menu_class'      => '',
		] );			
	?>

