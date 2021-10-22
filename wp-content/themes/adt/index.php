<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adt
 */

get_header();

?>

	<main id="primary" class="site-main">

	
		<h1 class="welcome-message" >
			Bienvenue sur le site test, <br>
			vous pourrez voir des articles, <br>
			des membres, des équipes <br>
			et en savoir plus sur nous
		</h1>

	<img class="main-img" src="<?php echo get_template_directory_uri(); ?>../../adt_child/assets/images/main-img.jpg" alt="image index">
	<?php get_search_form();?>



		<h3 class="index-sub-title">Les 3 derniers membres</h3>

		<div class="container-card-membre">
		<?php 

query_posts( array( 'post_type' => ('membre'), 'posts_per_page' => "3"));


  if ( have_posts() ) : 
		while ( have_posts()) : 
			the_post();

			 get_template_part( 'template-parts/content-card-membre' );

		 endwhile; // End of the loop.
	endif;

		?>
		</div>

		

	</main><!-- #main -->
<div class="margin-footer"></div>
<script src="<?php echo get_template_directory_uri(); ?>../../adt_child/assets/js/nav.js"defer></script>

<?php
// get_sidebar();
get_footer();
