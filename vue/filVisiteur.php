<!DOCTYPE html>
<html lang="en">
  <?php 
  include("../partie/entete.php");
  include("../partie/menu.php");
  ?>
	<body>

<div class="container-fluid">
  
  <!--left-->
  <div class="col-sm-3">
        <h2>Side</h2>
    	<div class="panel panel-default">
         	<div class="panel-heading">Title</div>
         	<div class="panel-body">Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
            Aliquam in felis sit amet augue.</div>
        </div>
        <hr>
        <div class="panel panel-default">
         	<div class="panel-heading">Title</div>
         	<div class="panel-body">Content here..</div>
        </div>
        <hr>
        <div class="panel panel-default">
         	<div class="panel-heading">Title</div>
         	<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
            Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
            dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
            Aliquam in felis sit amet augue.</div>
        </div>
        <hr>
        <div class="panel panel-default">
         	<div class="panel-heading">Title</div>
         	<div class="panel-body">Content here..</div>
        </div>
        <hr>
  </div><!--/left-->
  
  <!--center-->
  <div class="col-sm-8">
    <br>
     <div class="jumbotron">
<h1>Social Book</h1> 
    <p>Bienvenue sur votre espace invité. Vous pouvais consulter les commentaires (public) de nos membres. <br>

 Rejoinez nous vous aussi pour partager,commenter et liker. </p>
<a href="inscription.php"><button type="button" class="btn btn-primary" >Je m'inscrit</button></a>

  </div>
    <hr>
     <?php 
       require('../modele/dataBase.php');
  require('../controle/fonction.php');
  $coms= recupCommentairePublic();
      
          for($i = 0;$i<count($coms);$i++){
            ?>  
    <div class="row">
      <div class="col-xs-12">
        <h3> <?php echo 'Ecrit par : '.$coms[$i]->login.'  - Thème : '.$coms[$i]->libelleTheme;  ?></h3>
        <p><?php echo $coms[$i]->commentaire; ?></p>
        <p class="pull-right"><span class="label label-default">keyword</span> <span class="label label-default">tag</span> <span class="label label-default">post</span></p>
        <ul class="list-inline"><li><a href="#"><?php echo $coms[$i]->dateC; ?></a></li><li>J'aime  <span class="glyphicon glyphicon-thumbs-up"></span>
         <span class="badge"><?php echo $coms[$i]->nbLike ;?></span> </li><li>Je n'aime pas <span class="glyphicon glyphicon-thumbs-down"></span>
         <span class="badge"><?php echo $coms[$i]->nbUnLike ;?></span> </li></ul>
      </div>
    </div>
     <?php  } ?>

  
    
  </div><!--/center-->

  <hr>
</div><!--/container-fluid-->
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>