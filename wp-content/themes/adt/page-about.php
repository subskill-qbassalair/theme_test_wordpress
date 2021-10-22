<?php
/**
 * Template Name: about
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adt
 */

get_header();
?>

    <main id="primary" class="site-main">
        <div class="container-title">
            <h2 class="title-about"><?php the_title() ?></h2>
        </div>

        <h3 class="sub-title-about"><?= get_field("qsn_h3") ?></h3>

        <div class="container-text-about">
            <p class="about-text-left" >
                <?php
                echo get_field("qsn_p_left");
                ?>
            </p>
            <p class="about-text-right" >
                <?php
                echo get_field("qsn_p_right");
                ?>
            </p>
        </div>
    </main><!-- #main -->

<?php
get_sidebar();
get_footer();
