    <!-- Division pour le sommaire -->
    <div id="menuGauche">

    </div>
        <div id="infosUtil">
            <h2> </h2>
        </div>
 
    <ul id="menuList">
        <li >
            <br />
             <?php echo $_SESSION['statut']."<br />". $_SESSION['prenom']."  ".$_SESSION['nom'] ?>
        </li>
        <?php 
        if($_SESSION['statut']=="Comptable"){
        ?>
            <li class="smenu">
            <a href="index.php?uc=validerFrais&action=selectionnerVisiteur" title="Valider fiche de frais ">Valider fiche de frais</a>
            </li>
            <li class="smenu">
            <a href="index.php?uc=suiviFrais&action=selectionnerSuivi" title="Suivi fiche de frais ">Suivi fiche de frais</a>
            </li>
        <?php 
        }else{
        ?> 
            <li class="smenu">
               <a href="index.php?uc=gererFrais&action=saisirFrais" title="Saisie fiche de frais ">Saisie fiche de frais</a>
            </li>
            <li class="smenu">
               <a href="index.php?uc=etatFrais&action=selectionnerMois" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
            </li>
        <?php } ?>
        <li class="smenu">
            <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
        </li>
     </ul>
</div>
    

