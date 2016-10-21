<?php
	include_once 'connexionbd.php';


	// Ajout un nouvel client dans la table Personne
	function add_client($username, $password, $mail, $adresse, $nom, $prenom)
	{
		echo $username;
		// Connection avec la base de donnée
		$bdd = connexionBDD();

		$sql ="INSERT INTO clients(username,password,email,adresse,nom,prenom) VALUES('$username', '$password',  '$mail', '$adresse', '$nom', '$prenom')";
		$p = $bdd->prepare($sql);
		$p->execute();
	}

	// Ajout un nouvel utilisateur dans la table Personne
	function add_user($username, $pass)
	{
		// Connection avec la base de donnée
		$bdd = connexionBDD();

		$sql ="INSERT INTO user(nom,password) VALUES('$username', '$pass')";
		$p = $bdd->prepare($sql);
		$p->execute();
	}

	//regarde si un utilisateur existe (renvoi true si il existe sinon false)
	function user_exist($username, $pass)
	{
		// Connection avec la base de donnée
		$bdd = connexionBDD();

		$sql = "SELECT * FROM user WHERE nom = '$username' AND password = '$pass'";
		$p = $bdd->prepare($sql);
		$p->execute();
		$r = $p->fetchAll();
		$result = count($r);

		//si login existe renvoi true sinon false
		if($result > 0){
			return true;
		}
		else{
			return false;
		}
	}

	function client_exist($username){
		// Connection avec la base de donnée
		$bdd = connexionBDD();

		$sql = "SELECT * FROM clients WHERE username = '$username'";
		$p = $bdd->prepare($sql);
		$p->execute();
		$r = $p->fetchAll();
		$result = count($r);

		//si login existe renvoi true sinon false
		if($result > 0){
			return true;
		}
		else{
			return false;
		}
	}

		// Recupere toutes les infos d'une personne
	function getinfoClient($mail)
	{
		// Connection avec la base de donnée
		$bdd = connexionBDD();
		// recupere l'id, le nom et le passeword de la personne voulu
		$sql = "SELECT username FROM clients WHERE mail = '$mail'";
		echo $sql;
		$p = $bdd->prepare($sql);
		$p->execute();
		$r = $p->fetchAll();
		return $r[0];
	}

	function connection_client($username, $pass){
		// Connection avec la base de donnée
		$bdd = connexionBDD();

		$sql = "SELECT * FROM clients WHERE username = '$username' AND password = '$pass'";
		$p = $bdd->prepare($sql);
		$p->execute();
		$r = $p->fetchAll();

		$result = count($r);

		//si login existe renvoi true sinon false
		if($result > 0){
			return true;
		}
		else{
			return false;
		}
	}


	// Recupere toutes les infos d'une personne
	function getinfoUser($username, $pass)
	{
		// Connection avec la base de donnée
		$bdd = connexionBDD();
		// recupere l'id, le nom et le passeword de la personne voulu
		$sql = "SELECT userId, nom, password FROM user WHERE nom = '$username' AND password = '$pass'";
		echo $sql;
		$p = $bdd->prepare($sql);
		$p->execute();
		$r = $p->fetchAll();
		return $r[0];
	}

	// Ajoute un nouvel Produit
	function addProduit($nom, $description, $quantite, $prix, $rayonId)
	{
		// Connection avec la base de donnée
		$bdd = connexionBDD();

		$sql = "INSERT INTO produit ( nom, description, quantite,prix, rayonId) VALUES('$nom', '$description', '$quantite', '$prix', '$rayonId')";
		$p = $bdd->prepare($sql);
		$p->execute();
		$r = $p->fetchAll();
		return $r;
	}

	// modif Produit
	function UpDateProduit($produitId, $nom, $description, $quantite, $prix, $rayonId)
	{
		// Connection avec la base de donnée
		$bdd = connexionBDD();

		$sql = "UPDATE produit SET nom = '$nom', description = '$description', quantite = '$quantite', prix = '$prix', rayonId = '$rayonId' WHERE produitId = '$produitId'";
		$p = $bdd->prepare($sql);
		$p->execute();
		$r = $p->fetchAll();
		return $r;
	}

	// Supprime produit
	function delProduit($idProduit)
	{
		// Connection avec la base de donnée
		$bdd = connexionBDD();

		$d_event = "DELETE FROM produit WHERE produitId = $idProduit";
		$d_event = $bdd->prepare($d_event);
		$d_event->execute();
	}

	function getProduit($idProduit){
		// Connection avec la base de donnée
		$bdd = connexionBDD();

		$sql = "SELECT * FROM produit WHERE produitId=$idProduit";
		$p = $bdd->prepare($sql);
		$p->execute();
		$r = $p->fetchAll();
		return $r;
	}

	function getProduitsStartWith($name) {
		$bdd = connexionBDD();
		$sql = "SELECT nom FROM produit WHERE nom LIKE \"$name%\"";
		$p = $bdd->prepare($sql);
		$p->execute();
		$r = $p->fetchAll();
		return $r;
	}

	function getIdProduitFromName($name) {
		$bdd = connexionBDD();
		$sql = "SELECT produitId FROM produit WHERE nom=\"$name\"";
		$p = $bdd->prepare($sql);
		$p->execute();
		$r = $p->fetchAll();
		if(!empty($r))
			return $r[0][0];
		else
			return -1;
	}

?>
