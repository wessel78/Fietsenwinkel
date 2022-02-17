<?php
    session_start();
    require "header.php";
    include "../src/classes/Database.php";
    $db = new Database;
?>

<div class="page-wrapper">
<form class="form-signin text-center">
      <input type="email" id="inputEmail" class="form-control inlog" placeholder="Username" required="" autofocus="" >
      <input type="password" id="inputPassword" class="form-control inlog" placeholder="Password" required="">
      <button class="btn btn-lg btn-primary btn-block bg-dark inlog-btn" type="submit">Sign in</button>
    </form>
</div>
   

<?php require "footer.php"; ?>