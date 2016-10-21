<?php
	include_once 'mesFonctions.php';
	session_start();
	$password = $_POST['password'];
	$username = $_POST['username_'];

	if(isset($username)&&isset($password)){
		$reponse = connection_client($username, sha1($password));
		if($reponse){
			$_SESSION['pseudo'] = $username;
			$_SESSION['pass'] = sha1($password);
		}else{
			
		}
	}
?>