<?php

  # code...
  include "header.php";
  if (!isset($_SESSION['uName'])){
?>
<div class="row">
      <div class="col-md-2 col-1"></div>
        <div class="col-md-8 col-10 d-flex flex-column align-items-center main_content">
          <h3>Logowanie</h3>
          <p id="info"></p>
            <form class="logsingform d-flex flex-column align-items-center" action="./includes/login.inc.php" method="post">
              <input type="text" name="userName" placeholder="Nazwa użytkownika"> <br>
              <input type="password" name="pwd" placeholder="Hasło"><br>
              <button class="btn btn-light add_button" type="submit" name="login-submit">Zaloguj</button>
            </form><br>
        </div>
      <div class="col-md-2 col-1"></div>
</div>
<script src="./js/errors/errors.err.js"></script>
<?php
  } else {
    header('Location: ./userpanel.php');
    exit();
  }
  include "footer.php";
?>
