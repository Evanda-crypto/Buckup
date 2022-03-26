<?php
session_start();
if (isset($_SESSION["uname"]) && $_SESSION["uname"] == true) {
    if (time() - $_SESSION["start"] > 120) {
        header("location: index.php");
    } else {
        $_SESSION["start"] = time();
    }
} else {
    header("location: index.php");
}
?>
