<?php
  require_once "header.php";
  if (isset($_SESSION['uName'])) {
?>
<div class="row">
      <div class="col-md-2 col-1"></div>
        <div class="col-md-8 col-10 d-flex flex-column align-items-center main_content">
            <div class="user_info">
              <h4>Witaj <?php echo $_SESSION['uName'];?>!</h4>
            </div>
          <?php require_once "./includes/packageButtoms.inc.php"; ?>
          <a href="./packageEdition.php" class="btn btn-light add_button">Dodaj pakiet</a>
        </div>
      <div class="col-md-2 col-1"></div>
</div>
<?php
  }else {
    header('Location: ./index.php');
    exit();
  }
  require_once "footer.php";
?>
