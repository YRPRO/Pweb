<?php 
	session_start();
	require('../modele/dataBase.php');
	require('../modele/accesBase.php');
	if(isset($_FILES['image'])){
		if(verifExtensionImage($_FILES['image']['name'])){

			//renomage de l'image
			$extension = strtolower(  substr(strrchr($_FILES['image']['name'], '.')  ,1)  );
			$nouveauNom =  $_SESSION['login'] . '.' . $extension;
			$_FILES['image']['name'] = $nouveauNom;
			//enregistrement du fichier sur le serveur
			$dossierFichier = "../imageProfil/";
			//echo $dossierFichier;
			//accord des droit d'ecriture fichier 
			chmod ($dossierFichier , 777 );
			$test = move_uploaded_file ( $_FILES['image']['tmp_name'],$dossierFichier . $_FILES['image']['name']);
			if($test){
				//echo 'upload reussi';
				$chemin = $dossierFichier . $_FILES['image']['name'];
				ajoutCheminPhoto($_SESSION['login'],$chemin);
				header('Location:controlePageProfil.php');
			}
			else
				echo 'probleme upload fichier';

		}
		else{
			$_SESSION['error'] = "Le fichier n'est pas une image";
			header('Location:../vue/profil.php');
		}
	}
	else
		echo 'echoué';

	//fonction de verification de l'extension
	function verifExtensionImage($nomImage){
	$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
	$extension_upload = strtolower(  substr(strrchr($nomImage, '.')  ,1)  );
	if ( in_array($extension_upload,$extensions_valides) )
		return true;
	else
		return false;
	}


?>