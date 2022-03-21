<?php
session_start();
require "header.php";
include "../src/classes/Database.php";

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$products = $db->query("SELECT * FROM product");


?>

<div class="page-wrapper">
    <div class="page-content-wrapper">

        <?php if ($products->num_rows > 0) {
            while ($product = $products->fetch_assoc()) { ?>
                <div class="fietsen-card">
                    <div class="fietsen-card-header">
                        <img src="img/fiets_img/<?= $product['product_image'] ?>" class="fietse-card-image" alt="Geen afbeelding gevonden">
                    </div>
                    <div class="fietsen-card-title">
                        <p><?= $product['product_title'] ?></p>
                    </div>
                    <div class="fietsen-card-footer">
                        <div class="footer-wrapper">
                            <p>€<?= $product['product_price'] ?></p>
                            <a href="fietsdetail.php?id=<?= $product['product_id'] ?>">Bekijk</a>
                        </div>
                    </div>
                </div>
            <?php }
        } else { ?>
            <p>Geen producten beschikbaar</p>
        <?php } ?>
    </div>
</div>


<?php require "footer.php"; ?>