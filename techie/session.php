<?php
session_start();
if (isset($_SESSION["Techie"]) && $_SESSION["Techie"] == true) {
    if (time() - $_SESSION["start"] > 86400) {
        header("location: logout.php");
    } else {
        $_SESSION["start"] = time();
    }
} else {
    header("location: ../index.php");
}
?>
