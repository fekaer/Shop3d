<?php

	include('mesFonctions.php');

	if(isset($_GET['q'])) {
		//print($_GET['q']);
		$a = getProduitsStartWith($_GET['q']);
		//print_r($a);
		foreach($a as $produit){
			$pro = $produit[0];
			print("<a onclick=\"showProduitFromName('$pro')\">$pro</a>");				

			//echo '</a>';
			echo '<br/>';
		}
	} else {
		print("NO");
	}


