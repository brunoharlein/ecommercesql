<?php
session_start();
//Connexion à la base de données
require_once "connexion.php";
 ?>

<!-- Template loading -->
<?php
  require "template/header.php";
 ?>

 <!-- Main Content -->
 <main class="container my-5">
   <h2>Enregistrer un article</h2>
   <form action="add.php" method="post">
     <p>Nom du produit :
       <input type="text" name="name">
     </p>
     <p>Prix :
       <input type="number" name="price">
     </p>
     <p>Disponibilité :
       <input type="radio" name="stock" value="1">Disponible
       <input type="radio" name="stock" value="0">Indisponible
     </p>
     <p>Description :
       <textarea name="description"></textarea>
     </p>
     <p>Catégorie :
       <input type="text" name="category">
     </p>
     <p>Lieu de production :
       <input type="text" name="madein">
     </p>
     <input type="submit" name="ajoutProduit" value="Enregistrer">
   </form>
 </main>
 <!-- Footer loading -->
 <?php
   require "template/footer.php";
  ?>
