<?php  // CONTROLEUR DE LA PAGE VALIDER FRAIS D'UNE CONNECTION D'UN COMPTABLE
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
    
switch($action){
    
        case 'selectionnerSuivi':{
            $lesSuivi=$pdo->getSuivi();
            include("vues/v_selectionSuivi.php");
            break;
        }
        case'afficherSuivi':{
            //Methode qui sépare les deux variable du value lstSuivi (id et mois)
            $separe= explode("_", $_POST['lstSuivi']);
            $idVisiteur=$separe[0];
            $mois=$separe[1]; 
            $visiteur=$pdo->getNomPrenomVisiteur($idVisiteur);
            
            //Requete pour afficher les frais et justificatif
            $fraisForfait=$pdo->getLesFraisForfait($idVisiteur, $mois);
            $fraisHorsForfait=$pdo->getLesFraisHorsForfait($idVisiteur,$mois);
            $justificatif= $pdo->getNbjustificatifs($idVisiteur, $mois);

            $_SESSION['visiteur']=$visiteur;
            $_SESSION['fraisForfait']=$fraisForfait;
            $_SESSION['fraisHorsForfait']=$fraisHorsForfait;
            include("vues/v_afficherSuivi.php");
            break;
        }
        case'genererPdf':{
            include("vues/v_genererPdf.php");
            break;
            }
        case'telechargerPdf':{
            include("vues/v_telechargerPdf.php");
            break;
        }
        
        
  
    
}