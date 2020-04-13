<?php
  if (isset($_SESSION['uName'])) {

    require_once "dbh.inc.php";

    $uId = $_SESSION['uId'];
    $sql = "SELECT * FROM packages_of_translation WHERE ID_user=$uId";

    $results = mysqli_query($conn,$sql);
    if (!mysqli_num_rows($results)>0) {
      echo "<h5>Nie masz jeszcze żadnych nowych pakietów!</h5><h5>Stwórz swój pierwszy!</h5>";
    }else {
      echo '<div class="packages_info d-flex flex-column">';
      while ($row=mysqli_fetch_assoc($results)) {
            echo '<div class="package d-flex justify-content-around align-items-center"><div class="name">'.$row['package_name'].'</div>
                    <div class="d-flex align-items-center">
                      <a href="./game.php?pId='.$row['ID_package'].'&pName='.$row['package_name'].'" class="btn btn-success add_button">Nauka</a>
                      <a href="./packageEdition.php?pId='.$row['ID_package'].'&pName='.$row['package_name'].'" class="btn btn-light add_button">Edytuj</a>
                      <a href="./paction/pDelete.pa.php?pId='.$row['ID_package'].'" class="btn btn-danger add_button">Usuń</a>
                    </div>
                  </div>';
      }
      echo '</div>';
    }
  }else {
    header('Location: ../index.php?error=invalidNameOrPwd&uName='.$uName);
    exit();
  }

?>
