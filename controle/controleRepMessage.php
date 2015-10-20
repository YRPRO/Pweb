<?php 
session_start();
if(isset($_POST)){
	require('../modele/dataBase.php');
	require('../modele/accesBase.php');
	extract($_POST);
	htmlspecialchars($reponse);
	htmlspecialchars($destinateur);
	//ajout de la reponse dans la base
	ajoutMessagePrive($reponse,$_SESSION['login'],$destinateur);
	//redirection vers la page de message
	header('Location:controlePageMessage.php');
}
else
	echo "erreur transmision donnée";
	
?>