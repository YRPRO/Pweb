<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Reseau social ">
    <!-- <link rel="icon" href="../../favicon.ico">-->
    <title>Page de profil</title>
    <!--- Permet d'utiliser certaine balise de html 5 meme si on a une ancienne version du navigateur -->
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

      <link href="css/bootstrap.min.css" rel="stylesheet">
<!--Notre style css -->
  <link rel="stylesheet" href="css/style_principal.css"/>

  </head>
<body>
	<?php include('../partie/menu.php'); ?>
	<?php session_start();?>
	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">Profil de <?php echo $_SESSION['login']; ?></h3>
  		</div>
  		<div class="panel-body">
  			
  		</div>
	</div>
</body>
</html>


