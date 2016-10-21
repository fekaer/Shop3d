<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="./style.css"/>
	</head>
<body>

<?php

$baddress  = 'localhost';
$buser     = 'root';
$bpassword = 'etu2016';
$bname     = 'shop3d';

$db = new PDO("mysql:host=$baddress;dbname=$bname", $buser, $bpassword );

if (isset($_GET['id']))
	$id = $_GET['id'];
else
	exit("No id");

foreach($db->query("SELECT * FROM produit WHERE produitId=$id") as $row) {
    echo '<div id="pimg"><img src="./img/img_'.$id.'.jpg" class="pcimg"/></div>';
    echo '<div id="pname">'.$row['nom'].'</div>';
    echo '<h2>Description</h2><div id="pdesc">'.$row['description'].'</div>';
    echo '<h2>Quantité</h2><div id="pquat">'.$row['quantite'].'</div>';
    echo '<h2>Prix</h2><div id="pprix">'.$row['prix'].' CHF</div>';
}
    echo '<div><input type="button" value="Ajouter au panier" class="addpanier"/></div>';

?>

</body>
</html>
