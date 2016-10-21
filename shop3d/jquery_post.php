<?php
require("./mesFonctions.php");

if($_POST["idArticle"]){
  $articleId = $_POST["idArticle"];
  // Here, you can also perform some database query operations with above values.
  //echo "idArticle ". $articleId ."!"; // Success Message
  echo json_encode(getProduit($articleId));
}
?>
