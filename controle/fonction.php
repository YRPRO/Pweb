<?php 
	function verifLogin($login,$password){
		htmlspecialchars($login);
		htmlspecialchars($password);
		if( count($login) <= 15 and count($password) <=20 and count($password) <= 20)
			return true;
		else
			return false;
	}
	function Inscription ($login,$nom, $prenom,$sexe,$jour,$mois,$annee,$email,$pwd) {
		require ("../modele/dataBase.php");
		$dateN= $annee.'-'.$mois.'-'.$annee; // On stock dans ce format parceque c pour le type date de la base de donnée 
		$dateInscription = date("Y-d-m");
		$req = $db->prepare('INSERT INTO utilisateur(login, nom, prenom, sexe, dateN,email, password, dateInscription) VALUES(:login,:nom, :prenom, :sexe, :dateN, :email, :password, :dateInscrip)');
		$req->execute(array('login'=> $login, 'nom' => $nom,'prenom' => $prenom, 'sexe' => $sexe,'dateN' => $dateN,'email' => $email, 'password' => $pwd, 'dateInscrip' => $dateInscription));
		session_start();
		$_SESSION['login'] = $login;


}

	function recupCommentaireUtilisateur($login){
		global $db;
		$q = $db->prepare('SELECT c.commentaire , c.dateCreation , t.libelleTheme , r.typeRestriction , c.nbLike,c.nbunLike
							 FROM commentaire c,theme t , restriction r 
							 WHERE c.idTheme = t.idTheme 
						AND   c.idRestriction = r.idRestriction
						AND   c.login = ? 	
							');
		//$q = $db->prepare('SELECT * FROM commentaire WHERE login = ?');
		$q->execute([$login]);
		$dataCom = $q->fetchALL(PDO::FETCH_OBJ);
		$q->closeCursor();
		return $dataCom;
	}

	function recupCommentaire(){
		global $db;
		$q = $db->prepare('SELECT c.commentaire , c.dateCreation , t.libelleTheme , r.typeRestriction , c.nbLike,c.nbunLike,c.login
							 FROM commentaire c,theme t , restriction r 
							 WHERE c.idTheme = t.idTheme 
						AND   c.idRestriction = r.idRestriction
						AND   r.typeRestriction = ?	
							');
		//$q = $db->prepare('SELECT * FROM commentaire WHERE login = ?');
		$q->execute(['public']);
		$dataCom = $q->fetchALL(PDO::FETCH_OBJ);
		$q->closeCursor();
		return $dataCom;
	}
	
	// Différent de verifLogin la on veut juste voir si le login existe deja donc si oui on demande a l'utilisateur de 
	function verifPresent($login){
		require('../modele/dataBase.php');
		$q = $db->prepare('SELECT login FROM utilisateur where login = ? ');
		$q->execute([$login]);
		$dataLogin = $q->fetchALL(PDO::FETCH_OBJ);

		$q->closeCursor();	
		return $dataLogin;

	}


?>
