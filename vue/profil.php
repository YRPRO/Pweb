<!DOCTYPE html>
   <?php
   session_start(); 
  include("../partie/entete.php");
  include("../partie/menu.php");
  ?>

<body>
	<?php
		$_SESSION['comPublic'];
		$_SESSION['comUtilisateur'] ;
		$_SESSION['comAmis'] ;
	
	?>

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
						<div class="profile-usertitle-job">
							Adresse mail
						</div>
					</div>
					<!-- END SIDEBAR USER TITLE -->
					<!-- SIDEBAR BUTTONS -->
					<div class="profile-userbuttons">
						<button type="button" class="btn btn-success btn-sm">Ajouter</button>
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
									<a href="#amis">
										<i class="glyphicon glyphicon-user"></i>
										Mes amis</a><br>
									</li>
			
									</ul>
								</div>
								<!-- END MENU -->

								<ul class="list-group">
									<li class="list-group-item text-muted">Statistiques<i class="fa fa-dashboard fa-1x"></i></li>
									<li class="list-group-item text-right"><span class="pull-left"><strong>Commentaires</strong></span> 125</li>
									<li class="list-group-item text-right"><span class="pull-left"><strong>Nombre de likes</strong></span> 13</li>
									<li class="list-group-item text-right"><span class="pull-left"><strong>Nombre d'amis</strong></span> 37</li>
								</ul> 
							</div>
						</div>

						<div class="col-md-6">
							<div class="profile-content">

							<div class="status-post">
								<form action="commentaires.php" method="post" data-parsley-validate>
									<div class="form-group">
									<label for="content" class="sr-only">Statut:</label>
									<textarea name="content" id="content" rows="3" clas="form-control"
									placeholder="Alors quoi de neuf ?"></textarea>
									</div>

									<div class="form-group status-post-submit">
										<input type="submit" name="publish" value="Publier" class="btn btn-default btn-xs">
									</div>


								</form>


									
								</div>
							</div>
							</div>
						</div>

</diV>
					<?php
include('../partie/footer.php');
?>



					</body>


					</html>



