<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Reseau social ">
    <!-- <link rel="icon" href="../../favicon.ico">-->
    <title>Page de profil</title>
    <!--- Permet d'utiliser certaine balise de html 5 meme si on a une ancienne version du navigateur -->
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

      <link href="css/bootstrap.min.css" rel="stylesheet">
<!--Notre style css -->
  <link rel="stylesheet" href="css/style_principal.css"/>

  </head>
<body>
	<?php
		require('../modele/dataBase.php');
		require('../controle/fonction.php');
		session_start();
		//verification -> page de profil correct
		$dataCommmentaire = recupCommentaireUtilisateur($_GET['login']);
			/*var_dump($dataCommmentaire);
			die();*/
		}
	 ?>
	<?php include('../partie/menu.php'); ?>
	
  	<div class="col-md-6">
  		<div class="panel-heading">
			<div class="panel panel-default">
	    		<center><h3 class="panel-title">Profil de <?php echo $_SESSION['login']; ?></h3></center>
	  		</div>
	  		<div class="panel-body">
	  			
	  		</div>
		</div>
  	</div>	

  		
  	<!--ZONE DE COMMENAIRES -->
  	<div class="col-md-6">
  		<div class="panel-heading">
			<div class="panel panel-default">
	    		<center><h3 class="panel-title">Commentaires Zone</h3></center>
	  		</div>
	  		<div class="panel-body">
				<!--Zone de redaction de commentaire -->
				 <div class="form-group">
				 	<div class="panel panel-default">
	    			<center><h3 class="panel-title">Nouveau commentaire</h3></center>
	  					<div class="form-group ">
	 						<input class="form-control input-lg" id="inputlg" type="text">
						</div>
						<div class="btn-group">
  							<button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    Large button <span class="caret"></span>
							 </button>
							  <ul class="dropdown-menu">
							    <li>test</li>
							    <li>test2</li>
							    <li>test2</li>
							  </ul>
						</div>
					</div>
				</div>
				<!--Boucle d'affichage des commentaire -->	
				<?php 
					for($i = 0;$i<count($dataCommmentaire);$i++){
						?>
						<div class="panel panel-default">
	  						<div class="panel-heading">
	    						<center><h3 class="panel-title"> <?php echo $dataCommmentaire[$i]->dateCreation ."&nbsp;&nbsp;&nbsp;&nbsp". $dataCommmentaire[$i]->libelleTheme."&nbsp;&nbsp;&nbsp;&nbsp" . $dataCommmentaire[$i]->typeRestriction; ?></h3></center>
	  						</div>
	  						<div class="panel-body">
	    						<center><p><?php echo $dataCommmentaire[$i]->commentaire; ?></p></center>
	  						</div>
						</div>
				<?php  } ?>
	  				

	  		</div>
		</div>
  	</div>
</body>
</html>


