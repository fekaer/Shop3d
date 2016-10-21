<?php
   session_start();
   include 'mesFonctions.php';
    
   	// si la valeur n'est pas vide
	if(isset($_POST['username']))
	{
		$username = $_POST['username'];		
	}
	else
	{
			header('Location: creer_compt.php');
	}
	if(isset($_POST['password']))
	{
		$password = $_POST['password'];			
	}
	else
	{
			header('Location: creer_compt.php');
	}
	if(isset($_POST['mail']))
	{
		$mail = $_POST['mail'];			
	}
	else
	{
			header('Location: creer_compt.php');
	}
	if(isset($_POST['adresse']))
	{
		$adresse = $_POST['adresse'];			
	}
	else
	{
			header('Location: creer_compt.php');
	}
	if(isset($_POST['nom']))
	{
		$nom = $_POST['nom'];			
	}
	else
	{
			header('Location: creer_compt.php');
	}
	if(isset($_POST['prenom']))
	{
		$prenom = $_POST['prenom'];			
	}
	else
	{
			header('Location: creer_compt.php');
	}
	

	// Si l'utilisateur est dans ma base de donnée
	$result = client_exist($mail);

	if($result == false)
	{
		// ajoute a ma base de donnée
		add_client($username, sha1($password), $mail, $adresse, $nom, $prenom);
		$_SESSION["username"] = getinfoClient($mail);
		header('Location: index.php');
	}
	else
	{
		header('Location: creer_compt.php');
	}
?>