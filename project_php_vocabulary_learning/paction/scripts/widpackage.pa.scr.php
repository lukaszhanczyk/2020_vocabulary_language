<?php
$pId=$_SESSION['pId'];
$i=0;
$sql="UPDATE packages_of_translation SET package_name=? WHERE ID_package=$pId";
  $stmt=mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)) {
    header('Location: ../packageEdition.php?error=sqlerror1');
    exit();
  }
  mysqli_stmt_bind_param($stmt,"s",$pName);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

    $sql="SELECT * FROM translations_pl_en WHERE ID_package=$pId";
    $results=mysqli_query($conn,$sql);
    $numRows=mysqli_num_rows($results);
    echo"<pre>";
    print_r($results);
    echo"</pre>";
    while ($row=mysqli_fetch_assoc($results)) {
      $ID_translation= $row['ID_translation'];
      $ID_word_in_pl = $row['ID_word_in_pl'];
      $ID_word_in_en = $row['ID_word_in_en'];
      
      if(!empty($words[0][$i])&&!empty($words[1][$i])){

        $sql = "SELECT * FROM words_in_pl WHERE word_in_pl=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header('Location: ../packageEdition.php?error=sqlerror');
          exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $words[0][$i]);
        mysqli_stmt_execute($stmt);
        $check = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        if ($row = mysqli_fetch_assoc($check)) {
      echo "<pre>";
      print_r($row);
      echo "</pre>";
        $pl = $row['ID_word_in_pl'];
          $sql = "UPDATE translations_pl_en SET ID_word_in_pl=$pl WHERE ID_translation=$ID_translation";
          mysqli_query($conn, $sql);
        } else {  
        $sql="UPDATE words_in_pl SET word_in_pl=? WHERE ID_word_in_pl=$ID_word_in_pl";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
          header('Location: ../packageEdition.php?error=sqlerror1');
          exit();
        }
        mysqli_stmt_bind_param($stmt,"s",$words[0][$i]);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        }
        $sql = "SELECT * FROM words_in_en WHERE word_in_en=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header('Location: ../packageEdition.php?error=sqlerror');
          exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $words[1][$i]);
        mysqli_stmt_execute($stmt);
        $check = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        if ($row = mysqli_fetch_assoc($check)) {
          $en = $row['ID_word_in_en'];
          $sql = "UPDATE translations_pl_en SET ID_word_in_en=$en WHERE ID_translation=$ID_translation";
          mysqli_query($conn, $sql);
        } else {  
        $sql="UPDATE words_in_en SET word_in_en=? WHERE ID_word_in_en=$ID_word_in_en";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
          header('Location: ../packageEdition.php?error=sqlerror1');
          exit();
        } 
        mysqli_stmt_bind_param($stmt,"s",$words[1][$i]);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
       }
        
      } else {
       $sql = "DELETE FROM translations_pl_en WHERE ID_translation=$ID_translation";
       echo "1";
       mysqli_query($conn, $sql);
      }
      $i++;
    }

    if ($i<(count($words[0]))) {
      for (; $i <count($words[0]) ; $i++) {
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
              mysqli_stmt_bind_param($stmt,"s",$words[1][$i]);
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
              $sql="INSERT INTO translations_pl_en (ID_word_in_pl,ID_word_in_en,ID_package) VALUES ($ID_word_in_pl,$ID_word_in_en,$pId)";
                mysqli_query($conn,$sql);
              }
        }
    }
