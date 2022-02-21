<?php
session_start();
require "header.php";
include "../src/classes/Database.php";
$db = new Database;
?>

<div class="page-wrapper">
    <div class="page-content-wrapper">
            <div class="beheer-card-wrapper">
                <!-- Beheer fietsen -->
                <div id="fietsBeheer" class="beheer-card">
                    <i class="fa-solid fa-person-biking"></i>
                </div>
                <p>Beheer fietsen</p>
            </div>
        <!-- Beheer reviews -->
        <div class="beheer-card-wrapper">
            <div id="reviewBeheer" class="beheer-card">
                <i class="fa-solid fa-comment-dots"></i>
            </div>
            <p>Beheer reviews</p>
        </div>
    </div>
</div>


<?php require "footer.php"; ?>

<script>
    let fietsBtn = document.querySelector('#fietsBeheer');
    let reviewBtn = document.querySelector('#reviewBeheer');

    fietsBtn.addEventListener('click', () => {
        window.location.href = "beheerFietsen.php";
    });

    reviewBtn.addEventListener('click', () => {
        window.location.href = "review.php";
    });
</script>