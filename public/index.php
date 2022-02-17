<?php
session_start();
require "header.php";
include "../src/classes/Database.php";
$db = new Database;
?>

<div class="page-wrapper">
    <div class="index-flexbox">
        <div class="text-content">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing.
        </div>
        <div class="photo-content">
            <img src="../public/img/no-image-found.webp" class="companyphoto">
            <p class="info-index">Plaats, land</p>
            <p class="info-index">Adres </p>
            <p class="info-index">postcode</p>
            <p class="info-index">telefoon</p>
            <p class="info-index">email </p>
        </div>
    </div>
</div>


<?php require "footer.php"; ?>