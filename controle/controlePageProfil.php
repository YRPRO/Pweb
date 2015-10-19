<?php 
	session_start();
	require('../modele/dataBase.php');
	require('../modele/accesBase.php');
	//recuperation des info utilisateur
	$_SESSION['infoUtilisateur'] = recupInfoUtilisateur($_SESSION['login']);
	//recuperation des commentaires pour l'utilisateur
	$_SESSION['comPublic'] = recupCommentairePublicSansUtilisateur($_SESSION['login']);
	$_SESSION['comUtilisateur'] = recupCommentaireUtilisateur($_SESSION['login']);
	
	$_SESSION['comAmis'] = recupComAmis($_SESSION['login']);
	$_SESSION['libelleTheme'] = recupLibelleTheme();
	$_SESSION['restriction'] = recupRestriction();
	$_SESSION['nbAmis'] = recupNbAmis($_SESSION['login']);
	$_SESSION['nbCom'] = recupNbComUtilisateur($_SESSION['login']);
	$_SESSION['nbLike'] =recupNbLikeUtilisateur($_SESSION['login']);
	//recuperation du chemin de la photo de profil
	$cheminPhotoDefault = "../avatarDefaut.png";
	if(aDejaUnPhoto($_SESSION['login'])){
		$_SESSION['cheminPhoto'] = recupCheminPhotoProfil($_SESSION['login']);
	}
	else
		$_SESSION['cheminPhoto'] = $cheminPhotoDefault;

	//liste des commentaire pouvant être liker (ou unliker) par l'utilisateur
	//traitement pour les com des amis
	$listeCom = $_SESSION['comAmis'];
	$listeComLikable = array( );
	for($i=0;$i<count($listeCom);$i++){
		if(! aDejaLiker($_SESSION['login'],$listeCom[$i]->idCommentaire))
			array_push($listeComLikable,$listeCom[$i]->idCommentaire);		
	}
	//traitement pour les com public
	$listeCom = $_SESSION['comPublic'];
	for($i=0;$i<count($listeCom);$i++){
		if(! aDejaLiker($_SESSION['login'],$listeCom[$i]->idCommentaire))
			array_push($listeComLikable,$listeCom[$i]->idCommentaire);
	}
	$_SESSION['listeComLikable'] = $listeComLikable;
	header('Location:../vue/profil.php');


?>