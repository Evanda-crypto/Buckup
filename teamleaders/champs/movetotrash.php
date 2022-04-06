<?php
include("session.php");
include("../../config/config.php");;
$id = $_GET['clientid'];

$msg = "";
if (isset($id)) {
    
    $query = "DELETE FROM papdailysales  WHERE ClientID= '$id'";
    $result = mysqli_query($connection, $query);

    $sql = "DELETE FROM papnotinstalled  WHERE ClientID= '$id'";
    $del = mysqli_query($connection, $sql);
    if ($result && $del) {
        $_SESSION["success"] = "Deleted Successfully";
        header("Location: restituted.php");
    } else {
        $_SESSION["status"] = "Error occured";
        header("Location: restituted.php");
    }
}
?>