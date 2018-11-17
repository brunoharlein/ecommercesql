<?php
//connexion à la bdd
require "connexion.php";
//delete dans getProducts avec l'id
$request = $bdd->prepare("DELETE FROM getProducts WHERE id= ?");
$request->execute([$_POST["id"]]);
//Redirection
header("Location: delete_form.php");
 ?>
