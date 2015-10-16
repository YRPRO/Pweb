<?php 
	session_start();
	require('../modele/dataBase.php');
	require('../modele/accesBase.php');
	if(isset($_GET['theme'])){
		//echo 'traitement pour un theme specifier';
		//traitement pour un theme specifié
		$_SESSION['commentairePublic'] = recupCommentairePublicTheme($_GET['theme']);
		header('Location:../vue/filVisiteur.php?theme='.$_GET['theme']);
	}
	else{
		$_SESSION['libelleTheme'] = recupLibelleTheme();
		$_SESSION['commentairePublic'] = recupCommentairePublic();
		header('Location:../vue/filVisiteur.php?theme=');
	}


?>