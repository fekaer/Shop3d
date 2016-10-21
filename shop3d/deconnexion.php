<?php
	session_start();

	$_SESSION = array(); //efface ce qui y a dans session (detruit les var dans session)
	session_destroy();

	header("Location:index.php");
	exit();
?>