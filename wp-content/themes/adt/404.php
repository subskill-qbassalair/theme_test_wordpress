<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package adt
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container-404">
			<h2 class="title-404"><span>E</span><span>r</span><span>r</span><span>e</span><span>u</span><span>r</span> <span>4</span>0<span>4</span></h2>

			<h4 class="sub-title-404">Page non trouvée</h4>

			<a class="button-404" href="http://localhost:8888/wordpress/" >Retourner en lieu sûre</a>

		</div>



	</main><!-- #main -->
	<script src="<?php echo get_template_directory_uri(); ?>../../adt_child/assets/js/page404.js"defer></script>

<?php
get_footer();
