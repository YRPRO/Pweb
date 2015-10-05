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
			$_SESSION['login'] = $login;
			$_SESSION['password'] = $password;
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
				$SESSION['login'] = $login;
				$SESSION['password'] = $password;
				echo "identification reussi . $login";
			}
			else{	
				//save_input_data()	;
				//header('location:../index.php');
				echo 'identification non reussi';
			}			
		}			
	
	}
	
?>