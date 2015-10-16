<?php 
	session_start();
	require('../modele/dataBase.php');
	require('../modele/accesBase.php');
	//recuperation des commentaires pour l'utilisateur
	$_SESSION['comPublic'] = recupCommentairePublic();
	$_SESSION['comUtilisateur'] = recupCommentaireUtilisateur($_SESSION['login']);
	
	$_SESSION['comAmis'] = recupComAmis($_SESSION['login']);
	header('Location:../vue/profil.php');


?>