<?php
session_start();

if ($_SESSION['login'] == "false") {
  header("Location: inlog_pagina.php");
  die();
}

require "header.php";
$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>

<div class="page-wrapper">

  <?php

  if (!isset($_SESSION['cart'])) {
    echo "<h1>Voeg een product toe aan je winkelwagen</h1>";
  } else {

    $itemString = implode("', '", $_SESSION['cart']);

    $stmt = "SELECT * FROM product where product_id in ('$itemString')";

    $results = $db->query($stmt); 
    
    $shoppingTotal = 0;
    ?>

    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">ProductID</th>
          <th scope="col">Product</th>
          <th scope="col">Price</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          while ($product = $results->fetch_assoc()) { 
          $shoppingTotal += $product['product_price'];
        ?>

          <tr>
            <td>#<?= $product['product_id'] ?></td>
            <td><?= $product['product_title'] ?></td>
            <td>€<?= $product['product_price'] ?></td>
          </tr>

        <?php }

        ?>
        <tr>
          <td><a href="bevestiging.php" style="color: white; text-decoration: none;">Betalen</a></td>
          <td><a href="emptyCart.php" style="color: white; text-decoration: none;">Leegmaken</a></td>
          <td>€<?= $shoppingTotal ?></td>
        </tr>
      </tbody>
    </table>

  <?php } ?>
</div>
<?php require "footer.php"; ?>