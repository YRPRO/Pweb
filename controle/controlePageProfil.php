<?php 
	session_start();
	require('../modele/dataBase.php');
	require('../modele/accesBase.php');
	//recuperation des commentaires pour l'utilisateur
	$_SESSION['comPublic'] = recupCommentairePublic();
	$_SESSION['comUtilisateur'] = recupCommentaireUtilisateur($_SESSION['login']);
	$_SESSION['comAmis'] = recupComAmis($_SESSION['login']);
	$_SESSION['libelleTheme'] = recupLibelleTheme();
	$_SESSION['restriction'] = recupRestriction();
	$_SESSION['nbAmis'] = recupNbAmis($_SESSION['login']);
	$_SESSION['nbCom'] = recupNbComUtilisateur($_SESSION['login']);
	$_SESSION['nbLike'] =recupNbLikeUtilisateur($_SESSION['login']);
	header('Location:../vue/profil.php');


?>