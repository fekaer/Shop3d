<?php
	session_start();

	require("./mesFonctions.php");

	include_once 'mesFonctions.php';
	$error = "";

	$nom = "";
	$prenom = "";
	$adresse = "";
	$mail = "";
	$username = "";
	$password = "";
	$password2 = "";

	if (isset($_POST['submit'])){ //tentative d'ajout
	  $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
		$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
		$adresse = isset($_POST['adresse']) ? $_POST['adresse'] : '';
		$mail = isset($_POST['mail']) ? $_POST['mail'] : '';
		$username = isset($_POST['username']) ? $_POST['username'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';
		$password2 = isset($_POST['password2']) ? $_POST['password2'] : '';
	  $error = "";


	  if ($password != $password2 ) {
	  	$error .= "Les deux passwords ne sont pas identiques\n";
	  }

		if (client_exist($username) == true) {
			$error .= "Cet username est déjà utilisé\n";
		}

	  if (empty($error)) {
			$_SESSION['username'] = $username;
			add_client($username, sha1($password), $mail, $adresse, $nom, $prenom);
	    header('Location: index.php');
	    exit();
	  }

	}


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Creation d'un compte</title>
		<link href="login.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	</head>


	<body>
		<?php //include 'nav.php'; ?>
	    <div class="container">
			<div id="login" class="form-group">
				<div id="panel"class="panel panel-default">
					<div class="panel-heading">
							<h2 class="panel-title" style="font-size:24pt;">Inscription</h2>
					</div>
					<div id="mycontent">
						<form action="creer_compt.php" method="post">
						<div class="form-group">
							<label>Nom :</label>
							<input id="nom" class="form-control" name="nom" placeholder="Nom" type="text" required="required" value="<?php echo $nom ?>">
						</div>
						<div class="form-group">
							<label>Prenom :</label>
							<input id="prenom" class="form-control" name="prenom" placeholder="Prenom" type="text" required="required" value="<?php echo $prenom ?>">
						</div>
						<div class="form-group">
							<label>Adresse :</label>
							<input id="adresse" class="form-control" name="adresse" placeholder="Adresse" type="text" required="required" value="<?php echo $adresse ?>">
						</div>
						<div class="form-group">
							<label>Mail :</label>
							<input id="mail" class="form-control" name="mail" placeholder="Mail" type="email" required="required" value="<?php echo $mail ?>">
						</div>
						<div class="form-group">
							<label>UserName :</label>
							<input id="username" class="form-control" name="username" placeholder="Username" type="text" required="required">
						</div>
						<div class="form-group">
							<label>Password :</label>
							<input id="password" class="form-control" name="password" placeholder="**********" type="password" required="required">
						</div>
						<div class="form-group">
							<label>Confirmation Password :</label>
							<input id="password2" class="form-control" name="password2" placeholder="**********" type="password" required="required">
						</div>

							<input name="submit" class="btn btn-primary" type="submit" value=" Creer compte ">
						</form>
					</div>
				</div>
				<p class="bg-danger" style="font-family:20pt; padding-left:10px;">
					<?php echo $error; ?>
				</p>
			</div>
		</div>
	</body>
</html>
