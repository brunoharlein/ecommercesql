<?php
session_start();
//Connexion à la base de données
require_once "connexion.php";
//Requete la base de données
$request = $bdd->query("SELECT id, name FROM getProducts");
//Extraction des informations
$products = $request->fetchall(PDO::FETCH_ASSOC);
 ?>

<!-- Template loading -->
<?php
  require "Template/header.php";
 ?>

 <!-- Main Content -->
 <main class="container my-5">
   <h2>deleter un produit</h2>
   <ul>
   <?php
   //Affiche les produits récupérés en BDD
    foreach ($products as $key => $product) {
      echo "<li>" . $product["name"] . "</li>";
   ?>
    <form action="delete_operation.php" method="post">
      <input type="hidden" name="id" value=<?php echo $product["id"]; ?>>
      <input type="submit" value="Supprimer">
    </form>
    <?php
      }
    ?>
    </ul>
 </main>
 <!-- Footer loading -->
 <?php
   require "Template/footer.php";
  ?>
