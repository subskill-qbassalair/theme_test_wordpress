<?php
/**
 * Template Name: privacy
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adt
 */

get_header();
?>

	<main id="primary" class="site-main">

  <div class="container-legal">

  <?php

		$args = array(
			'numberposts' => -1 ,
			'post_type' => "membre",
		);

		$membres = get_posts($args);
    $headers = array("Nom", "Prenom", "Equipe");

    
    $fields   = [];
    $infos    = [];
  
    array_push($fields, $headers);

    foreach($membres as $key => $membre){
      $infos[]      = get_field("nom", $membre->ID);
      $infos[]      = get_field("prenom", $membre->ID);
      $equipe       = get_field("equipe", $membre->ID);
      $equipe_name  = $equipe[0]->post_name;
      $infos[]      = $equipe_name;

      array_push($fields, $infos);

      $infos = [];
    }



    $infos_membre = fopen("infos_membre.csv", "w");
    foreach($fields as $field) {
        fputcsv($infos_membre, $field, ";");
    }
    fclose($infos_membre);

?>


	<h3>Politique de confidentalité </h3>



    <p>
      Politique globale de confidentialité pour les véhicules connectés Maserati (en vigueur depuis le 08/04/2021)
      
      
      La présente Politique globale de confidentialité pour les véhicules connectés Maserati (« Politique de confidentialité ») décrit comment nous traitons les Données personnelles que nous fournissent les utilisateurs des Services connectés via notre Véhicule, nos Sites Web ouApplication qui ont signé les Conditions générales en tant que Client ou qui sont autorisés en tant que Client à accéder et à utiliser les Services connectés.
      
      Nous sommes Maserati SpA (« Maserati, » « nous »), le Responsable du traitement ayant son siège social en Italie. Ce document complète la « Politique globale de confidentialité pour les véhicules Maserati » qui a été remise au Client à l'achat de son Véhicule. Vous trouverez de plus amples informations sur la manière dont nous collectons et traitons vos Données personnelles sur nos Sites Web et Application.
    </p>
  </div>

<?php
    var_dump($equipe_name);
?>



	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
