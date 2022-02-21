<?php
session_start();
require "header.php";
include "../src/classes/Database.php";
$db = new Database;
$stmt = "SELECT * FROM products";
$results = $db->db_getData($stmt);
?>

<div class="page-wrapper">
    <div class="page-content-wrapper">

        <?php
        if ($results) {
            foreach ($results as $result) {  ?>

                <div class="fietsen-card">
                    <div class="fietsen-card-header">
                        <img src="<?= $result['product_image'] ?>" alt="Geen afbeelding gevonden">
                    </div>
                    <div class="fietsen-card-title">
                        <p><?= $result['product_title'] ?></p>
                    </div>
                    <div class="fietsen-card-footer">
                        <div class="footer-wrapper">
                            <p>€<?= $result['product_price'] ?></p>
                            <a href="<?= $result['product_id'] ?>">Add</a>
                        </div>
                    </div>
                </div>

        <?php }
        }
        ?>



        <!-- <div class="fietsen-card">
            <div class="fietsen-card-header">
                <img src="img/no-image-found.webp" alt="Geen afbeelding gevonden">
            </div>
            <div class="fietsen-card-title">
                <p>Fiets 2</p>
            </div>
            <div class="fietsen-card-footer">
                <div class="footer-wrapper">
                    <p>$ 499,00</p>
                    <a href="#">Add</a>
                </div>
            </div>
        </div>
        <div class="fietsen-card">
            <div class="fietsen-card-header">
                <img src="img/no-image-found.webp" alt="Geen afbeelding gevonden">
            </div>
            <div class="fietsen-card-title">
                <p>Fiets 3</p>
            </div>
            <div class="fietsen-card-footer">
                <div class="footer-wrapper">
                    <p>$ 499,00</p>
                    <a href="#">Add</a>
                </div>
            </div>
        </div>
        <div class="fietsen-card">
            <div class="fietsen-card-header">
                <img src="img/no-image-found.webp" alt="Geen afbeelding gevonden">
            </div>
            <div class="fietsen-card-title">
                <p>Fiets 4</p>
            </div>
            <div class="fietsen-card-footer">
                <div class="footer-wrapper">
                    <p>$ 499,00</p>
                    <a href="#">Add</a>
                </div>
            </div>
        </div>
        <div class="fietsen-card">
            <div class="fietsen-card-header">
                <img src="img/no-image-found.webp" alt="Geen afbeelding gevonden">
            </div>
            <div class="fietsen-card-title">
                <p>Fiets 5</p>
            </div>
            <div class="fietsen-card-footer">
                <div class="footer-wrapper">
                    <p>$ 499,00</p>
                    <a href="#">Add</a>
                </div>
            </div>
        </div>
        <div class="fietsen-card">
            <div class="fietsen-card-header">
                <img src="img/no-image-found.webp" alt="Geen afbeelding gevonden">
            </div>
            <div class="fietsen-card-title">
                <p>Fiets 6</p>
            </div>
            <div class="fietsen-card-footer">
                <div class="footer-wrapper">
                    <p>$ 499,00</p>
                    <a href="#">Add</a>
                </div>
            </div>
        </div>
        <div class="fietsen-card">
            <div class="fietsen-card-header">
                <img src="img/no-image-found.webp" alt="Geen afbeelding gevonden">
            </div>
            <div class="fietsen-card-title">
                <p>Fiets 7</p>
            </div>
            <div class="fietsen-card-footer">
                <div class="footer-wrapper">
                    <p>$ 499,00</p>
                    <a href="#">Add</a>
                </div>
            </div>
        </div>
        <div class="fietsen-card">
            <div class="fietsen-card-header">
                <img src="img/no-image-found.webp" alt="Geen afbeelding gevonden">
            </div>
            <div class="fietsen-card-title">
                <p>Fiets 8</p>
            </div>
            <div class="fietsen-card-footer">
                <div class="footer-wrapper">
                    <p>$ 499,00</p>
                    <a href="#">Add</a>
                </div>
            </div>
        </div>
        <div class="fietsen-card">
            <div class="fietsen-card-header">
                <img src="img/no-image-found.webp" alt="Geen afbeelding gevonden">
            </div>
            <div class="fietsen-card-title">
                <p>Fiets 9</p>
            </div>
            <div class="fietsen-card-footer">
                <div class="footer-wrapper">
                    <p>$ 499,00</p>
                    <a href="#">Add</a>
                </div>
            </div>
        </div>
        <div class="fietsen-card">
            <div class="fietsen-card-header">
                <img src="img/no-image-found.webp" alt="Geen afbeelding gevonden">
            </div>
            <div class="fietsen-card-title">
                <p>Fiets 10</p>
            </div>
            <div class="fietsen-card-footer">
                <div class="footer-wrapper">
                    <p>$ 499,00</p>
                    <a href="#">Add</a>
                </div>
            </div>
        </div> -->
    </div>
</div>


<?php require "footer.php"; ?>