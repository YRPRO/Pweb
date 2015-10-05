
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
          <a class="navbar-brand" href="../index.php">Social Book </a>
          
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Accueil</a></li>
            <li><a href="#about">A propos</a></li>
            <li><a href="#contact">Contact</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">

      <div class="jumbotron">
        
        <h1>Bienvenue sur Social Book.
        </h1>
        <p class="lead">Liker , commentez, et publiez ! Social book est un réseau social qui vous permet de rencontrer d'autre utilisateur afin d'élargir votre cercle d'amis , trouver un job... </p><br>
       
      <a href="vue/inscription.php"><button type="button" class="btn btn-info btn-lg">S'inscrire</button>  </a>
        
 <!-- Modal est compris dans boostrap il nous permet d'inserer un bouton qui au clic ouvrira une petite fenètre qui va nous permettre de nous loger -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Connexion</button>

 
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
  </div>
  <!-- fin du modal-->
  

      </div>

    </div><!-- /.container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="vue/js/bootstrap.min.js"></script>
  </body>
</html>
