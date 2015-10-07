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

      <link href="./vue/css/bootstrap.min.css" rel="stylesheet">
<!--Notre style css -->
  <link rel="stylesheet" href="./vue/css/style_principal.css"/>

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
          <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-globe"></span> Social Book</a>
          
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
            <li><a href="#about">A propos</a></li>
            <li><a href="#contact">Contact</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">

      <div class="jumbotron">
        
        <h1>Bienvenue sur Social Book.<span class="glyphicons glyphicons-group"></span>
        </h1>
        <p class="lead">Liker , commentez, et publiez ! Social book est un réseau social qui vous permet de rencontrer d'autre utilisateur afin d'élargir votre cercle d'amis , trouver un job... </p><br>
       
      <a href="vue/inscription.php"><button type="button" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-edit"></span> S'inscrire</button>  </a>
        
 <!-- Modal est compris dans boostrap il nous permet d'inserer un bouton qui au clic ouvrira une petite fenètre qui va nous permettre de nous loger -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span> Connexion</button>

 
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

  <form role="form" method="post" action ="./controle/connexion.php">
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
  <!-- fin du modal-->
  </div>
 
  
<div id="section1" class="container-fluid">
  <h1 class="text-center">Partager</h1>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
</div>


<div id="section2" class="container-fluid">
  <h1 class="text-center">Commenter</h1>
  
  <blockquote>
    <p>For 50 years, WWF has been protecting the future of nature. The world's leading conservation organization, WWF works in 100 countries and is supported by 1.2 million members in the United States and close to 5 million globally.</p>
    <footer>From WWF's website</footer>
  </blockquote>
  <br>

</div>
<div id="section3" class="container-fluid">
  <h1 class="text-center">Liker</h1>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
</div>
</br>

    </div><!-- /.container -->
<?php
include('partie/footer.php');
?>
  </body>
</html>
