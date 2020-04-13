<?php
require_once "header.php";
?>
<div class="row">
  <div class="col-md-2 col-1"></div>
  <div class="col-md-8 col-10 d-flex flex-column align-items-center main_content">
    <h3>Załóż konto</h3><br>
    <p id="info"></p>
    <form class="logsingform d-flex flex-column align-items-center" action="./includes/singup.inc.php" method="post">
      <input type="text" name="userName" placeholder="Nazwa użytkownika"><br>
      <input type="text" name="userEmail" placeholder="Email"><br>
      <input id="pwd" type="password" name="pwd" placeholder="Hasło"><br>
      <input id="pwd-repeat" type="password" name="pwd-repeat" placeholder="Powtórz hasło"><br>
      <p id="pwdInfo"></p>
      <button class="btn btn-light add_button" type="submit" name="singup-submit">Załóż</button>
    </form><br>

  </div>
  <div class="col-md-2 col-1"></div>
</div>
<script type='text/javascript' src="./js/checkPassword.js"></script>
<script src="./js/errors/errors.err.js"></script>
<?php
require_once "footer.php";
?>