<?php
session_start();

?>


<?php

require('connexionbd.php');
$bdd = connexionBDD();
//echo 'test';
//$bdd = new PDO('mysql:host=localhost;dbname=shop3d', "root", "root");
$user = $_SESSION['username'];
$sth = $bdd->prepare("SELECT * FROM clients where username='$user'");
$sth->execute();

/* Récupération de toutes les lignes d'un jeu de résultats */
//echo "Récupération de toutes les lignes d'un jeu de résultats :<br/>";
$result = $sth->fetchAll();

///$r = $result[0];

//echo $r['username'];

//print_r($result);

foreach($result as $r){
  $r['username'];
  $r['nom'];
  $r['prenom'];
  $r['email'];
  $r['password'];
  $r['adresse'];

}


if(!empty($_POST)){
  $username = $_POST['username'];
  $nom      = $_POST['nom'];
  $prenom   = $_POST['prenom'];
  $email    = $_POST['email'];
  $password = $_POST['password'];
  $adresse  = $_POST['adresse'];

  print_r($_POST);

  $shapass = sha1($password);

  $sql = "UPDATE clients SET nom = '$nom', prenom = '$prenom', adresse = '$adresse', email = '$email', password = '$shapass' WHERE username = '$user'";

  $p = $bdd->prepare($sql);
  $p->execute();

}


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Modifiez votre compte</title>
    <link href="login.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  </head>


  <body>

    <div class="container">
      <div id="login" class="form-group">
	<div id="panel" class="panel panel-default">
	  <div class="panel-heading">
	    <h2 classe="panel-title" style="font-size:24pt;">Modifiez votre compte : <?php echo $r['username'];  ?></h2>
	  </div>
	  <div id="mycontent">
	    <form  method="post">
	      <div class="form-group">
		<label>Nom :</label>
		<input id="nom" class="form-control" name="nom" value="<?php echo $r['nom']; ?>" type="text" required="required" blocker>
	      </div>
	      <div class="form-group">
		<label>Prenom :</label>
		<input id="prenom" class="form-control" name="prenom" value="<?php echo $r['prenom']; ?>" type="text" required="required">
	      </div>
	      <div class="form-group">
		<label>Adresse :</label>
		<input id="adresse" class="form-control" name="adresse" value="<?php echo $r['adresse']; ?>" type="text" required="required">
	      </div>
	      <div class="form-group">
		<label>Mail :</label>
		<input id="mail" class="form-control" name="email" value="<?php echo $r['email']; ?>" type="email" required="required">
	      </div>

	      <div class="form-group">
		<label>Password :</label>
		<input id="password" class="form-control" name="password" value="<?php echo $r['password']; ?>" type="password" required="required">
	      </div>


	      <input name="submit" class="btn btn-primary" type="submit" value="Update ">
	    </form>
	  </div>
	</div>
      </div>
    </div>
  </body>
</html>
