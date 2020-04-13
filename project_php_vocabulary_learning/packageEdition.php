<?php
require_once "header.php";
if (isset($_SESSION['uName'])) {
  unset($_SESSION['pId']);
  unset($_SESSION['pName']);
?>
  <div class="row">
    <div class="col-md-2 col-0"></div>
    <div class="col-md-8 col-12 d-flex flex-column align-items-center main_content">
      <p id="info"></p>
      <?php require_once "./includes/packageStock.inc.php"; ?>
    </div>
   <div class="col-md-2 col-0"></div>
  </div>
  <script type='text/javascript' src="./js/addElem.js"></script>
<?php
} else {
  header('Location: ./index.php');
  exit();
}
require_once "footer.php";
?>