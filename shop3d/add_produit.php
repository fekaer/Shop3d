
<?php

	require("./mesFonctions.php");

	if (isset($_POST['subok'])) {
		addProduit($_POST['add_name'], $_POST['add_desc'], $_POST['add_quant'], $_POST['add_prix'], 1);

		if (isset($_FILES['add_img'])) {
			print("add_img is set");
			$tmp = $_FILES['add_img']['tmp_name'];
			$finalname = 'test.png';
			move_uploaded_file($tmp, './img/'.$finalname);
			header('Location:admin.php');
		} else {
			print("add_img is not set");
		}

		//header("location: /shop3d/admin.php");
	}
?>

<html>
<header>
	<link rel="stylesheet" href="./style.css"/>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
</header>
<body>
<!--<form action="add_produit.php" method="post" id="formAdd" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Nom</td><td>:</td><td><input type="text" name="add_name" class="adminInput" required></td>
		</tr>
		<tr>
			<td>Description</td><td>:</td><td><textarea form="formAdd" name="add_desc" class="adminInput"></textarea></td>
		</tr>
		<tr>
			<td>Quantité</td><td>:</td><td><input type="text" name="add_quant" class="adminInput" required></td>
		</tr>
		<tr>
			<td>Prix</td><td>:</td><td><input type="text" name="add_prix" class="adminInput" required></td>
		</tr>
		<tr>
			<td>Image</td><td>:</td><td><input type="file" name="add_img" class="adminInput" required></td>
		</tr>
		<tr>
			<td></td><td></td><td><input type="submit" value="OK" form="formAdd" name="subok"></td>
		</tr>
	</table>
</form>-->
<div class="container">
	<form action="add_produit.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
		    <label for="exampleInputEmail1">Nom</label>
				<input type="text" class="form-control" name="add_name" placeholder="Nom du produit" required>
		  </div>
			<div class="form-group">
		    <label for="exampleInputPassword1">Description</label>
		    <textarea class="form-control" rows="3" name="add_desc" placeholder="Description du produit"></textarea>
		  </div>
			<div class="form-group">
		    <label for="exampleInputPassword1">Quantité</label>
		    <input type="text" class="form-control" name="add_quant" placeholder="Quantité" required>
		  </div>
			<div class="form-group">
		    <label for="exampleInputPassword1">Prix</label>
		    <input type="text" class="form-control" name="add_prix" placeholder="Prix" required>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputFile">Image</label>
		    <input type="file"  id="exampleInputFile" name="add_img" required>
		    <p class="help-block">Tous les types d'images: PNG, JPG, ...</p>
		  </div>
		  <button type="submit" name="subok" class="btn btn-primary">Submit</button>
	</form>
</div>
</body>
</html>
