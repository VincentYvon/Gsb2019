 <div id="contenu">
      <h2>Suivi</h2>
      <h3>Suivi à sélectionner : </h3>
      <form action="index.php?uc=suiviFrais&action=afficherSuivi" method="post">
      <div class="corpsForm">
         
      <p>
	 
        <label for="lstSuivi" accesskey="n">Suivi : </label>
        <select id="lstSuivi" name="lstSuivi">
            <?php
			foreach ($lesSuivi as $leSuivi)
			{
                            $id= $leSuivi['id'];
			    $nom = $leSuivi['nom'];
                            $prenom =  $leSuivi['prenom'];
                            $mois =  $leSuivi['mois'];
                            $montant =  $leSuivi['montant'];
                            
				?> 
				<option id="id" selected value="<?php echo $id."_".$mois ?>"><?php echo  $nom." ".$prenom." ".$mois." ".$montant ?> </option>
                                
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