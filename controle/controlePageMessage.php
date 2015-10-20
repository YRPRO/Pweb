<?php 
	session_start();
	require('../modele/dataBase.php');
	require('../modele/accesBase.php');
	$_SESSION['amis'] = recupAmisUtilisateur($_SESSION['login']);
	$_SESSION['message'] = recupMessageUtilisateur($_SESSION['login']);
	
	//var_dump($_SESSION['amis']);
	//die();


	header('Location:../vue/pageMessage.php');
?>