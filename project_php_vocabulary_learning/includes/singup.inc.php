<?php
  if (isset($_POST['singup-submit'])) {

    require_once "dbh.inc.php";

    $uName = $_POST['userName'];
    $uEmail = $_POST['userEmail'];
    $uPwd = $_POST['pwd'];
    $uPwdRepeat = $_POST['pwd-repeat'];

    if (empty($uName)||empty($uEmail)||empty($uPwd)||empty($uPwdRepeat)) {
      header("Location: ../singup.php?error=emptyFields");
      exit();
    }
    else if (!filter_var($uEmail,FILTER_VALIDATE_EMAIL)&&preg_match("/^[a-zA-Z0-9]*$/",$uName)) {
      header("Location: ../singup.php?error=invalidEmailName");
      exit();
    }
    else if ($uPwd !== $uPwdRepeat) {
      header("Location: ../singup.php?error=passwordCheck&uName=".$uName."&uEmail=".$uEmail);
      exit();
    }
    else {
      $sql = "SELECT userName FROM users WHERE userName=?";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: ../singup.php?error=sqlError&uName=".$uName."&uEmail=".$uEmail);
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt,"s",$uName);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $numRows=mysqli_stmt_num_rows($stmt);
        if ($numRows>0) {
          header("Location: ../singup.php?error=userTaken");
          exit();
        }
        else {
          $sql="INSERT INTO users(userName,userPwd,userEmail) VALUES(?,?,?)";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../singup.php?error=sqlError&uName=".$uName."&uEmail=".$uEmail);
            exit();
          }
          else {
            $uPwdHashed = password_hash($uPwd,PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt,"sss",$uName,$uPwdHashed,$uEmail);
            mysqli_stmt_execute($stmt);
            header("Location: ../index.php?singup=success");
            exit();
          }
        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
  else {
      header("Location: ../singup.php");
      exit();
  }
?>
