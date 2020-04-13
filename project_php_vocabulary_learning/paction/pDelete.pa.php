<?php
if (isset($_GET['pId'])) {
    require_once "../includes/dbh.inc.php";
    $pId=$_GET['pId'];
    $sql="DELETE FROM packages_of_translation WHERE ID_package=$pId";
    mysqli_query($conn,$sql);
    header("Location: ../userpanel.php");
    exit();
}else {
    header("Location: ../userpanel.php");
}

?>
