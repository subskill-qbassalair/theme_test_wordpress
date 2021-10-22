<?php
/**
 * Template Name: contactez-nous
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adt
 */

get_header();
?>

	<main id="primary" class="site-main">
	<h4>Contactez nous !</h4>
  <div class="container-form">
		
		<p class="question" >Une question ? Besoin d'aide ?</p>
		<?php echo do_shortcode( '[contact-form-7 id="36" title="contact-form"]' ); ?>
	</div>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
