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
	<?php include('../partie/menuser.php'); ?>

	<div class="container">
		<div class="row profile">
			<div class="col-md-3">
				<div class="profile-sidebar">
					<!-- SIDEBAR USERPIC -->
					<div class="profile-userpic">
						<img src= <?php echo $_SESSION['cheminPhoto']; ?> class="img-responsive" alt="photo de profil">
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
							<?php
							$infoUser =  $_SESSION['infoUtilisateur'];
							echo $infoUser[0]->email ; 
							?>
						</div>
					</div>
					<!-- END SIDEBAR USER TITLE -->
					<!-- SIDEBAR BUTTONS -->
					<div class="profile-userbuttons">
						<!-- <button type="button" class="btn btn-success btn-sm">Ajouter</button><br><br> -->

						<!-- Permettre à l'utilisateur de modifier sa photo de profil -->
						
						<button type="submit" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Modifier la photo de profil</button>
						<!-- alert si l 'extension du fichier n'est pas correcte (n'est pas une image) -->
						

					</div>
					<!-- END SIDEBAR BUTTONS -->
					<div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">

								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Choisissez votre image</h4>

								</div>
								<div class="modal-body">
									<!-- Insertion du formulaire d'ajout d'une image-->

									<form role="form" method="post" action ="../controle/recupImage.php" enctype="multipart/form-data">
										<div class="form-group">
											<label for="login" >Image</label>
											<input type="file" class="form-control" id="image" name="image" placeholder="Choisir une image">
										</div>
										<button type="submit" class="btn btn-success">Valider</button> 
									</form>
									<!-- Fin du form d'ajout d'une image -->
								</div>
							</div>
						</div>

					</div>
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
							<?php
								if(isset($_SESSION['error'])){
								echo '<div class="alert alert-danger">
								<center><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></center>
								<center><strong>Attention! : </strong></center><br>';
								echo '<center>'. '- '.$_SESSION['error'].'</center>'.'</br>';
								echo'</diV>';
								unset($_SESSION['error']);
								}
								
								?>
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
															<!-- traitaiment pour liker les commentaire que l'utilisateur peut liker ou unliker -->
															<?php 
																if(in_array($comAmis[$i]->idCommentaire,$_SESSION['listeComLikable'])){
																	$cheminAjoutLike = "../modele/ajoutLike.php?login=".$_SESSION['login']."&idCommentaire=".$comAmis[$i]->idCommentaire;
																	$cheminAjoutUnLike = "../modele/ajoutUnLike.php?login=".$_SESSION['login']."&idCommentaire=".$comAmis[$i]->idCommentaire;
																?>
																	<ul class="list-inline"><li><?php echo $comAmis[$i]->dateCreation; ?></li><li><a href=<?php echo $cheminAjoutLike; ?>>J'aime</a>  <span class="glyphicon glyphicon-thumbs-up"></span>
																		<span class="badge"><?php echo $comAmis[$i]->nbLike ;?></span> </li><li><a href=<?php echo $cheminAjoutUnLike; ?>>Je n'aime pas</a> <span class="glyphicon glyphicon-thumbs-down"></span>
																		<span class="badge"><?php echo $comAmis[$i]->nbUnLike ;?></span> </li>
																	</ul>
																<?php } 
																else{
																	?>
																	<ul class="list-inline"><li><?php echo $comAmis[$i]->dateCreation; ?></li><li>J'aime  <span class="glyphicon glyphicon-thumbs-up"></span>
																		<span class="badge"><?php echo $comAmis[$i]->nbLike ;?></span> </li><li>Je n'aime pas <span class="glyphicon glyphicon-thumbs-down"></span>
																		<span class="badge"><?php echo $comAmis[$i]->nbUnLike ;?></span> </li>
																	</ul>
																<?php }?>
															
														</div>
													</div>
													<?php  } ?>
												</div>
											</div>
											

											<div class="panel panel-default">
												<div class="panel-heading"><center>Les commentaires public </center></div>
												<div class="panel-body">

													<?php

													$comPublic = $_SESSION['comPublic'];
													for($i = 0;$i<count($comPublic);$i++){
														?>
														<div class="row">
															<div class="col-xs-12">
																<h3> <?php echo 'Ecrit par : '.$comPublic[$i]->login .'  - Thème : '.$comPublic[$i]->libelleTheme . "&nbsp&nbsp&nbsp&nbsp"."Restriction :" .  $comPublic[$i]->typeRestriction; ?></h3>
																<p><?php echo $comPublic[$i]->commentaire; ?></p>
																
																<!-- traitaiment pour liker les commentaire que l'utilisateur peut liker ou unliker dans les commentaire public-->
															<?php 
																if(in_array($comPublic[$i]->idCommentaire,$_SESSION['listeComLikable'])){
																	$cheminAjoutLike = "../modele/ajoutLike.php?login=".$_SESSION['login']."&idCommentaire=".$comPublic[$i]->idCommentaire;
																	$cheminAjoutUnLike = "../modele/ajoutUnLike.php?login=".$_SESSION['login']."&idCommentaire=".$comPublic[$i]->idCommentaire;
																?>
																	<ul class="list-inline"><li><?php echo $comPublic[$i]->dateCreation; ?></li><li><a href=<?php echo $cheminAjoutLike; ?>>J'aime</a>  <span class="glyphicon glyphicon-thumbs-up"></span>
																		<span class="badge"><?php echo $comPublic[$i]->nbLike ;?></span> </li><li><a href=<?php echo $cheminAjoutUnLike; ?>>Je n'aime pas</a> <span class="glyphicon glyphicon-thumbs-down"></span>
																		<span class="badge"><?php echo $comPublic[$i]->nbUnLike ;?></span> </li>
																	</ul>
																<?php } 
																else{
																	?>
																	<ul class="list-inline"><li><?php echo $comPublic[$i]->dateCreation; ?></li><li>J'aime  <span class="glyphicon glyphicon-thumbs-up"></span>
																		<span class="badge"><?php echo $comPublic[$i]->nbLike ;?></span> </li><li>Je n'aime pas <span class="glyphicon glyphicon-thumbs-down"></span>
																		<span class="badge"><?php echo $comPublic[$i]->nbUnLike ;?></span> </li>
																	</ul>
																<?php }?>

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



