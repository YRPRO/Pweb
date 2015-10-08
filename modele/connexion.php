<?php 
//pwd c'est le password
	function connexion($login,$pwd){
		if (empty($_POST['login']) || empty($_POST['pwd']) ){
			echo "Champs non renseignés";
		}
		else{
			 $query=$db->prepare('SELECT nom , password
        	FROM utilisateur WHERE nom = :login');
        	$query->bindValue(':login',$_POST['login'], PDO::PARAM_STR);
        	$query->execute();
        	$data=$query->fetch();
        	//verification du mot de passe
        	if($data['pwd'] == $password){
        		$_SESSION['login'] = $login;
        		$_SESSION['pwd'] = $pwd;
        		echo "<h1> bienvenue $identifiant </h1>";
        	}
        	else{
        		//en cas de mauvais mot de passe
        		echo "<h1> mot de passe faux </h1>";
        	}
        	$query->CloseCursor();
		}
	}
	function verifLogin($login,$pwd){
	}
?>