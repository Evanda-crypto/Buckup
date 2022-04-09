
<?php
session_start();
if (!isset($_SESSION["Techie"]) && $_SESSION["Techie"] == false || !isset($_SESSION["Techie1"]) && $_SESSION["Techie1"] == false || 
!isset($_SESSION["Techie2"]) && $_SESSION["Techie2"] == false || !isset($_SESSION["TeamID"]) && $_SESSION["TeamID"] == false || 
!isset($_SESSION["Region"]) && $_SESSION["Region"] == false || !isset($_SESSION["ID"]) && $_SESSION["ID"] == false) {
    header("location: ../index.php");
} else {
    if (time() - $_SESSION["start"] >604800 ) {
        header("location: ../index.php");
    } else {
        $_SESSION["start"] = time();
    }   
}
?>
