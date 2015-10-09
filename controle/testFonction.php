<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 	
		require('fonction.php');
		require('../modele/dataBase.php');
		ajoutUnLike(1);
		$test  = recupNbUnLike(1);
		//var_dump($test);
		//die();
		echo $test ;
	?>

</body>
</html>
