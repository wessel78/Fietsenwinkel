<?php
    session_start();

    if($_SESSION['login'] == "false")
    {
      header("Location: inlog_pagina.php");
      die();
    }

    require "header.php";
    include "../src/classes/Database.php";
    $db = new Database;
?>

<h1 class="review-title">Plaats uw review:</h1>

<div class="page-wrapper no-align">
    <div class="review-container">
      <form id="review-form" class="text-center">
        <div class="form-group">
          <input type="text" class="form-control title" name="reviewTitle" id="titel" aria-describedby="emailHelp" placeholder="Titel">
        </div>
        <div class="form-group">
          <textarea cols="30" rows="10" type="text" class="form-control description" name="reviewBody" id="exampleInputPassword1" placeholder="Omschrijving"></textarea>
        </div>
        <div class="form-check">
        </div>
        <button id="place-review" type="submit" class="btn btn-primary bg-dark review-btn">Plaats</button>
      </form>
    </div>
</div>

<h1 class="review-title">Reviews</h1>

<hr>

<div class="review-wrapper">



    <?php
    $query = $db->db_getData("SELECT r.review_id, r.review_title, r.review_body, CONCAT(users.firstname, ' ' , users.lastname) AS 'user_name', r.review_date FROM review r INNER JOIN users ON (r.review_user_id = users.user_id) WHERE review_active = 1");
    
    foreach($query as $review) {
        echo "<div class='review-body'><p>Naam: <strong>$review[user_name]</strong></p><p>Titel: $review[review_title]<strong></strong></p><p>Bericht: $review[review_body] <strong></strong></p></div>";
    }

    ?>

</div>



<script src="js/beheer/dashboard/placeReview.js"></script>

<?php require "footer.php"; ?>