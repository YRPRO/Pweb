<?php 
	function verifLogin($login,$password){
		htmlspecialchars($login);
		htmlspecialchars($password);
		if( count($login) <= 15 and count($password) <=20 and count($password) <= 20)
			return true;
		else
			return false;
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
		
?>