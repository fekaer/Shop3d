<?php

	include('mesFonctions.php');

	if(isset($_GET['q'])) {
		//print($_GET['q']);
		$a = getIdProduitFromName($_GET['q']);
		print($a);
		
	} else {
		print("NO");
	}
