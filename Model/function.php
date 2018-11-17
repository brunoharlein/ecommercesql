<?php
//Fonction qui sur la base d'un id et de la fonction getProducts renvoie un seul produit
// function getProduct($id) {
//   $products = getProducts();
//   return $products[$id];
// }
function add_product($bdd) {
  $id = intval(htmlspecialchars($_GET["id"]));
  $request = $bdd -> prepare("SELECT * FROM getProduct WHERE id = ?");
  $request -> execute ([$id]);
  $product = $request -> fetch (PDO :: FETCH_ASSOC);
}
 ?>
