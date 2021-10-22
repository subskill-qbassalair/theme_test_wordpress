<?php
/**
 * Template Name: teams
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adt
 */

get_header();
?>

	<main id="primary" class="site-main">
	<div class="container-title">
		<h2>Liste des équipes</h2>
	</div>

	<!-- <?php 
		// // query_posts( array( 'post_type' => ('membre')));

  // if ( have_posts() ) : 
		// while ( have_posts() ) : 
			// the_post();

			//  get_template_part( 'template-parts/content-card-team' );

		//  endwhile; // End of the loop.
	// endif;
		?>
	</main>< #main -->

	<div class="container-teams-links">

	<div class="card-team-link">
		<a href="http://localhost:8888/wordpress/equipe-numero-1/">
			<img src="<?php echo get_template_directory_uri(); ?>../../adt_child/assets/images/team1.jpg" alt="">
			<h3 class="team-number">Equipe numéro 1</h3>
		</a>
	</div>

	<div class="card-team-link">
		<a href="http://localhost:8888/wordpress/equipe-numero-2/">
			<img src="<?php echo get_template_directory_uri(); ?>../../adt_child/assets/images/team2.jpg" alt="">
			<h3 class="team-number">Equipe numéro 2</h3>
		</a>
	</div>

	<div class="card-team-link">
		<a href="http://localhost:8888/wordpress/equipe-numero-3/">
			<img src="<?php echo get_template_directory_uri(); ?>../../adt_child/assets/images/team3.jpg" alt="">
			<h3 class="team-number">Equipe numéro 3</h3>
		</a>
	</div>


</div>

<?php
get_sidebar();
get_footer();
