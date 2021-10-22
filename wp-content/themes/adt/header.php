<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package adt
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,200&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;1,100&display=swap" rel="stylesheet">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/ScrollTrigger.min.js" defer></script>
	<script src="<?php echo get_template_directory_uri(); ?>../../adt_child/assets/js/app.js" defer></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'adt' ); ?></a>

	<header id="masthead" class="site-header">
<nav>
	<?php
	wp_nav_menu(
		array (
			'menu' => 'menu-1',
			'menu_id' => 'nav',
			'container' => 'ul',
			// 'add_li_class' => 'nav-links'
		)
	);
	?>
</nav>
		<div class="site-branding">
			<?php
			//the_custom_logo();
		//	if ( is_front_page() && is_home() ) :
				?>
				<!-- <h1 class="site-title"><a href="<?php //echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php// bloginfo( 'name' ); ?></a></h1>
				<?php
			//else :
				?>
				<p class="site-title"><a href="<?php //echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php //bloginfo( 'name' ); ?></a></p>
				<?php
		//	endif;
		//	$adt_description = get_bloginfo( 'description', 'display' );
		//	if ( //$adt_description || is_customize_preview() ) :
				?> -->
				<!-- <p class="site-description"><?php //echo $adt_description;  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p> -->
			<?php //endif; ?>
		</div><!-- .site-branding -->



	</header><!-- #masthead -->
