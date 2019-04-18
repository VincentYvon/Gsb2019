<?php  // CONTROLEUR DE LA PAGE VALIDER FRAIS D'UNE CONNECTION D'UN COMPTABLE
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
    
switch($action){
    
        case 'selectionnerVisiteur':{
                    $lesVisiteurs=$pdo->getLesVisiteurs();
                    include("vues/v_listeVisiteur.php");
                    break;
            }
    
	case 'selectionnerMois':{
                $idVisiteur = $_REQUEST['lstVisiteur']; //on recupere id visiteur de la vue v_listeVisiteur
                $_SESSION['idV']=$idVisiteur; //on crée une session nommée idV qui contient idVisiteur
		$lesMois=$pdo->getLesMois($idVisiteur);
		// Afin de sélectionner par défaut le dernier mois dans la zone de liste
		// on demande toutes les clés, et on prend la première,
		// les mois étant triés décroissants
                if(count($lesMois)!=0){
                    $lesCles = array_keys( $lesMois );
                    $moisASelectionner = $lesCles[0];
                }
		include("vues/v_listeMois.php");
		break;
        }
        
        
        case 'refuserFrais':{
            //$idVisiteur = $_SESSION['idV'];
            //$leMois = $_SESSION['mois'];
	    $pdo->refuserFrais($id);
            break;
	}
        case 'reporterFrais':{
            $idVisiteur = $_SESSION['idV'];
            $leMois = $_SESSION['mois'];
	    $pdo->repoterFrais($idVisiteur,$leMois);
            break;
	}
        case 'validFrais':{
            $idVisiteur = $_SESSION['idV'];
            $leMois = $_SESSION['mois'];;
	    $pdo->validFrais($idVisiteur,$leMois);
            break;
	}
}