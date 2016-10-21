<?php

	function GetProduitsAdmin() {
		$baddress  = 'localhost';
		$buser     = 'root';
		$bpassword = '';
		$bname     = 'shop3d';

		$db = new PDO("mysql:host=$baddress;dbname=$bname", $buser, $bpassword );

		echo '<table class="table table-striped">';
		echo '<tr><th>ID</th><th>Nom</th><th>Description</th><th>Quantités</th><th>Prix</th><th>Actions</th></tr>';
		foreach($db->query("SELECT * FROM produit") as $row) {
			echo '<tr>';
			echo '<td>'.$row['produitId'].'</td>';
    			echo '<td>'.$row['nom'].'</td>';
			echo '<td>'.$row['description'].'</td>';
			echo '<td>'.$row['quantite'].'</td>';
			echo '<td>'.$row['prix'].' CHF</td>';
			echo '<td><a href="update_produit.php?id='.$row['produitId'].'" ><button type="button" class="btn btn-primary">Modifier</button> </a><a href="delete_produit.php?id='.$row['produitId'].'" ><button type="button" class="btn btn-danger">Supprimer</button></a></td>';
			echo '</tr>';
		}
		echo '</table>';
	}

?>

<html>
	<head>
		<link rel="stylesheet" href="./style.css"/>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	 <meta charset="UTF-8"/>
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php" style="font-size:26pt;font-color:White">Shop3D</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

        </div><!--/.navbar-collapse -->
      </div>
    </nav>
		<br>
		<br>
		<div class="container">
			<div class="page-header">
	        <h1>Administration</h1>
	      </div>
			<?php
				GetProduitsAdmin();
			?>
			<p>
				<a href="add_produit.php"><button type="button" class="btn btn-primary">Ajouter produit</button></a>
			</p>
		</div>
	</body>
</html>
