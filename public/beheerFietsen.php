<?php
    session_start();
    require "header.php";
    include "../src/classes/Database.php";
    $db = new Database;
?>

<div class="page-wrapper">
    <div class="page-content-wrapper">
        <div class="beheer-fietsen-card">
            <div class="beheer-fietsen-card-header">
                <img src="img/no-image-found.webp" alt="Geen afbeelding gevonden">
            </div>
            <div class="beheer-fietsen-card-title">
                <p>Fiets 1</p>
            </div>
            <div class="beheer-fietsen-card-footer">
                <div class="footer-wrapper">
                    <p>$ 499,00</p>
                    <a href="#">Edit</a>
                </div>
            </div>
        </div>

        <div class="beheer-fietsen-card">
            <div class="beheer-fietsen-card-header">
                <img src="img/no-image-found.webp" alt="Geen afbeelding gevonden">
            </div>
            <div class="beheer-fietsen-card-title">
                <p>Fiets 2</p>
            </div>
            <div class="beheer-fietsen-card-footer">
                <div class="footer-wrapper">
                    <p>$ 499,00</p>
                    <a href="#">Edit</a>
                </div>
            </div>
        </div>

        <div class="add-fietsen-card">
            <i class="fa-solid fa-circle-plus"></i>
        </div>
    </div>
</div>


<?php require "footer.php";?>