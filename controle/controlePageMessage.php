<?php 
	require('../modele/dataBase.php');
	require('../modele/accesBase.php');

	$_SESSION['message'] = recupMessageUtilisateur($_SESSION['login']);
	
?>