      <?php 
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
        <title>Mes messages</title>
        <!--- Permet d'utiliser certaine balise de html 5 meme si on a une ancienne version du navigateur -->
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-select.js"></script>
        <script src="/path/to/jquery.mCustomScrollbar.concat.min.js"></script>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-select.min.css" rel="stylesheet">
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
            <a class="navbar-brand" href="../index.php"><span class="glyphicon glyphicon-globe"></span> Social Book</a>

          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="../index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
              <li><a href="../controle/controlePageProfil.php">Page de profil</a></li>
              <li><a href="../controle/deconnexion.php">Deconnexion</a></li>

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
                   <?php 
                      
                   
                   $messageRecu = $_SESSION['message'] ;
                   for($i=0;$i<count($messageRecu);$i++){
                    ?>
                    <!-- debut panel message-->
                    <div class="panel-body">
                      <ul class="list-group">
                        <li class="list-group-item">
                          <div class="row">
                            <div class="col-xs-2 col-md-1">
                              <img src="./imgCom.png" class="img-circle " width="32" height="32" alt="" /></div>
                              <div class="col-xs-10 col-md-11">
                                <div>
                                  Message de <?php echo $messageRecu[$i]->expediteur ;?>
                                  <div class="mic-info">
                                    <span class="glyphicon glyphicon-time"></span> Poster le <?php echo $messageRecu[$i]->dateCreation ;?>
                                  </div>
                                </div>
                                <div class="comment-text">
                                  <p>
                                    <?php echo $messageRecu[$i]->message ;?>
                                  </p> 
                                </div>
                                <div class="action">

                                  <button type="submit"class="btn btn-primary btn-xs" title="Repondre" name="RepMsg" data-toggle="modal" data-target="#myModal" >
                                    Repondre <span class="glyphicon glyphicon-pencil"></span>
                                  </button>
                                  <!-- modal pour reponse message -->
                                  <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">

                                      <!-- Modal content-->
                                      <div class="modal-content">

                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Votre reponse :</h4>

                                        </div>
                                        <div class="modal-body">
                                          <!-- Insertion du formulaire d'ajout d'une image-->
                                          
                                          ?>
                                          <form role="form" method="post" action ="../controle/controleRepMessage.php" >
                                            <div class="form-group">
                                              <label for="login" >Message</label>
                                              <style type="text/css">textarea{ resize:none;}</style>
                                              <input type="hidden" class="form-control" id="destinateur" name="destinateur" value= <?php echo $messageRecu[$i]->expediteur ?>>
                                              <input type="textarea" class="form-control" id="reponse" name="reponse" placeholder="Exprimez vous">
                                            </div>
                                            <button type="submit" class="btn btn-success">Valider</button> 
                                          </form>
                                          <!-- Fin du form de reponse -->
                                        </div>
                                      </div>
                                    </div>
                                    </div>



                                    <?php 
                                      $chemin = "../controle/controleSupMessage.php?id=" .$messageRecu[$i]->idMessage ;
                                    ?>
                                    <a href=<?php echo $chemin ;?>><button type="button" class="btn btn-danger btn-xs" title="Supprimer" name="supMsg">
                                      Supprimer <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                        <!-- fin panel message-->
                        <?php } ?>
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
                                 <form role="form" method="post" action ="../controle/nouveauMessagePrive.php" >
                                  Amis : <select class="selectpicker" name="amis" id="amis">
                                  <?php 
                                     
                                    $amis = $_SESSION['amis'];
                                    //var_dump($amis);
                                    //die();
                                    
                                    for($i=0;$i<count($amis);$i++){
                                      echo "<option value = ". $amis[$i]->amis ." >" . $amis[$i]->amis ."</option>";
                                    }
                                  ?>
                                    
                                  </select>
                                 </div>

                               </div>
                               <div class="form-group">
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
                                <label for="comment">Message :</label>
                                <textarea class="form-control" rows="5" name="message" id="message"></textarea>
                              </div>
                              <div class="action">
                                         <!-- <button type="button" class="btn btn-primary btn-sm" title="Edit">
                                              <span class="glyphicon glyphicon-pencil"></span>
                                            </button> -->
                                            <button type="submit" class="btn btn-success btn-sm" title="Envoyer" name="envoiMsg">
                                              Envoyer  <span class="glyphicon glyphicon-ok"></span>
                                            </button>
                                            
                                            </form>
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




