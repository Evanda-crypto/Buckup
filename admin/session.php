<?php
session_start();
if (isset($_SESSION["Admin"]) && $_SESSION["Admin"] == true) {
    if (time() - $_SESSION["start"] >86400 ) {
        header("location: logout.php");
    } else {
        $_SESSION["start"] = time();
    }
} else {
    header("location: logout.php");
}
?>