
<?php
require('../modele/dataBase.php');
require('../modele/accesBase.php');
require('fonction.php');

if(isset($_POST['valide'])){

	if(isset($_POST['login'])&& isset($_POST['nom']) && isset($_POST['prenom'])&& isset($_POST['jour'])&& isset($_POST['mois'])&& isset($_POST['annee'])
		&& isset($_POST['email'])&& isset($_POST['pwd'])&& isset($_POST['pwd_confirm'])) 
	{
		$errors=[];
		//echapement html sur la variable $_POST
		//htmlspecialchars($_POST);
		extract($_POST);
		

		if(mb_strlen($login) > 15 ){
			$errors[]="Votre login est trop long (Maximum 15 caractères)";
		}
		if(mb_strlen($login)<3){
			$errors[]="Votre login est trop court (Minimum 3 caractères)";
		}	
		if (verifPresent($login)){
			$errors[]="Le login existe deja";
		}

if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
	$errors[]="Votre adresse email n'est pas valide";
}
if(mb_strlen($pwd)<6){
	$errors[]="Votre mot de passe est trop court (Minmum 6 caractères)";
}else {
	if($pwd != $pwd_confirm){
		$errors[]="Les deux mot de passe ne sont pas identiques";
	}

}	

if (count($errors)==0) {

	Inscription($login,$nom,$prenom,$sexe,$jour,$mois,$annee,$email,$pwd);
	//debut de la session utilisateur directement après inscription
	session_start();
	$_SESSION['login'] = $login;
	header('location:../controle/controlePageProfil.php');

}

}else {
	$errors[] = "Veuillez remplir tout les champs pour vous inscrire";
}


}
require('../vue/inscription.php');

?>