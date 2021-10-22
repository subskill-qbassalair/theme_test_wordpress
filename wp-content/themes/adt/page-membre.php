<?php
/**
 * Template Name: membre
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adt
 */

get_header();
?>

	<main id="primary" class="site-main">
	<h2>Information sur le membre :</h2>


		<?php

		if ( have_posts() ) : 
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content-membre' );

			endwhile; // End of the loop.
		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
