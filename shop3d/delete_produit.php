<?php
	include('mesFonctions.php');
	delProduit($_GET['id']);
	header("location: /shop3d/admin.php");
	
?>