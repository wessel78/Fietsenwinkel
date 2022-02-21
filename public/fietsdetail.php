<?php
session_start();
require "header.php";
include "../src/classes/Database.php";
$db = new Database;
?>

<div class="page-wrapper">
    <div class="page-content-wrapper detailsbikepage">
    <div class="detailimage"><img class="detailimagesrc" src="img/no-image-found.webp" alt="Geen afbeelding gevonden"> </div>
    <br>
    <div class="detailbike">
    <h1>Title of product</h1>
    <br>
    <h1>Color of product</h1>
    <br>
    <h1>$price</h1>
    <br>
    <button type="button" class="btn btn-secondary btn-lg">Add to card</button>
    </div>
    <div class="bikedetails">
     Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, reprehenderit mollitia veniam dolor exercitationem ullam dolorum reiciendis praesentium vero neque quae magnam, perferendis iure ex, voluptatem vitae nemo? Corrupti, laborum!
    </div>
    </div>
</div>

<?php require "footer.php";?>