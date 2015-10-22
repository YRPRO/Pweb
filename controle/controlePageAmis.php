<?php 
	session_start();
	require('../modele/dataBase.php');
	require('../modele/accesBase.php');
	$_SESSION['demande'] =  recupDemandeUtilisateur($_SESSION['login']);
	$listeUtilisateur = recupListeUtilisateur($_SESSION['login']);
	$listeAmis = recupAmisUtilisateur($_SESSION['login']);
	$_SESSION['listeAmis'] = $listeAmis;

	$_SESSION['listeUtilisateur'] = array();
	$amis =array();
	for($j = 0;$j<count($listeAmis);$j++)
		array_push($amis,$listeAmis[$j]->amis);



	for($i=0;$i<count($listeUtilisateur);$i++){
		if(count($listeAmis)>0){
			//var_dump($listeAmis);
			//die();
			
			if(in_array($listeUtilisateur[$i]->login, $amis)){	

			}
			else{
				array_push($_SESSION['listeUtilisateur'],$listeUtilisateur[$i]);
			}
		
		}
		else
			$_SESSION['listeUtilisateur']=$listeUtilisateur;
	
	}
	

	header('Location:../vue/pageAmis.php');
?>