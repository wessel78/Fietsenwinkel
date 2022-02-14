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
            <div class="beheer-card">
                <i class="fa-solid fa-person-biking"></i>
            </div>
            <p>Beheer fietsen</p>
        </div>

        <!-- Beheer reviews -->
        <div class="beheer-card-wrapper">
            <div class="beheer-card">
                <i class="fa-solid fa-comment-dots"></i>
            </div>
            <p>Beheer reviews</p>
        </div>
    </div>
</div>


<?php require "footer.php";?>