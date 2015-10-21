<?php 
	session_start();
	require('../modele/dataBase.php');
	require('../modele/accesBase.php');
	$_SESSION['demande'] =  recupDemandeUtilisateur($_SESSION['login']);
	$listeUtilisateur = recupListeUtilisateur($_SESSION['login']);
	$listeAmis = recupAmisUtilisateur($_SESSION['login']);
	$_SESSION['listeAmis'] = $listeAmis;

	$_SESSION['listeUtilisateur'] = array();
	for($i=0;$i<count($listeUtilisateur);$i++){
	if(count($listeAmis)>0){
		if($listeUtilisateur[$i]->login == $listeAmis[$i]->amis){

		}
	}
	else{
		array_push($_SESSION['listeUtilisateur'],$listeUtilisateur[$i]);
	}
	}
	

	header('Location:../vue/pageAmis.php');
?>