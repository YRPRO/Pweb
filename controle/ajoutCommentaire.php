<?php	
	session_start();
	require('../modele/dataBase.php'); 
	require('../modele/accesBase.php');
	//echapement html
	extract($_POST);
	htmlspecialchars($commentaire);
	htmlspecialchars($theme);
	htmlspecialchars($restriction);
	//ajout du commentaire dans la base de données
	ajoutCommentaire($_SESSION['login'],$commentaire,$theme,$restriction);
	header("Location:./controlePageProfil.php");

?>