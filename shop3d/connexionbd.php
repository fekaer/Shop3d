<?php
// Connexion à la base de données
function connexionBDD()
{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=shop3d', "root", "");
			//echo "Connecte";
			return $bdd;
		}
		catch(PDOException $e)
		{
			echo "ERROR acces Base de donnée\n";
		}
	}

?>
