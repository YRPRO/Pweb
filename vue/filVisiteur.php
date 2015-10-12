<!DOCTYPE html>
<html lang="fr">


<!--On fait ici appel à l'entete et le menu de notre site.Cette méthode nous permet 
de rentre le code plus lisible . Nous ferons appel a ses fichier sur chaque page.-->
   <?php 
  include("../partie/entete.php");
  include("../partie/menu.php");
  ?>
<body>
  <div class="container">
     <div class="jumbotron">
<h1>Social Book</h1> 
    <p>Bienvenue sur votre espace invité. Vous pouvais consulter les commentaires (public) de nos membres. <br>

 Rejoinez nous vous aussi pour partager,commenter et liker. </p>
<a href="inscription.php"><button type="button" class="btn btn-primary" >Je m'inscrit</button></a>

  </div><!-- /.container -->
<br>


















</div>

<?php
include('../partie/footer.php');
?>
</body>
</html>