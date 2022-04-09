<?php
session_start();
if (!isset($_SESSION["teamleader"]) && $_SESSION["teamleader"] == false || !isset($_SESSION["FName"]) && $_SESSION["FName"] == false || 
!isset($_SESSION["LName"]) && $_SESSION["LName"] == false || !isset($_SESSION["ID"]) && $_SESSION["ID"] == false || 
!isset($_SESSION["Region"]) && $_SESSION["Region"] == false) {
    header("location: ../../index.php");
} else {
    if (time() - $_SESSION["start"] >604800 ) {
        header("location: ../../index.php");
    } else {
        $_SESSION["start"] = time();
    }   
}
?>
