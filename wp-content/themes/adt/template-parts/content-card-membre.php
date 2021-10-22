<?php 

if(!function_exists('get_field')) return;

?>


  <div class="card-membre">
    <p>Nom : <?php the_field('nom'); ?></p>
    <p>Prenom : <?php the_field("prenom"); ?></p>
    <a href="http://localhost:8888/wordpress/membre/<?= the_title() ;?>">Voir les infos du membre</a>
  </div>
