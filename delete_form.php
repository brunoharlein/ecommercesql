<?php
session_start();
// connexion à la BDD
require "connexion.php";
// requete de la BDD
$request = $bdd ->query("SELECT id, name FROM getProducts");
// extraction de la bdd avec un fetchall
$products = $request->fetchall(PDO::FETCH_ASSOC);

require "Template/header.php";
 ?>
 <main class="container my-5">
   <h2>Deleter un produit</h2>
   <ul>
   <?php
   //affiche les produits de la BDD
    foreach ($products as $key => $product) {
      echo "<lo>" . $product["name"] . "</lo>";
   ?>
    <form action="delete_operation.php" method="post">
      <input type="hidden" name="id" value=<?php echo $product["id"]; ?>>
    <?php
    if ($_SESSION["user"]["status"]==="admin"){
      echo "<input type='submit' value='delete'>";
    }
    else {
      echo "Vous n'avez pas les droits pour deleter un produit";
    }
    ?>
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
