<?php
session_start();
if (isset($_SESSION["teamleader"]) && $_SESSION["teamleader"] == true) {
    if (time() - $_SESSION["start"] > 86400) {
        header("location: logout.php");
    } else {
        $_SESSION["start"] = time();
    }
} else {
    header("location: ../../index.php");
}
?>
