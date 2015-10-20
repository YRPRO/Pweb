<?php 
if(isset($_POST)){
	session_start();
	require('../modele/dataBase.php');
	require('../modele/accesBase.php');
	extract($_POST);
	htmlspecialchars($utilisateur);
	nouvelleDemande($_SESSION['login'],$utilisateur);
	header('Location:controlePageAmis.php');
}
else{
	echo "probleme tranmission de données";
}

?>