<?php
session_start();
require "header.php";
include "../src/classes/Database.php";

$product_id = null;

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
}

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$products = $db->query("SELECT * FROM product WHERE product_id = " . $product_id);

if ($products->num_rows > 0) {
    $product = $products->fetch_assoc();
}
?>

<div class="page-wrapper">
    <div class="page-content-wrapper detailsbikepage">
        <div class="detailimage"><img class="detailimagesrc" src="img/fiets_img/<?= $product['product_image'] ?>" alt="Geen afbeelding gevonden"> </div>
        <br>
        <div class="detailbike">
            <h1><?= $product['product_title'] ?></h1>
            <br>
            <h1><?= $product['product_color'] ?></h1>
            <br>
            <h1>€<?= $product['product_price'] ?></h1>
            <br>
            <button type="button" id="addToCart" data-id="<?= $product['product_id'] ?>" class="btn btn-secondary btn-lg">Add to card</button>
        </div>
        <div class="bikedetails">
            <?= $product['product_description'] ?>
        </div>
    </div>
</div>

<script src="js/klant/addToCart.js"></script>

<?php require "footer.php"; ?>