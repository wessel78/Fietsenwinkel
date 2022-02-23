<?php
    session_start();
    require "header.php";
    include "../src/classes/Database.php";
    $db = new Database;
?>

<div class="page-wrapper">
    <form id="register-form" class="form-signin text-center">
      <input type="name" name="firstName" id="firstName" class="form-control register" placeholder="firstName" required="" autofocus="">
      <input type="lastname" name="lastName" id="lastName" class="form-control register" placeholder="lastName" required="" autofocus="">
      <input type="email" name="email" id="email" class="form-control register" placeholder="Email" required="" autofocus="">
      <input type="username" name="username" id="username" class="form-control register" placeholder="Username" required="" autofocus="">
      <input type="password" name="password1" id="password1" class="form-control register" placeholder="Password" required="">
      <input type="password" name="password2" id="password2" class="form-control register" placeholder="Repeat password" required="">
      <button id="register-btn" class="btn btn-lg btn-primary btn-block bg-dark register-btn" type="submit">Register</button>
    </form>
</div>

<script src="js/login/register/registerAjax.js"></script>

<?php require "footer.php"; ?>