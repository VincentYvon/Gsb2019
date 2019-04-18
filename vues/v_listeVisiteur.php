 <div id="contenu">
      <h2>Les fiches de frais</h2>
      <h3>Visiteur à sélectionner : </h3>
      <form action="index.php?uc=validerFrais&action=selectionnerMois" method="post">
      <div class="corpsForm">
         
      <p>
	 
        <label for="lstVisiteur" accesskey="n">Visiteur : </label>
        <select id="lstVisiteur" name="lstVisiteur">
            <?php
			foreach ($lesVisiteurs as $unVisiteur)
			{
                            $id =  $unVisiteur['id'];
			    $nom = $unVisiteur['nom'];
                            $prenom =  $unVisiteur['prenom'];
				
				?>
				<option selected value="<?php echo $id; ?>"><?php echo  $nom." ".$prenom ?> </option>
				<?php 
				}
		   ?>    
            
        </select>
      </p>
      </div>
      <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p> 
      </div>
        
      </form>