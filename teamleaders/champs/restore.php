<?php
include("../../config/config.php");
include_once("session.php");
$id = $_GET['clientid'];

$msg = "";
if (isset($id)) {

    $query = "DELETE FROM  papnotinstalled  WHERE ClientID= '$id'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION["success"] = "Successfully Restored";
                    header("Location: restituted.php");
    } else {
        $_SESSION["status"] = "Not Restored";
                    header("Location: restituted.php");
    }
}
?>