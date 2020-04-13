<?php
  session_start();
  if (isset($_POST['edition-submit'])) {

   if (isset($_SESSION['uId'])&&isset($_SESSION['uName'])){

     if (isset($_POST['word_in_pl'])&&isset($_POST['word_in_en'])) {

       if (!empty($_POST['package_name'])) {

         $pName=$_POST['package_name'];

        }else {

          $pName="Bez nazwy";

        }

        require_once "../includes/dbh.inc.php";
           $uId=$_SESSION['uId'];
           $word_in_pl=$_POST['word_in_pl'];
           $word_in_en=$_POST['word_in_en'];
           $words = [[],[]];
        
        foreach ($word_in_pl as $key => $value) {
            $words[0][$key]=$value;
        }


        foreach ($word_in_en as $key => $value) {
            $words[1][$key] = $value;
        }

        if (isset($_SESSION['pId'])) {

          require_once './scripts/widpackage.pa.scr.php';
          header('Location: ../userpanel.php?create=success');
          exit();

        } else {

            require_once './scripts/woidpackage.pa.scr.php';
            header('Location: ../userpanel.php?create=success');
            exit();
        }


     } else {

       header('Location: ../packageEdition.php?error=emptyFields');
       exit();
     }
   } else {

     header('Location: ../index.php');
     exit();
     
   }
 }
?>
