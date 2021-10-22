<?php
/**
 * Template Name: team
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adt
 */

get_header();
?>

	<main id="primary" class="site-main">
	<h2><?php the_title();  ?> </h2>

<?php
query_posts( array( 'post_type' => ('membre')));

if ( have_posts() ) : 
  while ( have_posts() ) :
    the_post();

    get_template_part( 'template-parts/content-membre' );

  endwhile; // End of the loop.
endif;
?>
<?php
get_sidebar();
get_footer();
