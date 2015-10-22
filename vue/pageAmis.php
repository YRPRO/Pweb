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
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-select.js"></script>
	<script src="/path/to/jquery.mCustomScrollbar.concat.min.js"></script>

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
							//echo $infoUser[0]->email ; 
							?>
						</div>
					</div>
					<!-- END SIDEBAR USER TITLE -->
					<!-- SIDEBAR BUTTONS -->
					<div class="profile-userbuttons">
						<!-- <button type="button" class="btn btn-success btn-sm">Ajouter</button><br><br> -->

						
						

					</div>
					<!-- END SIDEBAR BUTTONS -->
					
					<!-- SIDEBAR MENU -->
					<div class="profile-usermenu">
						<ul class="nav">
							<li class="active">
								<a href="../controle/controlePageProfil.php">
									<i class="glyphicon glyphicon-home"></i>
									Commentaires</a>
								</li>
								
								<li>
									<!-- Une ancre sur la même page ou y aura afficher ses amis -->
									<a href="../controle/controlePageAmis.php">
										<i class="glyphicon glyphicon-user"></i>
										Mes amis</a><br>
									</li>


									<li>
										<!-- Une ancre sur la même page ou y aura afficher ses amis -->
										<a href="../controle/controlePageMessage.php">
											<i class="glyphicon glyphicon-user"></i>
											Mes messages privé</a><br>
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
							<div class="col-md-6">

								<div class="profile-content">
									<div class="col-md-7">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h3 class="panel-title">Envoyer une demande d'ajout</h3>
											</div>
											<div class="panel-body">
												<form role="form" method="post" action ="../controle/demandeAmis.php" >
													Choisir un contact :
													<select class="selectpicker" name="utilisateur" id="utilisateur">
														<?php 
														$listeUtilisateur = $_SESSION['listeUtilisateur'] ;
														for($i=0;$i<count($listeUtilisateur);$i++){
															echo "<option value = ". $listeUtilisateur[$i]->login ." >" . $listeUtilisateur[$i]->login ."</option>";
														}
														?>
													</select> 
													<button type="submit" class="btn btn-primary btn-sm"  name="envoiDemande">Valider</button>
												</div>
											</div>
										</div>

										<div class="col-md-5">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title">Vos demande en cours</h3>
												</div>
												<div class="panel-body">
													<?php 
													$listeDemande = $_SESSION['demande'];

													for($i = 0;$i<count($listeDemande);$i++){
														?>
														<div class="panel panel-default">
															<div class="panel-heading">Demandeur : <?php echo $listeDemande[$i]->demandeur ?></div>
															<div class="panel-body">
																<center>
																	<?php
																	$accepter = "../controle/gestionDemande.php?id=" .  $listeDemande[$i]->idDemande . "&Reponse=a";
																	$refuser = "../controle/gestionDemande.php?id=" . $listeDemande[$i]->idDemande  . "&Reponse=r" ;
																	?>
																	<a href=<?php echo $accepter ?>>Accepter</a>
																	<a href=<?php echo $refuser ?>>Refuser</a>
																</center>
															</div>
														</div>


														<?php }
														?>
																										
													</div>
														
								
												</div>

											</div>
											<div class="list-group col-md-6">
											<a  class="list-group-item active">
													Mes amis 
												</a>
												<?php
												$listeAmis = $_SESSION['listeAmis'];

													for($i=0;$i<count($listeAmis);$i++){
														?>
														
														<a  class="list-group-item"> <?php echo $listeAmis[$i]->amis;?> </a>
														 
													<?php } ?>
												
											
								</div>
											
										</div>
									</div>
								</div>	
								
									

							</body>

							</html>



