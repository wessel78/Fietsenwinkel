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

<div class="page-wrapper">
    <div class="review-container">
      <form id="review-form" class="text-center">
        <div class="form-group">
          <input type="text" class="form-control title" name="reviewTitle" id="titel" aria-describedby="emailHelp" placeholder="Title">
        </div>
        <div class="form-group">
          <textarea cols="30" rows="10" type="text" class="form-control description" name="reviewBody" id="exampleInputPassword1" placeholder="Description"></textarea>
        </div>
        <div class="form-check">
        </div>
        <button id="place-review" type="submit" class="btn btn-primary bg-dark review-btn">Submit</button>
      </form>
    </div>
</div>

<script src="js/beheer/dashboard/placeReview.js"></script>

<?php require "footer.php"; ?>