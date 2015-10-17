<?php 
	session_start();
?>
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

	<!-- CSS pour la partie info général du profil -->
	<link rel="stylesheet" href="css/profilcss.css"/>
</head>

<body>
	<?php
		$dataCommmentaire = $_SESSION['comUtilisateur'];
	?>
	<?php include('../partie/menu.php'); ?>

	<div class="container">
		<div class="row profile">
			<div class="col-md-3">
				<div class="profile-sidebar">
					<!-- SIDEBAR USERPIC -->
					<div class="profile-userpic">
						<img src="../avatarDefaut.png" class="img-responsive" alt="">
						<!-- <img src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">-->
					</div>
					<!-- END SIDEBAR USERPIC -->
					<!-- SIDEBAR USER TITLE -->
					<div class="profile-usertitle">
						<div class="profile-usertitle-name">
							<?php echo $_SESSION['login']?>
						</div>
						<!-- Afficher l'adresse mail de l'utilisateur connecté -->
						<div class="profile-usertitle-job">
							Adresse mail
						</div>
					</div>
					<!-- END SIDEBAR USER TITLE -->
					<!-- SIDEBAR BUTTONS -->
					<div class="profile-userbuttons">
						<!-- <button type="button" class="btn btn-success btn-sm">Ajouter</button><br><br> -->

						<!-- Permettre à l'utilisateur de modifier sa photo de profil -->
						<button type="button" class="btn btn-success btn-sm">Modifier la photo de profil</button>

					</div>
					<!-- END SIDEBAR BUTTONS -->
					<!-- SIDEBAR MENU -->
					<div class="profile-usermenu">
						<ul class="nav">
							<li class="active">
								<a href="#commentaires">
									<i class="glyphicon glyphicon-home"></i>
									Commentaires</a>
								</li>
								<li>

									<!-- Une ancre sur la même page ou y aura afficher ses amis -->
									<a href="#amis">
										<i class="glyphicon glyphicon-user"></i>
										Mes amis</a><br>
									</li>

								</ul>
							</div>
							<!-- END MENU -->

							<!-- Afficher les informations concernant un utilisateur -->
							<ul class="list-group">
								<li class="list-group-item text-muted">Statistiques<i class="fa fa-dashboard fa-1x"></i></li>
								<li class="list-group-item text-right"><span class="pull-left"><strong>Commentaires</strong></span> <?php echo $_SESSION['nbCom'];?></li>
								<li class="list-group-item text-right"><span class="pull-left"><strong>Nombre de likes</strong></span> <?php echo $_SESSION['nbLike'];?></li>
								<li class="list-group-item text-right"><span class="pull-left"><strong>Nombre d'amis</strong></span> <?php echo $_SESSION['nbAmis'];?></li>
							</ul> 
						</div>
					</div>

					<div class="col-md-6">
						<div class="status-post">

							<div class="profile-content">

								<!-- Formulaire d'ajout d'un commentaire -->
								<form action="commentaires.php" method="post">
									<div class="form-group">
										<label for="content" class="sr-only">Statut:</label>
										<textarea name="content" id="content" rows="3" class="form-control" placeholder="Quoi de neuf ?"></textarea>

									</div>

									<div class="form-group status-post-submit">
										<input type="submit" name="publier" value="Publier" class="btn btn-default btn-xs">
									</div>

									<!-- Choix des info du commentaire -->
									<div class="form-group info-com">
										Thème : <select id="liste_theme">
										<?php 
										$libelleTheme = $_SESSION['libelleTheme'];
										//$listh = $db->query('SELECT t.libelleTheme FROM theme t');
										for($i = 0 ; $i < count($libelleTheme);$i++) {
											echo '<option value="'.$libelleTheme[$i]->libelleTheme.'">'.$libelleTheme[$i]->libelleTheme.'</option>';
										}
											?>
										</select><br>
										Niveau de restriction : <select id="liste_restriction">
										<?php 
										//$listR = $db->query('SELECT r.typeRestriction FROM restriction r');
										$restriction = $_SESSION['restriction'];
										for ($i = 0 ; $i < count($restriction);$i++) {
											echo '<option value="'. $restriction[$i]->typeRestriction.'">'.$restriction[$i]->typeRestriction.'</option>';
										}
											?></select>
										</div> 
									</form><br>

									<!--Affichage des commentaires de l'utilisateur -->
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
						</div>	

					</div>
				</div>

			</div>	
			<?php
			include('../partie/footer.php');
			?>


		</body>

		</html>



