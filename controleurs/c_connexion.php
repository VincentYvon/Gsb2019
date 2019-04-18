<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
    
	case 'demandeConnexion':{
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
                
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];
                
                /* Requêtes pour crypter en md5 les mots passes visiteur et comptable dans la base de données
                update visiteur set mdp = md5(mdp)
                update comptable set mdpComp = md5(mdpComp)
                */
                
                // Requete qui retourne les info d'un visiteur et d'un comptable "avec md5"
		$visiteur = $pdo->getInfosVisiteur($login,md5($mdp));
                $comptable = $pdo->getInfosComptable($login,md5($mdp));
                
                
                
                // Lors de la connexion si le login et mdp rentrée correspond a visiteur on affiche le sommaire du visiteur
                // Sinon on affiche le sommaire du comtpable qui contient d'autres pages
		if(!is_array($visiteur)&&(!is_array($comptable))){
			ajouterErreur("Login ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_connexion.php");
		}
                else if(is_array($comptable)){
                    $id = $comptable['idComp'];
                    $nom =  $comptable['nomComp'];
                    $prenom = $comptable['prenomComp'];
                    $statut = 'Comptable';
                    connecter($id,$nom,$prenom,$statut);
                    include("vues/v_sommaire.php");
                    
                }
		else{
                    $id = $visiteur['id'];
                    $nom =  $visiteur['nom'];
                    $prenom = $visiteur['prenom'];
                    $statut = 'Visiteur';
                    connecter($id,$nom,$prenom, $statut);
                    include("vues/v_sommaire.php");
		}
		break;
	}
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>