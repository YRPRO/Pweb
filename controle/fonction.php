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

	function recupCommentairePublic(){
		global $db;
		$q = $db->prepare('SELECT c.commentaire as commentaire , c.dateCreation as dateC  , t.libelleTheme as libelleTheme
		 , r.typeRestriction as restriction, c.nbLike as nbLike,c.nbunLike as nbUnLike,c.login as login
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
		global $db;
		$q = $db->prepare('SELECT login FROM utilisateur where login = ? ');
		$q->execute([$login]);
		$dataLogin = $q->fetchALL(PDO::FETCH_BOTH);

		$q->closeCursor();	
		return $dataLogin;

	}
	//fonction de recuperation du meilleur commentaire (le plus liker)
	function recupMeilleurCom(){
		global $db;
		$q = $db->prepare('SELECT MAX(c.nbLike) ,c.commentaire , c.dateCreation , t.libelleTheme , r.typeRestriction , c.nbLike,c.nbunLike,c.login
							 FROM commentaire c,theme t , restriction r 
							 WHERE c.idTheme = t.idTheme 
							AND   c.idRestriction = r.idRestriction
							');
		$q->execute();
		$dataMeilleurcom = $q->fetchALL(PDO::FETCH_OBJ);

		$q->closeCursor();	
		return $dataMeilleurcom;
	}
	//fonction de recuperation du nombre d'utilisateur (de comptes)
	function recupNbUtilsateur(){
		global $db;
		$q = $db->prepare('SELECT COUNT(login)
							 FROM utilisateur
							');
		$q->execute();
		$tmp = $q->fetch();
		$dataNbUtilisateur = $tmp[0];
		$q->closeCursor();	
		return $dataNbUtilisateur;
	}

function recupLibelleTheme(){
		global $db;
		$q = $db->prepare('SELECT libelleTheme
							 FROM theme
							');
		$q->execute();
		$data = $q->fetchALL(PDO::FETCH_OBJ);
		//$dataNbUtilisateur = $tmp[0];
		$q->closeCursor();	
		return $data;
	}
	//fonction de recuperation du nombre de commentaires
	function recupNbcommentaire(){
		global $db;
		$q = $db->prepare('SELECT COUNT(idCommentaire)
							 FROM commentaire
							');
		$q->execute();
		$tmp = $q->fetch();
		$dataNbCom = $tmp[0];
		$q->closeCursor();	
		return $dataNbCom;
	}
	//fonction de recuperation du theme le plus utiliser
	function recupMeilleurTheme(){
		global $db;
		$q = $db->prepare('SELECT COUNT(c.idTheme),t.libelleTheme
							 FROM commentaire c,theme t
							 WHERE c.idTheme = t.idTheme
							 GROUP BY c.idTheme
							');
		$q->execute();
		$dataMeilleurTheme = $q->fetchAll(PDO::FETCH_OBJ);
		$q->closeCursor();	
		return $dataMeilleurTheme[0]->libelleTheme;
	}
	//fonction de recuperation de l'utilisateur le plus actif(qui à poster le plus de commentaires)
	function recupUtilisateurPlusActif(){
		global $db;
		$q = $db->prepare('SELECT COUNT(c.login), u.login
							 FROM commentaire c,utilisateur u
							 WHERE c.login = u.login
							 GROUP BY c.login
							');
		$q->execute();
		$dataUtilisateurPlusActif = $q->fetchAll(PDO::FETCH_OBJ);

		$q->closeCursor();	
		return $dataUtilisateurPlusActif[0]->login;
	}
	//fonction de recuperation de la restiction d'un commentaire
	function recupRestrictionCom($idCommentaire){
		global $db;
		$q = $db->prepare('SELECT r.typeRestriction
							 FROM commentaire c, restriction r
							 WHERE c.idRestriction = r.idRestriction 
							 AND c.idCommentaire = ? 
							  ');
		$q->execute([$idCommentaire]);
		$dataResCom = $q->fetchALL(PDO::FETCH_OBJ);

		$q->closeCursor();	
		return $dataResCom[0]->typeRestriction;
	}
	//fonction de recuperation des amis d'un utilisateur
	function recupAmisUtilisateur($login){
		global $db;
		$q = $db->prepare('SELECT c.amis
							 FROM contact c
							 WHERE c.utilisateur = ? 
							  ');
		$q->execute([$login]);
		$dataAmis = $q->fetchALL(PDO::FETCH_OBJ);

		$q->closeCursor();	
		return $dataAmis;
	}
	//fonction recuperation nb de like pour un com
	function recupNbLike($idCommentaire){
		global $db;
		$q = $db->prepare('SELECT c.nbLike
							 FROM commentaire c
							 WHERE c.idCommentaire = ?
							  ');
		$q->execute([$idCommentaire]);
		$tmp = $q->fetch();
		$dataNbLike = $tmp[0];
		$q->closeCursor();	
		return $dataNbLike;
	}
	//fonction recuperation nb de unlike pour un com
	function recupNbUnLike($idCommentaire){
		global $db;
		$q = $db->prepare('SELECT c.nbUnLike
							 FROM commentaire c
							 WHERE c.idCommentaire = ?
							  ');
		$q->execute([$idCommentaire]);
		$tmp = $q->fetch();
		$dataNbUnLike = $tmp[0];
		$q->closeCursor();	
		return $dataNbUnLike;
	}
	//fonction recuperation nb de theme
	function recupNbTheme(){
		global $db;
		$requete = 'SELECT COUNT(t.idTheme)
					 FROM theme t';
		$data = $db->query($requete);
		$tmp = $data->fetch();
		$dataNbTheme = $tmp[0];
		return $dataNbTheme;
	}
	//fonction ajout d'un like pour un commentaire
	function ajoutLike($login,$idCommentaire){
		global $db;
		$q = $db->prepare('UPDATE commentaire c
        					SET nbLike=nbLike+1
        					WHERE  c.idCommentaire = ? '
        					);
		$q->execute([$idCommentaire]);
		//ajout d'un enregistrement dans la table likeparutilisateur(pour les future restriction)
		ajoutBlocageLike($login,$idCommentaire);


		$q->closeCursor();	
	}
	//fonction ajout d'un unlike pour un commentaire
	function ajoutUnLike($login,$idCommentaire){
		global $db;
		$q = $db->prepare('UPDATE commentaire c
        					SET nbUnLike=nbUnLike+1
        					WHERE  c.idCommentaire = ? '
        					);
		$q->execute([$idCommentaire]);
		//ajout d'un enregistrement dans la table likeparutilisateur(pour les future restriction)
		ajoutBlocageLike($login,$idCommentaire);

		$q->closeCursor();	
	}
	//recuperation des info d'un utilisateur
	function recupInfoUtilisateur($login){
		global $db;
		$q = $db->prepare('SELECT *
							 FROM utilisateur u 
							 WHERE u.login = ?
							');
		$q->execute([$login]);
		$dataUtilisateur = $q->fetchALL(PDO::FETCH_OBJ);

		$q->closeCursor();	
		return $dataUtilisateur;
	}
	//recuperation des commentaire des amis d'un utilisateur
	function recupComAmis($login){
		global $db;
		$q = $db->prepare('SELECT *
							 FROM  commentaire c
							 WHERE c.login IN (SELECT a.amis
							 					FROM contact a
							 					WHERE a.utilisateur = ?)
							');
		$q->execute([$login]);
		$dataComAmis = $q->fetchALL(PDO::FETCH_OBJ);

		$q->closeCursor();	
		return $dataComAmis;
	}
	//fonction permettant l'ajout d'un enregistrement dans la table like par utilisteur
	//pour qu'un utilisateur ne puisse pas liker plusieurs fois le meme commentaire
	function ajoutBlocageLike($login,$idCommentaire){
		global $db;
		$q = $db->prepare("INSERT INTO likeparutilisateur (idCommentaire,login) 
							VALUES (?,?)
        					");
		$q->execute([$idCommentaire,$login]);
		//$q->closeCursor();
	}
	//fonction de verification pour savoir si un utilisateur à déjà liker ou unliker un commentaire
	function aDejaLiker($login,$idCommentaire){
		global $db;
		$req = $db->prepare("SELECT l.idLikeParUtilisateur 	 
							 FROM likeparutilisateur l	 
							 WHERE l.login = ? AND l.idCommentaire = ?
							 ");
			$req->execute([$login,$idCommentaire]);		
			$reponse = $req->RowCount()	;
			//reponse en fonction du resultat de la requete au dessus
			if($reponse > 0)
				return true;
			else
				return false;
	}
	//fonction de modification d'un commentaire
	function modifCommentaire($idCommentaire,$nouvCom){
		global $db;
		//echappement html
		htmlspecialchars($nouvCom);
		//modification du commentaire dans la base 
		$q = $db->prepare('UPDATE commentaire c
        					SET c.commentaire = ?
        					WHERE c.idCommentaire = ? '
        					);
		$q->execute([$nouvCom,$idCommentaire]);
		$q->closeCursor();
	}
	//fonction de recuperation d'un id d'un theme par son libelle
	function getThemeId($libelle){
		htmlspecialchars($libelle);
		global $db;
		$q = $db->prepare("SELECT  t.idTheme 
							 FROM theme t
							 WHERE t.libelleTheme = ?
							 ");
		$q->execute([$libelle]);
		$data = $q->fetch();
		$id = $data[0];
		$q->closeCursor();	
		return $id;
	}
	//fonction de recuperation d'un id d'une restriction par son libelle
	function getRestrictionId($libelle){
		htmlspecialchars($libelle);
		global $db;
		$q = $db->prepare("SELECT  r.idRestriction 
							 FROM restriction r
							 WHERE r.typeRestriction = ?
							 ");
		$q->execute([$libelle]);
		$data = $q->fetch();
		$id = $data[0];
		$q->closeCursor();	
		return $id;
	}
	//fonction d'ajout de commentaire
	function ajoutCommentaire($login,$commentaire,$theme,$restriction){
		//ajouter date du jour avec  CURDATE()
		//echappement html
		htmlspecialchars($commentaire);
		htmlspecialchars($theme);
		htmlspecialchars($restriction);
		$idTheme = getThemeId($theme);
		$idRestriction = getRestrictionId($restriction);
		//insertion dans la base
		global $db;
		$q = $db->prepare("INSERT INTO commentaire (commentaire,dateCreation,idTheme,idRestriction,login,nbLike,nbUnlike) 
							VALUES (?,CURDATE(),?,?,?,0,0)
        					");
		$q->execute([$commentaire,$idTheme,$idRestriction,$login]);

	}
	//fonction de modification de la restriction d'un commentaire
	function modifRestrictionCommentaire($idCommentaire,$restriction){
		global $db;
		//echappement html
		htmlspecialchars($restriction);
		//recuperation de l'id de la restriction
		$id = getRestrictionId($restriction);
		//modification du commentaire dans la base 
		$q = $db->prepare('UPDATE commentaire c
        					SET c.idRestriction = ?
        					WHERE c.idCommentaire = ? '
        					);
		$q->execute([$id,$idCommentaire]);
		$q->closeCursor();
	}

?>
