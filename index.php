<?php
  //verification pour savoir si les statisique sont connues 
  if(isset($_SESSION['nbTheme']) and isset($_SESSION['nbUtilsateur']) and isset($_SESSION['nbCommentaire']))
      header('Location:vue/accueil.php');
    else{
      session_start();
      require('modele/dataBase.php');
      require('modele/accesBase.php');
      $_SESSION['nbTheme'] = recupNbTheme();
      $_SESSION['nbUtilsateur'] = recupNbUtilsateur();
      $_SESSION['nbCommentaire'] = recupNbcommentaire();
      header('Location:vue/accueil.php');
    }

?> 