<?php
  //activation de la session
  session_start();
?>
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
        <hr>
    <div class="panel panel-primary">
          <div class="panel-heading"><H4>Thèmes</h4></div>
          <div class="panel-body">
<ul id="sidebar" class="nav nav-pills nav-stacked" style="max-width: 400px;">
        <?php 
            $theme = $_SESSION['libelleTheme'];
          for($i = 0;$i<count($theme);$i++){
            ?>  
 <li><a href="../controle/controleFillVisiteur.php?theme=<?php echo $theme[$i]->libelleTheme ?>" ><span class="glyphicon glyphicon-bookmark"></span> <?php echo $theme[$i]->libelleTheme ?></a></li>
<?php } ?>
</ul>

          </div>
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
      
          $coms = $_SESSION['commentairePublic'];
      
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
<hr>
  </body>
  <?php
  include("../partie/footer.php");
  ?>
</html>