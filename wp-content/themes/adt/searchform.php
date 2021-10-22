<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <p>
	<label for="s">Rechercher :
	<input type="text" name="s" id="s" />
   </p>
   <p>
	<label for="myselect">Catégorie :
	<select id="myselect" name="search">
		<option value="cat1">Equipes
		<option value="cat2">Membres
	</select>
   </p>
   <p>
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="Valider" />
   </p>
</form>