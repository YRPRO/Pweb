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
								<form action="../controle/ajoutCommentaire.php" method="post">
									<div class="form-group">
										<label for="content" class="sr-only">Statut:</label>
										<style type="text/css">textarea{ resize:none;}</style>
										<textarea name="commentaire" id="commentaire" rows="3" class="form-control" placeholder="Quoi de neuf ?"></textarea>

									</div>

									<div class="form-group status-post-submit">
									<button type="submit" class="btn btn-success">Publier</button>
									<!--<input type="submit" name="publier" value="Publier" class="btn btn-default btn-xs">-->
									</div>

									<!-- Choix des info du commentaire -->
									<div class="form-group info-com">
										Thème : <select id="theme" name="theme">
										<?php 
										$libelleTheme = $_SESSION['libelleTheme'];
										//$listh = $db->query('SELECT t.libelleTheme FROM theme t');
										for($i = 0 ; $i < count($libelleTheme);$i++) {
											echo '<option value="'.$libelleTheme[$i]->libelleTheme.'">'.$libelleTheme[$i]->libelleTheme.'</option>';
										}
										?>
									</select><br>
									Niveau de restriction : <select id="restriction" name="restriction">
									<?php 
									$restriction = $_SESSION['restriction'];
									for ($i = 0 ; $i < count($restriction);$i++) {
										echo '<option value="'. $restriction[$i]->typeRestriction.'">'.$restriction[$i]->typeRestriction.'</option>';
									}
									?></select>
								</div> 
							</form><br>

							<!--Affichage des commentaires  -->
							<?php 
							$comUtilisateur = $_SESSION['comUtilisateur'];?>
							<div class="panel panel-default">
								<div class="panel-heading"><center>Mes commentaires</center></div>
								<div class="panel-body">
									

									<?php
									for($i = 0;$i<count($comUtilisateur);$i++){
										?>
										<div class="row">
											<div class="col-xs-12">
												<h3> <?php echo 'Ecrit par : '.$comUtilisateur[$i]->login.'  - Thème : '.$comUtilisateur[$i]->libelleTheme . "&nbsp&nbsp&nbsp&nbsp"."Restriction :" .  $comUtilisateur[$i]->typeRestriction; ?></h3>
												<p><?php echo $comUtilisateur[$i]->commentaire; ?></p>
												<ul class="list-inline"><li><?php echo $comUtilisateur[$i]->dateCreation; ?></li><li>J'aime  <span class="glyphicon glyphicon-thumbs-up"></span>
													<span class="badge"><?php echo $comUtilisateur[$i]->nbLike ;?></span> </li><li>Je n'aime pas <span class="glyphicon glyphicon-thumbs-down"></span>
													<span class="badge"><?php echo $comUtilisateur[$i]->nbUnLike ;?></span> </li></ul>
												</div>
											</div>
											<?php  } ?>
										</div>
									</div>
									<?php 
										$comAmis = $_SESSION['comAmis'];

									 ?>
									<div class="panel panel-default">
										<div class="panel-heading"><center>Commentaires de mes amis</center></div>
										<div class="panel-body">
											
											<?php
											for($i = 0;$i<count($comAmis);$i++){
												?>
												<div class="row">
													<div class="col-xs-12">
														<h3> <?php echo 'Ecrit par : '.$comAmis[$i]->login.'  - Thème : '.$comAmis[$i]->libelleTheme . "&nbsp&nbsp&nbsp&nbsp"."Restriction :" .  $comAmis[$i]->typeRestriction; ?></h3>
														<p><?php echo $comAmis[$i]->commentaire; ?></p>
														<ul class="list-inline"><li><?php echo $comAmis[$i]->dateCreation; ?></li><li>J'aime  <span class="glyphicon glyphicon-thumbs-up"></span>
															<span class="badge"><?php echo $comAmis[$i]->nbLike ;?></span> </li><li>Je n'aime pas <span class="glyphicon glyphicon-thumbs-down"></span>
															<span class="badge"><?php echo $comAmis[$i]->nbUnLike ;?></span> </li></ul>
														</div>
													</div>
													<?php  } ?>
												</div>
											</div>
											<?php 
												$comPublic = $_SESSION['comPublic'];
											?>

											<div class="panel panel-default">
										<div class="panel-heading"><center>Les commentaires public </center></div>
										<div class="panel-body">
											
											<?php
											for($i = 0;$i<count($comPublic);$i++){
												?>
												<div class="row">
													<div class="col-xs-12">
														<h3> <?php echo 'Ecrit par : '.$comPublic[$i]->login .'  - Thème : '.$comPublic[$i]->libelleTheme . "&nbsp&nbsp&nbsp&nbsp"."Restriction :" .  $comPublic[$i]->typeRestriction; ?></h3>
														<p><?php echo $comPublic[$i]->commentaire; ?></p>
														<ul class="list-inline"><li><?php echo $comPublic[$i]->dateCreation; ?></li><li>J'aime  <span class="glyphicon glyphicon-thumbs-up"></span>
															<span class="badge"><?php echo $comPublic[$i]->nbLike ;?></span> </li><li>Je n'aime pas <span class="glyphicon glyphicon-thumbs-down"></span>
															<span class="badge"><?php echo $comPublic[$i]->nbUnLike ;?></span> </li></ul>
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

					</div>	
					<?php
					include('../partie/footer.php');
					?>


				</body>

				</html>



