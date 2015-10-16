<?php
	require('../modele/dataBase.php');
	require('fonction.php');
	session_start();
	$_SESSION['login'] = '';
	$_SESSION['password'] = '';
	if(isset($_POST['login'])){
		//verification à ajouter dans le fichier fonctions.php
		extract($_POST);
		if(verifLogin($login,$password)){
			
			$req = $db->prepare("SELECT login	 
							 FROM utilisateur	 
							 WHERE (login= :login OR email = :login	)
							 AND password = :password ");
			$req->execute(	[
					'login' => $login	,
					'password' => $password
				]);		
			$uTrouver = $req->RowCount()	;
	
			if($uTrouver)	{
				//mise en place de la variable session
				$_SESSION['login'] = $login;
				$_SESSION['password'] = $password;
				//une fois l'utilisateur connecter on prepare sa page de profil
				//require('controlePageProfil.php');
				//require('../modele/dataBase.php');
				//require('../modele/accesBase.php');

				header('location:controlePageProfil.php');

			}
			else{	
				$_SESSION['error'] = "Echec de l'identification, login ou mot de passe non valide.";
				header('Location:../vue/accueil.php');

			}			
		}			
	
	}
	
?>