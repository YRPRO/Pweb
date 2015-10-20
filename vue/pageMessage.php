          
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
        <link rel="stylesheet" href="./vue/css/style_principal.css"/>
          <link href="css/font-awesome.css" rel="stylesheet" />

        </head>
        <body>

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
                  <li><a href="#">A propos</a></li>
                  <li><a href="#contact">Contact</a></li>

                </ul>
              </div>
            </div>
          </nav>

            <div class="container">
          <div class="row">
            <div class="col-md-6">
              <br>
              <div class = "Message-recu">
              <div class="panel panel-default widget">
                  <div class="panel-heading">
                      <span class="glyphicon glyphicon-comment"></span>
                      <h3 class="panel-title">
                          Mes messages reçu </h3>
                      <span class="label label-info">
                         Info messages</span>
                  </div>
                  <div class="panel-body">
                      <ul class="list-group">
                          <li class="list-group-item">
                              <div class="row">
                                  <div class="col-xs-2 col-md-1">
                                      <img src="./imgCom.png" class="img-circle " width="32" height="32" alt="" /></div>
                                  <div class="col-xs-10 col-md-11">
                                      <div>
                                          <a href="http://bootsnipp.com/BhaumikPatel/snippets/4ldn">Message de ### </a>
                                          <div class="mic-info">
                                            <span class="glyphicon glyphicon-time"></span> Poster le #date
                                          </div>
                                      </div>
                                      <div class="comment-text">
                                          Mettre ici le commenataire 
                                      </div>
                                      <div class="action">

                                          
                                          <button type="button" class="btn btn-danger btn-xs" title="Supprimer" name="supMsg">
                                              Supprimer <span class="glyphicon glyphicon-trash"></span>
                                          </button>
                                      </div>
                                  </div>
                              </div>
                          </li>
                      </ul>
                    
                  </div>
              </div>
              </div>
        </div>

      <br>
              
        <div class="col-md-6">
             <div class="panel panel-default widget">
                  <div class="panel-heading">
                      <span class="glyphicon glyphicon-send"></span>     
                      <h3 class="panel-title">  
                            Envoie de messages </h3>
                      <span class="label label-info">
                         Envoie</span>
                  </div>
                  <div class="panel-body">
                      <ul class="list-group">
                          <li class="list-group-item">
                              <div class="row">
                                  <div class="col-xs-2 col-md-1">
                                      <img src="./imgCom.png" class="img-circle " width="32" height="32" alt="" /></div>
                                  <div class="col-xs-10 col-md-11">
                                      <div>
                                         <div class="form-group">
                                         <label for="usr">Pour :</label>
                                         <input type="text" class="form-control" id="usr">
                                          </div>
                  
                                      </div>
                                      <div class="form-group">
                                      <label for="comment">Commentaire :</label>
                                      <textarea class="form-control" rows="5" id="comment"></textarea>
                                      </div>
                                       <div class="action">
                                         <!-- <button type="button" class="btn btn-primary btn-sm" title="Edit">
                                              <span class="glyphicon glyphicon-pencil"></span>
                                          </button> -->
                                          <button type="button" class="btn btn-success btn-sm" title="Envoyer" name="envoiMsg">
                                              Envoyer  <span class="glyphicon glyphicon-ok"></span>
                                          </button>
                                        
                                      </div>
                                  </div>
                              </div>
                          </li>
                      </ul>
                    
                  </div>
      
            </div>
            </div>
</body>

</html>




