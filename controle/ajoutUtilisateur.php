


<?php


if(isset($_POST['valide'])){

	if(isset($_POST['login'])&& isset($_POST['nom']) && isset($_POST['prenom'])&& isset($_POST['jour'])&& isset($_POST['mois'])&& isset($_POST['annee'])
		&& isset($_POST['email'])&& isset($_POST['pwd'])&& isset($_POST['pwd_confirm'])) 
	{

					extract($_POST); // Pour eviter de reecrire a chaque fois les affectation 
					if($pwd != $pwd_confirm){
                     /* {Redirection de l'user vers la page d'accueil .*/
					echo 'Votre mot de passe n\'est pas valide,vous aller etre rediriger dans un instant.';
		            header("Refresh: 1;URL=accueil.html");	
				} else {
                      session_start();
		              $_SESSION['nom'] = $nom;
		              $_SESSION['prenom'] = $prenom;

                    Inscription($login,$nom,$prenom,$sexe,$jour,$mois,$annee,$email,$pwd);
				}
					}
	}
		function Inscription ($login,$nom, $prenom,$sexe,$jour,$mois,$annee,$email,$pwd) {
		require ("../modele/dataBase.php");
		$dateN= $annee.'-'.$mois.'-'.$annee; // On stock dans ce format parceque c pour le type date de la base de donnée 
		$dateInscription = date("Y-d-m");
		$req = $db->prepare('INSERT INTO utilisateur(login, nom, prenom,email, password, dateInscription,dateN, sexe) VALUES(:login,:nom, :prenom, :email, :password,:dateInscription , :dateN, :sexe)');
$req->execute(array('login'=> $login,
					 'nom' => $nom,
					 'prenom' => $prenom,
					 'email' => $email,
					 'password' => $pwd,
					 'dateInscription' => $dateInscription,
					 'dateN' => $dateN,
					 'sexe' => $sexe,
					 ));
echo 'reussi';
}
?>