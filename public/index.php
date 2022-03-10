<?php
session_start();
require "header.php";
include "../src/classes/Database.php";
$db = new Database;
?>

<div class="page-wrapper">
    <div class="index-flexbox">
        <div class="text-content">
        Een goed, betrouwbaar en betrokken adres voor alle tweewielervragen. Dat is Fietsenwinkel.nl. Vanuit onze een compleet nieuw ingerichte winkel in Wehl bedienen wij al meer dan 60 jaar een zeer trouwe klantenkring. Niet voor niets zie je zoveel fietsen in de regio met een rode sticker van Fietsenwinkel.nl op het achterspatbord. Let er maar eens op!
        Wij vinden het belangrijk om samen de juiste fiets voor u te vinden. Dat betekent dat wij goed luisteren naar uw wensen en u de tijd en ruimte geven om rustig proef te rijden. U kunt bij ons terecht voor alle soorten (elektrische) fietsen, uitsluitend van de beste merken. Of u nu fietst om fit en gezond te blijven, te recreëren of om gewoon comfortabel van A naar B te komen, wij hebben alles in huis om u met een tevreden glimlach op weg te laten gaan.
        </div>
        <div class="photo-content">
            <img src="../public/img/winkel.jpg" class="companyphoto">
            <p class="info-index">Wehl, Nederland</p>
            <p class="info-index">Beatrixplein 8</p>
            <p class="info-index">7031aj</p>
            <p class="info-index">0681602109</p>
            <p class="info-index">email@fietsenwinkel.nl</p>
        </div>
    </div>
</div>


<?php require "footer.php"; ?>