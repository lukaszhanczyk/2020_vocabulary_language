<?php
  if (isset($_SESSION['uId'])&&isset($_SESSION['uName'])) {

    if (isset($_GET['pId'])&&isset($_GET['pName'])) {

      require_once "dbh.inc.php";

      $pId=$_GET['pId'];
      $pName=$_GET['pName'];
      $_SESSION['pId']=$pId;
      $_SESSION['pName']=$pName;

      $sql="SELECT words_in_pl.word_in_pl, words_in_en.word_in_en
            FROM words_in_en
            INNER JOIN (words_in_pl
              INNER JOIN translations_pl_en
              ON words_in_pl.ID_word_in_pl = translations_pl_en.ID_word_in_pl)
            ON words_in_en.ID_word_in_en = translations_pl_en.ID_word_in_en
            WHERE translations_pl_en.ID_package=?";
      $stmt=mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: ./userpanel.php?error=sqlError");
        exit();
      }else{
        echo '<form id="words"class="packages_info d-flex flex-column" action="./paction/pAdd.pa.php" method="post">
                <div class="user_info">
                  Nazwa <input type="text" name="package_name" value="'.$pName.'" placeholder="Nazwa pakietu"><br>
                </div>
                <div class="package d-flex justify-content-around align-items-center">
                        <h5>Przód</h5><h5>Tył</h5><a href="./userpanel.php" class="btn btn-light">Cofnij</a>
                </div>';

        mysqli_stmt_bind_param($stmt,"i",$pId);
        mysqli_stmt_execute($stmt);
        $results = mysqli_stmt_get_result($stmt);
          while ($row = mysqli_fetch_assoc($results)) {
            echo '<div class="package d-flex justify-content-around align-items-center">
                    <input type="text" class="inp" name="word_in_pl[]" value="'.$row['word_in_pl'].'"><input type="text" class="inp" name="word_in_en[]" value="'.$row['word_in_en'].'">
                    <button type="button" class="delElem btn btn-light add_button">x</button>
              </div>';
            }
          echo '<div class="package d-flex justify-content-around align-items-center">
                  <input type="text" class="inp" name="word_in_pl[]" vlaue=" "><input type="text" class="inp" name="word_in_en[]" vlaue=" ">
                  <button type="button" class="delElem btn btn-light add_button">x</button>
                </div>
                <div id="added">
                </div>
                <button type="button" id="addElem" class="btn btn-light add_button">Dodaj fiszkę</button>
                <button type="submit" name="edition-submit" class="btn btn-success add_button">Zapisz</button>
                </form>';
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }else {
    echo'<form id="words"class="packages_info d-flex flex-column" action="./paction/pAdd.pa.php" method="post">
            <div class="user_info">
              Nazwa <input type="text" name="package_name" placeholder="Nazwa pakietu"><br>
            </div>
            <div class="package d-flex justify-content-around align-items-center">
                  <h5>Przód</h5><h5>Tył</h5><a href="./userpanel.php" class="btn btn-light">Cofnij</a>
            </div>
            <div class="package d-flex justify-content-around align-items-center">
                <input type="text" class="inp" name="word_in_pl[]" vlaue=" "><input type="text" class="inp" name="word_in_en[]" vlaue=" ">
                <button type="button" class="delElem btn btn-light add_button">x</button>
            </div>
            <div id="added">
            </div>
            <button type="button" id="addElem" class="btn btn-light add_button">Dodaj fiszkę</button>
            <button type="submit" name="edition-submit" class="btn btn-success add_button">Zapisz</button>
            </form>';
  }
  }else {
    header('Location: ../index.php');
    exit();
  }

?>
