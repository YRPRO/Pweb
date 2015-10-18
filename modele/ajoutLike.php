<?php 
	require('dataBase.php');
	require('accesBase.php');
	if(isset($_GET)){
		$login = $_GET['login'];
		$idCommentaire = $_GET['idCommentaire'];
		ajoutLike($login,$idCommentaire);
		//redirection vers la page de profil
		header('Location:../controle/controlePageProfil.php');
	}
?>