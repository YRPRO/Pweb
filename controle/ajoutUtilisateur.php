
<?php
require('fonction.php');

if(isset($_POST['valide'])){

	if(isset($_POST['login'])&& isset($_POST['nom']) && isset($_POST['prenom'])&& isset($_POST['jour'])&& isset($_POST['mois'])&& isset($_POST['annee'])
		&& isset($_POST['email'])&& isset($_POST['pwd'])&& isset($_POST['pwd_confirm'])) 
	{
$errors=[];
	extract($_POST); 
					
	if(mb_strlen($login) > 15 ){
$errors[]="Votre login est trop long (Maximum 15 caractères";
}
if(mb_strlen($login)<3){
$errors[]="Votre login est trop court (Minimum 3 caractères";
}	

/*-----------A activer a la fin du projet sinon c la merdasse pour les test
if (filter_var($email,FILTER_VALIDATE_EMAIL)){
	$errors="Votre adresse email n'est pas valide";
}*/
		if(mb_strlen($pwd)<6){
$errors[]="Votre mot de passe est trop court (Minmum 3 caractères)";
}else {
	if($pwd != $pwd_confirm){
		$errors[]="Les deux mot de passe ne sont pas identiques";
	}
	}	

		if (count($errors)==0) {
                    	session_start();
		              $_SESSION['nom'] = $nom;
		              $_SESSION['prenom'] = $prenom;
                      
                    Inscription($login,$nom,$prenom,$sexe,$jour,$mois,$annee,$email,$pwd);

				}
	
}else {
	$errors[] = "Veuillez remplir tout les champs pour vous inscrire";
}
			
	
				}
				require('../vue/inscription.php');
				
?>