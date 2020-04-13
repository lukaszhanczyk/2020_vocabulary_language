<?php
  if (isset($_POST['login-submit'])) {

    require_once "./dbh.inc.php";

    $uName=$_POST['userName'];
    $uPwd=$_POST['pwd'];

    if (empty($uName)||empty($uPwd)) {
      header('Location: ../index.php?error=emptyFields');
      exit();
    }
      else {
        $sql = "SELECT * FROM users WHERE userName=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
          header("Location: ../index.php?error=sqlError");
          exit();
        }
        else {
          mysqli_stmt_bind_param($stmt,"s",$uName);
          mysqli_stmt_execute($stmt);
          $results = mysqli_stmt_get_result($stmt);
          if ($row = mysqli_fetch_assoc($results)) {
            $uActive = $row['active'];
            if ($uActive == 1) {

              $pwdCheck = password_verify($uPwd,$row['userPwd']);
              if ($pwdCheck == false) {
                header('Location: ../index.php?error=invalidNameOrPwd&uName='.$uName);
                exit();
              }
              else if($pwdCheck == true) {
                session_start();
                $_SESSION['uId'] = $row['ID_user'];
                $_SESSION['uName']=$uName;
                header('Location: ../userpanel.php?login=success');
                exit();
              }
            }
            else {
              header('Location: ../index.php?error=userNoActive');
              exit();
            }
          }
          else {
            header('Location: ../index.php?error=invalidNameOrPwd&uName='.$uName);
            exit();
          }
        }
      }
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
    }else {
    header('Location: ../index.php');
  }
