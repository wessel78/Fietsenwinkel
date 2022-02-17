<?php
    session_start();
    require "header.php";
    include "../src/classes/Database.php";
    $db = new Database;
?>

<div class="page-wrapper">
    <div class="review-container">
    <form class="text-center">
  <div class="form-group">
    <input type="text" class="form-control title" id="titel" aria-describedby="emailHelp" placeholder="Title">
  </div>
  <div class="form-group">
    <textarea cols="30" rows="10" type="text" class="form-control description" id="exampleInputPassword1" placeholder="Description"></textarea>
  </div>
  <div class="form-check">
  </div>
  <button type="submit" class="btn btn-primary bg-dark review-btn">Submit</button>
</form>
    </div>
</div>

<?php require "footer.php"; ?>