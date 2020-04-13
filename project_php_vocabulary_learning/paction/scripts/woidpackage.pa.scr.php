<?php

    $sql="INSERT INTO packages_of_translation (package_name, ID_user) VALUES (?,?)";
      $stmt=mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt,$sql)) {
        header('Location: ../packageEdition.php?error=sqlerror');
        exit();
      }
      mysqli_stmt_bind_param($stmt,"si",$pName,$uId);
      mysqli_stmt_execute($stmt);
      $ID_package = mysqli_stmt_insert_id($stmt);
      mysqli_stmt_close($stmt);

    for ($i=0; $i <count($words[0]) ; $i++) {
      if (!empty($words[0][$i]) && !empty($words[1][$i])) {
      $sql = "SELECT * FROM words_in_pl WHERE word_in_pl=?";
      $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
          header('Location: ../packageEdition.php?error=sqlerror');
          exit();
        }
            mysqli_stmt_bind_param($stmt,"s",$words[0][$i]);
            mysqli_stmt_execute($stmt);
            $results=mysqli_stmt_get_result($stmt);
        if ($row=mysqli_fetch_assoc($results)) {
            $ID_word_in_pl=$row['ID_word_in_pl'];
        }else{
            $sql="INSERT INTO words_in_pl (word_in_pl) VALUES (?)";
            $stmt=mysqli_stmt_init($conn);
              if (!mysqli_stmt_prepare($stmt,$sql)) {
                header('Location: ../packageEdition.php?error=sqlerror');
                exit();
        }
          mysqli_stmt_bind_param($stmt,"s",$words[0][$i]);
          mysqli_stmt_execute($stmt);
          $ID_word_in_pl = mysqli_stmt_insert_id($stmt);
          mysqli_stmt_close($stmt);
      }


      $sql = "SELECT * FROM words_in_en WHERE word_in_en=?";
      $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
          header('Location: ../packageEdition.php?error=sqlerror');
          exit();
        }
        mysqli_stmt_bind_param($stmt,"s",$words[0][$i]);
        mysqli_stmt_execute($stmt);
        $results=mysqli_stmt_get_result($stmt);
        if ($row=mysqli_fetch_assoc($results)) {
          $ID_word_in_en=$row['ID_word_in_en'];
        }else{
          $sql="INSERT INTO words_in_en (word_in_en) VALUES (?)";
          $stmt=mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt,$sql)) {
            header('Location: ../packageEdition.php?error=sqlerror');
            exit();
          }
          mysqli_stmt_bind_param($stmt,"s",$words[1][$i]);
          mysqli_stmt_execute($stmt);
          $ID_word_in_en = mysqli_stmt_insert_id($stmt);
          mysqli_stmt_close($stmt);
        }
        $sql="INSERT INTO translations_pl_en (ID_word_in_pl,ID_word_in_en,ID_package) VALUES ($ID_word_in_pl,$ID_word_in_en,$ID_package)";
          mysqli_query($conn,$sql);
        }
      }
 ?>
