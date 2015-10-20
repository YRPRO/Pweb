<?php 
	require('../modele/dataBase.php');
	require('../modele/accesBase.php');
	if(isset($_GET)){
		extract($_GET);
		htmlspecialchars($id);
		supprimerMessage($id);
		//redirection 
		//echo $id;
		header('Location:controlePageMessage.php');
	}
	else
		echo 'probleme transmission données';

?>