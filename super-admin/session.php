
<?php
session_start();
if(!isset($_SESSION['superadmin']) && $_SESSION['superadmin']==false)
{
    header("location: index.php");
}
?>