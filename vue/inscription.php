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

    <!------------------------------------------------ -->
<?php
if (isset($errors) && count ($errors) != 0){
echo '<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    <strong>Attention! : </strong><br>';
  foreach ($errors as $error){
    echo $error.'</br>';
  }
  echo'</diV>';

  }
 
?>

<h2>Inscription</h2>
<form method="post" action ="../controle/ajoutUtilisateur.php">

  <div class="form-group">
    <label for="login">Login:</label>
    <input type="text" class="form-control" id="login" name="login" placeholder="Entrer votre login" required = "required" >
  </div>
    <div class="form-group">
    <label for="nom">Nom:</label>
    <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer votre nom" required = "required">
  </div>
    <div class="form-group">
    <label for="prenom">Prenom:</label>
    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrer votre prenom" required = "required">
  </div>
  <!--------------------------------------------- -->
<div class="form-group">
<label for="date_naissance"><span class="glyphicon glyphicon-calendar"></span> Date de naisssance : </label>
<select name="jour">
<option value="0">Jour</option>
<?php
// Boucle qui va nous permettre d'afficher les jour du 1er au 31 du mois.
for ($i = 1; $i <= 31; $i++)
{
echo '<option value="' . $i . '">' . $i . '</option>';
}
?>
</select>

<select name="mois" size="1">
<option value="01">Janvier</option><option value="02">Février</option><option value="03">Mars</option><option value="04">Avril</option><option value="05">Mai</option><option value="06">Juin</option><option value="07">Juillet</option><option value="08">Août</option><option value="09">Septembre</option><option value="10">Octobre</option><option value="11">Novembre</option><option value="12">Décembre</option></select>

<select name="annee">
<option value="0">Année</option>
<?php
// bouvle qui va permettre à l'utilsateur de selectionner son anneé de naissance.Val min = 1900 val max = 2015 . 
for ($i = 2015; $i >= 1900; $i--)
{
echo '<option value="' . $i . '">' . $i . '</option>';
}
?>
</select> 

</div>
<!---------------------------------------------------- -->

<div class="form-group">
    <label for="email"><span class="glyphicon glyphicon-envelope"></span>
  </span> Email:</label>
    <input type="email" class="form-control" id="email" name ="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Entrer votre email"required = "required">
  </div>

<div class="form-group">
<label for="pwd"><span class="glyphicon glyphicon-lock"></span>Mot de passe: </label>
  <input type="password" class="form-control"id="pwd"  name ="pwd" required = "required" type="hidden">

  </div>
<div class="form-group">
<label for="pwd_confirm"><span class="glyphicon glyphicon-lock"></span> Confirmation mot de passe: </label>
  <input type="password" class="form-control"id="pwd_confirm"  name ="pwd_confirm" required = "required" type="hidden">

  </div>


    <label for="sexe">Sexe:</label>
    <select class="form-control" id="sexe" name="sexe">
       <option value="F" name="sexe">Femme</option>
      <option value="H" name="sexe">Homme</option>
    </select>
<br>
    <button type="submit" class="btn btn-primary" name="valide">Valide <span class="glyphicon glyphicon-ok"></span></button>

  </div>

 </form>


 <!------------------------------------------------ -->



    </div>
</div>
  </div><!-- /.container -->

<?php
include('../partie/footer.php');
?>
</body>
</html>