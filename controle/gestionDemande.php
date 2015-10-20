<?php 
	if(isset($_GET)){
		session_start();
	require('../modele/dataBase.php');
	require('../modele/accesBase.php');
		extract($_GET);
		if($Reponse == a){
			accepterDemandeAmis($id);
			supprimerDemandeAmis($id);
		}
		else{
			supprimerDemandeAmis($id);
		}

		header('Location:controlePageAmis.php');
	}
	else{
		echo "probleme transmission de données";
	}
?>