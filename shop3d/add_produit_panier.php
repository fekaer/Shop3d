
<?php

	require("./mesFonctions.php");


	function add_panier($id)
	{
	    $produit = getProduit($id)
	    print_r($produit);
	    return $produit;
	}
?>

