<?php
require "connexion.php";
//Si le formulaire n'est pas vide on le vérifie
if(!empty($_POST)) {
  $errors ="";
  //On sécurise les entrées du formulaire
  foreach ($_POST as $key => $value) {
    $_POST[$key] = htmlspecialchars($value);
  }

  //On boucle pour vérifier si une valeur est vide
  $isEmpty = false;
  foreach ($_POST as $key => $value) {
    if(empty($value)) {
      $isEmpty = true;
    }
  }
  //Si on a trouvé une valeur vide on ajoute un code erreur
  if($isEmpty) {
    $errors .= "1";
  }

  //Si le nom utilisateur contient moins de 3 lettres
  if(strlen($_POST["user_name"]) < 3) {
    $errors .= "2";
  }
  // $request = $bdd->prepare("SELECT * FROM getUsers WHERE name = ?");
  // $request->execute($_POST[]);
  // $users = $request->fetch(PDO::FETCH_ASSOC);
  //   if($_POST["user_name"] === $users["name"]){
  //     echo "nom deja existant";}
  //   var_dump($users);


  //Si la confirmation du mot de passe n'est pas identique
  if($_POST["user_password"] !== $_POST["user_password_confirm"]) {
    $errors .= "3";
  }
  //Si le mot de passe ne respect pas les critères demandés
  if(!preg_match("#(?=.*[A-Z]{1,})(?=.*[0-9]{1,}).{6,}#", $_POST["user_password"])) {
    $errors .= "4";
  }
  $password = $_POST["user_password"];
  $password = password_hash($password, PASSWORD_DEFAULT);

  $request = $bdd->prepare("INSERT INTO getUsers(name, password, status, sexe) VALUES(:name, :password, :status, :sexe)");
  $request->execute([
    "name" => htmlspecialchars($_POST["user_name"]),
    "password" => htmlspecialchars($password),
    "status" => htmlspecialchars($_POST["user_status"]),
    "sexe" => htmlspecialchars($_POST["user_sexe"])
  ]);
  //Redirige l'utilisateur*
  header("Location: products.php");


  //Si on a stocké des codes erreur on renvoi au formulaire
  if(!empty($errors)){
    session_start();
    $_SESSION["answers"] = $_POST;
    header("Location: register.php?message=$errors");
    exit;
  }
  //Sinon on envoi sur la page de login avec un message de succès
  else {
    header("Location: index.php?success=Compte créé avec succès, vous pouvez vous connecter");
    exit;
  }
}
//Si le formulaire est vide on renvoi vers la page register
else {
  header("Location: register.php?message=0");
  exit;
}

 ?>
