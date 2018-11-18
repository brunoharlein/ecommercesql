<?php
session_start();
//Connexion à la base de données
require_once "connexion.php";

//Requete en base de données
$request = $bdd->prepare("INSERT INTO getProducts(name, price, stock, description, category, made_in) VALUES(:name, :price, :stock, :description, :category, :made_in)");
$request->execute([
  "name" => $_POST["name"],
  "price" => $_POST["price"],
  "stock" => $_POST["stock"],
  "description" => $_POST["description"],
  "category" => $_POST["category"],
  "made_in" => $_POST["madein"]
]);
//Redirige l'utilisateur*
header("Location: add_form.php");

 ?>
