<?php 
	function verifLogin($login,$password){
		htmlspecialchars($login);
		htmlspecialchars($password);
		if( count($login) <= 15 and count($password) <=20 and count($password) <= 20)
			return true;
		else
			return false;
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

?>
