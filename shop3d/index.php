<?php
	require("./mesFonctions.php");

	include_once 'mesFonctions.php';
	session_start();
	$error = "";

	if(isset($_POST['password'])&&isset($_POST['username_'])){
		$password = $_POST['password'];
		$username = $_POST['username_'];
		$reponse = connection_client($username, sha1($password));
		if($reponse){
			$_SESSION['username'] = $username;
			$_SESSION['password'] = sha1($password);
		}else{
			$error = "Connection erroné";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Shop 3D</title>
		<link rel="stylesheet" href="./style.css"/>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/css/bootstrap-theme.css">
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
		<style>


			#blocker {

				position: absolute;
				color: #ffffff;
				text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
				top: 0px;
				width: 100%;
				height: 100%;
				left: 0px;
				//background-color: rgba(0,0,0,0.5);

			}

			#instructions {

				position: absolute;

				top: 0;
				width: 100%;
				height: 100%;

				display: -webkit-box;
				display: -moz-box;
				display: box;

				-webkit-box-orient: horizontal;
				-moz-box-orient: horizontal;
				box-orient: horizontal;

				-webkit-box-pack: center;
				-moz-box-pack: center;
				box-pack: center;

				-webkit-box-align: center;
				-moz-box-align: center;
				box-align: center;

				color: #ffffff;
				text-align: center;
				text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
				cursor: pointer;
				background-color: rgba(0,0,0,0.5);

			}

			#divimg {
				position: absolute;

				top: 41%;
				width: 100%;
				height: auto;
				left: 0px;
				display: -webkit-box;
				display: -moz-box;
				display: box;

				-webkit-box-orient: horizontal;
				-moz-box-orient: horizontal;
				box-orient: horizontal;

				-webkit-box-pack: center;
				-moz-box-pack: center;
				box-pack: center;

				-webkit-box-align: center;
				-moz-box-align: center;
				box-align: center;

				color: #ffffff;
				text-align: center;
			}

			#cible {
				display: table-cell;
  			vertical-align: middle;

			}

		</style>
	</head>
	<body>
		<?php include 'nav.php'; ?>
		<div class="container">

			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
						<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h1 class="modal-title">Information sur un article</h1>
						</div>
						<div id="test" class="modal-body">
							<!--<input type="text"id="articleId" name="articleId"/>-->
							<h3 id="productname" name="productname"></h3>
							<img id="productimg" src="" alt="No image found" style="width: 200px; height: 200px;"/>
							<h3>Description</h3>
							<p id="productdescription" name="productdescription"></p>
							<h3>Prix</h3>
							<p id="productprice" name="productprice"></p>
							<input type="number" id="productquantite" min="1" max="100" value='1' step='1'/>
							<input type="hidden" id="productname2" />
						</div>
						<div class="modal-footer">
							<button id="add" type="button" class="btn btn-default" data-dismiss="modal" onclick="addPanier()">Add</button>
							<button id="test" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<main>
				<div id="main_panier">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title" style="font-size:24pt;">Panier</h2>
						</div>
						<div id="search">
							<form class="navbar-form navbar-left">
								<div class="form-group">
									<input type="text" placeholder="Produit" class="form-control" onkeyup="showProduitsStartWith(this.value)" id="searchbar"/>
								</div>
							</form><br/><br/>
							<div id="searchdiv"></div>
						</div>
						
						<script type="text/javascript">

							function addPanier()
								{
									var name_produit = document.getElementById('productname2').value;
									var quantite_produit = document.getElementById('productquantite').value;
									var price_produit = document.getElementById('productprice').innerHTML;

									var table = document.getElementById("table_course");

									// Insert new row :
									var row = table.insertRow(-1);

									// Insert new cells :
									var cell1 = row.insertCell(0);
									var cell2 = row.insertCell(1);
									var cell3 = row.insertCell(2);
									var cell4 = row.insertCell(3);

									// Add some text to the new cells:
									cell1.innerHTML = name_produit;
									cell2.innerHTML = quantite_produit;
									cell3.innerHTML = price_produit+'.-';
									cell4.innerHTML = '<img src="./img/cross.png" onclick="deleteRow(this);" class="delbt"/>';
									cell4.className = 'delitem';

									document.getElementById("searchdiv").innerHTML= "";
									document.getElementById("searchbar").value="";

								}

						</script>
						<div class="panel-body" id="liste_courses">
							<table class="table table-hover" id="table_course">
								<tr>
									<th>Article</th><th>Nombre</th><th>Prix/unité</th><th>Enlever</th>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div id="main_3d">
						<?php
							include('./shop3d.html');
						?>
				</div>
			</main>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<hr>
			<footer>
				<p>&copy; 2016 FekaTeam, Inc.</p>
			</footer>
		</div>
		<!-- Modal -->

		<!--<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>-->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="shop3d.js"></script>
	</body>
</html>
