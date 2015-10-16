    <?php 
            //activation de la session
    session_start();
    ?>
    <!DOCTYPE html>
    <html lang="fr">


    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Reseau social ">
      <!-- <link rel="icon" href="../../favicon.ico">-->
      <title>Bienvenue sur Social Book !</title>
      <!--- Permet d'utiliser certaine balise de html 5 meme si on a une ancienne version du navigateur -->
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!--Notre style css -->
      <link rel="stylesheet" href="css/style_principal.css"/>
      <link href="css/font-awesome.css" rel="stylesheet" />

    </head>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only"></span>
            <span class="icon-bar"> </span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.php"><span class="glyphicon glyphicon-globe"></span> Social Book</a>
          
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
            <li><a href="#">A propos</a></li>
            <li><a href="#contact">Contact</a></li>

          </ul>
        </div>
      </div>
    </nav>

    <div id="home">
      <div class="overlay">
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

        <div class="container">
          <div class="col-md-8 col-md-offset-2 text-center">

            <h1>Social Book </h1>
            <h2>Le réseaux social ...</h2>
            <p class="p-cls">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>      
            <a href="vue/filVisiteur.php"><button type="button" class="btn btn-primary"><span class="fa fa-eye fa-1x"></span> Visiteur</button></a>

            <a href="inscription.php"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> S'inscrire</button>  </a>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span> Connexion</button>

          </div>

        </div>
      </div>

    </div>

    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Identifier vous.</h4>

        </div>
        <div class="modal-body">
          <!-- Insertion du formulaire d'identification-->

          <form role="form" method="post" action ="../controle/connexion.php">
            <div class="form-group">
              <label for="login" >Login:</label>
              <input type="text" class="form-control" id="login" name="login" placeholder="Entrer votre identifiant">
            </div>
            <div class="form-group">
              <label for="pwd">Mot de passe:</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Entrer votre mot de passe">
            </div>
            <button type="submit" class="btn btn-success">Valider</button> 
          </form>
          <!-- Fin du form de log -->
        </div>
      </div>
    </div>

  </div>

</div>
<!-- fin du modal-->
<section id="services">
  <div class="container">
    <div class="apropos">
      <div class="row text-center pad-bottom">
        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
          <h2 class="head-set">A propos...</h2>
          <p>
           Social book est un réseau social qui vous permet de vous vous exprimer en toute liberte et de rencontrer d'autre utilisateur pout tisser de nouveau lien .
         </p>
       </div>
     </div>
   </div>
   <div class="row text-center">

    <div class="col-md-4 col-sm-4 col-xs-12">
      <i class="fa fa-users fa-5x"></i>
      <h4 class="head-set">PARTAGER</h4>
      <p>
       Social book vous permez de rencontrer d'autre utilisteur et elargir votre cercle d'amis

     </p>
   </div>
   <div class="col-md-4 col-sm-4 col-xs-12">
    <i class="fa fa-heart fa-5x"></i>
    <h4 class="head-set">LIKER</h4>
    <p>
      Liker/unliker les publications des membres de social book.
    </p>
  </div>
  <div class="col-md-4 col-sm-4 col-xs-12">
    <i class="fa fa-comments fa-5x"></i>
    <h4 class="head-set">COMMENTER</h4>
    <p>
     Social book vous permez de poster sur la toile vos commentaires.
   </p>
 </div>
</div>
</div>
</section>
<div class="parallax-like">
  <div class="overlay">

    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div>
           <?php
           echo $_SESSION['nbUtilsateur'];
           ?>
         </strong>
         <p>
          Membres
        </p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
      <div>
        <strong>
          <?php

          echo $_SESSION['nbTheme'];
          ?>

        </strong>
        <p>
          Themes
        </p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 ">
      <div>
        <strong>
          <?php
          echo  $_SESSION['nbCommentaire'];
          ?>

        </strong>
        <p>
          Commentaires
        </p>
      </div>
    </div>

  </div>
</div>
</div>
</div>
<?php
include('../partie/footer.php');
?>

</html>