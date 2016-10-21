<?php
	include('mesFonctions.php');

	if(isset($_POST['add_name'])){
		$produitId=$_GET['id'];;
		$nom=addslashes($_POST['add_name']);
		$description=addslashes($_POST['add_desc']);
		$quantite=$_POST['add_quant'];
		$prix=$_POST['add_prix'];
		$id_rayon=$_POST['add_id_rayon'];
	}else{
		$produitId="";
		$nom="";
		$description="";
		$quantite="";
		$prix="";
		$id_rayon="";
	}


	if (isset($_POST['subok'])) {
		UpDateProduit($produitId, $nom, $description, $quantite, $prix, $id_rayon);
		header("location: /shop3d/admin.php");
	}


	function readProduct() {
		$idProductEdit = $_GET['id'];
		$baddress  = 'localhost';
		$buser     = 'root';
		$bpassword = '';
		$bname     = 'shop3d';

		$db = new PDO("mysql:host=$baddress;dbname=$bname", $buser, $bpassword );


		foreach($db->query("SELECT * FROM produit WHERE produitId='$idProductEdit'") as $row) {
			$produitId=$row['produitId'];
			$nom=$row['nom'];
			$description=$row['description'];
			$quantite=$row['quantite'];
			$prix=$row['prix'];
			$id_rayon="1";

				echo '<div class="form-group">';
				echo '<label for="exampleInputEmail1">Nom</label>';
				echo '<input type="text" class="form-control" name="add_name" value='.$nom=$row['nom'].' placeholder="Nom du produit" required>';
				echo '</div>';
				echo '<div class="form-group">';
				echo '<label for="exampleInputEmail1">Description</label>';
				echo '<textarea class="form-control" rows="3" name="add_desc" placeholder="Description du produit">'.$description.'</textarea>';
				echo '</div>';
				echo '<div class="form-group">';
				echo '<label for="exampleInputEmail1">Quantité</label>';
				echo '<input type="text" class="form-control" name="add_quant" value='.$quantite.' placeholder="Quantité" required>';
				echo '</div>';
				echo '<div class="form-group">';
				echo '<label for="exampleInputEmail1">Prix</label>';
				echo '<input type="text" class="form-control" name="add_prix" value='.$prix.' placeholder="Prix" required>';
				echo '</div>';
				echo '<div class="form-group">';
				echo '<label for="exampleInputEmail1">Id rayon</label>';
				echo '<input type="text" class="form-control" name="add_id_rayon" value='.$id_rayon.' placeholder="ID du rayon" required>';
				echo '</div>';

				?>
					<button type="submit" name="subok" class="btn btn-primary">Modifier</button>
					<a href="/shop3d/admin.php"><button type="submit" name="subok" class="btn btn-warning">Annuler</button></a>


				<?php
				echo "</tr>";
			echo "</table>";
		}


	}
?>

<html>
<header>
	<link rel="stylesheet" href="./style.css"/>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
</header>
<div class="container">
	<form action="update_produit.php?id=<?php echo $_GET['id']; ?>" method="post" id="formAdd">
		<?php
			readProduct();
		?>
	</form>
<div>
