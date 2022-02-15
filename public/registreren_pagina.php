<?php
    session_start();
    require "header.php";
    include "../src/classes/Database.php";
    $db = new Database;
?>

<div class="page-wrapper">
<form class="form-signin text-center">
      <input type="email" id="inputEmail" class="form-control" placeholder="Username" required="" autofocus="">
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
      <button class="btn btn-lg btn-primary btn-block bg-dark" type="submit">Register</button>
    </form>
</div>
   

<?php require "footer.php"; ?>