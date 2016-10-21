<?php
	
   session_start();
   include_once 'connexionbd.php';
   include 'mesFonctions.php';
   $bdd = connexionBDD();
   //var_dump($_SESSION);
   
   	// si la valeur de username est vide
	if(isset($_POST['username']))
	{
		$username = $_POST['username'];	
	}
	
   	// si la valeur de password est vide
	if(isset($_POST['password']))
	{
		$password = $_POST['password'];	
	}
	
	
	// test si l'utilisateur existe
	$result = user_exist($username, $password);
	
	// test si deja connecté
	if(!isset($_SESSION["user"]))
	{
		if($result == true)
		{
			//$_SESSION["user"] = getinfoUser($username, $password);
			header('Location: admin.php');
		}
		else
		{
			header('Location: login.php');
		}
	}
	else
	{
		echo 'deja connecté';
	}
	

?>
