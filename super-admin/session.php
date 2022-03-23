<?php
/*
session_start();
if (isset($_SESSION["superadmin"]) && $_SESSION["superadmin"] == true) {
    if (time() - $_SESSION["start"] > 900) {
        header("location: ../config/logout.php");
    } else {
        $_SESSION["start"] = time();
    }
} else {
    header("location: index.php");
}*/
?>
<?php
session_start();
if(!isset($_SESSION['superadmin']) && $_SESSION['superadmin']==false)
{
    header("location: index.php");
}
?>