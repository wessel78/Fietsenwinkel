<?php
    session_start();
    require "header.php";
    include "../src/classes/Database.php";
    $db = new Database;
?>

<div class="page-wrapper">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ProductID</th>
      <th scope="col">Amount</th>
      <th scope="col">Price</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>fiets1</td>
      <td>2</td>
      <td>1000</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>fiets2</td>
      <td>3</td>
      <td>3000</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>fiets3</td>
      <td>1</td>
      <td>2000</td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td>6000</td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td><button type="button" class="btn btn-dark pay">Betalen</button>
</td>
    </tr>
  </tbody>
</table>
</div>
<?php require "footer.php"; ?>