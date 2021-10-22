<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package adt
 */

?>

</div><!-- #page -->

<?php  wp_footer(); ?>

<div class="container">
  <footer class="py-3 my-4">
    <?php
    wp_nav_menu(
      array (
        'menu' => 'footer-1',
        'menu_id' => 'footer',
        'menu_class' => 'nav justify-content-center border-bottom pb-3 mb-3',
        'container' => 'div',
        'walker' => new Adt_Walker_Nav_Menu()
      )
    );
    ?>
  </footer>
</div>

</body>
</html>
