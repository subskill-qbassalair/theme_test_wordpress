<?php
/**
 * Template Name: posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adt
 */

get_header();
?>

	<main id="primary" class="site-main">



<h2>Derniers articles</h2>
<img class="posts-img" src="<?php echo get_template_directory_uri(); ?>../../adt_child/assets/images/posts-img.jpg" alt="image index">



  <?php
      $recentPosts = new WP_Query();
      $recentPosts->query('showposts=4');
      
  ?>
  <div class="background-posts">
    <div class="container-posts">
      <?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
        <div class="post-cust">
            <a href="<?php the_permalink() ?>" rel="bookmark">
            <?php the_post_thumbnail('medium'); ?>
            <p class="post-meta">le <?php the_time( get_option( 'date_format' ) ); ?></p>
            <h3><?php the_title(); ?></h3>
            <p><?php the_excerpt(); ?></p>
            </a>
        </div>
      <?php endwhile; ?>
    </div>
  </div>




  


	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
