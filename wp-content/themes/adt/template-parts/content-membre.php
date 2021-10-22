<?php 

if(!function_exists('get_field')) return;


?>
<h2 class="membre-name" ><?php the_field('prenom');?></h2>


  <ul class="infos-membre">
    <li><img src="<?php the_field('photo_didentite')?>"/></li>
    <li>Equipe numero : 
    <?php 
    $equipe_du_membre = get_field("equipe");
    echo '<a href="' . get_permalink($equipe_du_membre[0]->ID) . '">';
       echo $equipe_du_membre[0]->post_title;
    echo '</a>'
      ?>
  </li>
    <li>Nom : <?php the_field('nom') ;?></li>
      <li>Prenom : <?php the_field('prenom') ;?></li>
    <li>biographie : <?php the_field('biographie') ;?></li>
    <li class="social" ><a target="_blank" href="<?php the_field('twitter') ;?>"><span class="icon-twitter"></span></a></li>
    <li class="social" ><a target="_blank" href="<?php the_field('linkedin') ;?>"><span class="icon-linkedin"></span></a></li>
  </ul>
