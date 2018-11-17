<?php
// connexion à la bdd ecommerce
require "connexion.php";
//On vérifie si le formulaire a été rempli
if(!empty($_POST)) {
  //On nettoie les entrées du formulaire
  foreach ($_POST as $key => $value) {
    $_POST[$key] = htmlspecialchars($value);
  }
  // Je requete la BDD pour tout selectionner dans la table getUsers
  $request = $bdd -> query("SELECT * FROM getUsers");
  // extraction des données de $request pour $users via le fetchall
  $users = $request -> fetchall (PDO :: FETCH_ASSOC);
  //On vérifie si on trouve une correspondance avec les infromations du formulaire
  // $password = $_POST["user_password"];
  foreach ($users as $user) {
    // $correctPassword = password_verify($password, $user["password"]);
    if($user["name"] === $_POST["user_name"] && $user["password"] === $_POST["user_password"]) {
      // if ($correctPassword == true){

      //Si c'est le cas on démarre une session pour y stocker les informations de l'utilisateur
      session_start();
      $_SESSION["user"] = $user;
      $_SESSION["basket"] = [];
      $_SESSION["basketAmount"] = 0;
      header("Location: products.php");
      //On met un exit pour arrêter l'execution du script, autrement la redirection n'aura pas le temps de se faire
      exit;
    }
  }
  header("Location: index.php?message=Nous n'avons aucun utilisateur avec ce nom ou ce mot de passe");
  exit;
}
//Si le formulaire n'est pas rempli on renvoie l'utilisateur sur la page de login avce un message
else {
  header("Location: index.php?message=Vous devez remplir les champs du formulaire");
  exit;
}

 ?>
