<?php 
session_start();
include("../../config/config.php");
if(isset($_POST['delete'])){
if(isset($_POST['check'])){
 $all_ids=$_POST['check'];
 $extract_id=implode(',',$all_ids);

$query="DELETE from papdailysales Where ClientID IN ($extract_id) ";
$result = mysqli_query($connection, $query);
$sql=" DELETE from papnotinstalled where ClientID IN ($extract_id)";
$del = mysqli_query($connection, $sql);



if ($result && $del) {
    $_SESSION["success"] = "Deleted Successfully";
                header("Location: restituted.php");
} else {
    $_SESSION["status"] = "Error occured";
                header("Location: restituted.php");
}
}
else{
    $_SESSION["status"] = "Please Select Records to delete";
      header("Location: restituted.php");
}
}

?>