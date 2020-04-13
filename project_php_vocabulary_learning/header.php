<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <title>Nauka języków</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
        <div class="row">
          <div class="col-md-12 col-12 align-content-center d-flex justify-content-around page_header">
              <h3>Nauka angielskiego</h3>
              <?php
                  if (isset($_SESSION['uName'])) {
                    echo '<div class="d-flex align-items-center">
                    <form  action="./includes/logout.inc.php" method="post">
                      <button type="submit" class="btn btn-danger" name="logout-submit">Wyloguj</button>
                    </form>
                      <a href="./userpanel.php" class="btn btn-light add_button">Konto</a>
                      </div>';
                  }
                  else {
                    echo'<div class="d-flex align-items-center">
                      <a href="./index.php" class="btn btn-danger add_button">Zaloguj się</a>
                      <a href="./singup.php" class="btn btn-danger">Załóż konto</a>
                    </div>';
                  }
              ?>
          </div>
        </div>
