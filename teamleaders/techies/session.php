
<?php
session_start();
if (!isset($_SESSION["teamleader"]) && $_SESSION["teamleader"] == false) {
    header("location: ../../index.php");
} else {
    if (time() - $_SESSION["start"] >604800 ) {
        header("location: ../../index.php");
    } else {
        $_SESSION["start"] = time();
    }   
}
?>
