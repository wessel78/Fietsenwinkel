<?php
session_start();
require "header.php";
include "../src/classes/Database.php";
$db = new Database;
?>
<!-- Page title -->
<div class="page-title">
    <h2>Reviews</h2>
</div>

<div class="page-wrapper">
    <div class="page-content-wrapper">
        <!-- Review body -->
        <div class="review-body">
            <p>Naam: </p>
            <p>Title: </p>
            <p>Bericht: </p>

            <button class="btn btn-secondary">Verwijderen</button>
        </div>
        
        <!-- Review body -->
        <div class="review-body">
            <p>Naam: </p>
            <p>Title: </p>
            <p>Bericht: </p>

            <button class="btn btn-secondary">Verwijderen</button>
        </div>
    </div>
</div>


<?php require "footer.php";?>