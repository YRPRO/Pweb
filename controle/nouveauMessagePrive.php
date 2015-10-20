<?php 
session_start();
	require('../modele/dataBase.php');
	require('../modele/accesBase.php');
	if(isset($_POST)){
		
		extract($_POST);
		htmlspecialchars($message);
		htmlspecialchars($amis);
		ajoutMessagePrive($message,$_SESSION['login'],$amis);
		//redirection
		header('Location:controlePageMessage.php');
	}
	else{
		echo "donnée non transmise";
	}

?>