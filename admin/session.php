<?php
session_start();
if (!isset($_SESSION["Admin"]) && $_SESSION["Admin"] == false || !isset($_SESSION["FName"]) && $_SESSION["FName"] == false || 
!isset($_SESSION["LName"]) && $_SESSION["LName"] == false || !isset($_SESSION["ID"]) && $_SESSION["ID"] == false) {
    header("location: ../index.php");
} else {
    if (time() - $_SESSION["start"] >604800 ) {
        header("location: ../index.php");
    } else {
        $_SESSION["start"] = time();
    }   
}
?>
