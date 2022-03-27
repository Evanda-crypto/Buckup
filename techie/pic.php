<?php
include("../config/config.php");
include("session.php");



if(isset($_POST["submit"])){
    $Team_ID=$_POST['teamid'];
    $MacAddress = $_POST['macaddress'];
    $SerialNumber = "N/A";
    $DateInstalled = $_POST['dateinstalled'];
    $ClientID = $_POST['ClientID'];
    $Region = $_POST['region'];
    $Floor = $_POST['floor'];
    $Note = $_POST['note'];
    $layout = $_POST['layout'];
    $status = "Installed";
   
       
                    // Insert image file name into database
                    $stmt= $connection->prepare("select * from papinstalled where MacAddress= ?");
                    $stmt->bind_param("s",$MacAddress);
                    $stmt->execute();
                    $stmt_result= $stmt->get_result();
                    if($stmt_result->num_rows>0){
                      echo "<script>alert('The Macaddress Already Exists');</script>";
                      echo '<script>window.location.href="mytask.php";</script>';
                    }
                    else{
                    $sql="update papdailysales set ClientID=$ClientID,Floor='$Floor',AptLayout='$layout',PapStatus='$status' where ClientID=$ClientID";
                    $result=mysqli_query($connection,$sql);
                    $insert = $connection->query("INSERT into papinstalled (Team_ID,ClientID,MacAddress,SerialNumber,DateInstalled,Region,Note,Floor,AptLayout) VALUES ('$Team_ID','$ClientID','$MacAddress','$SerialNumber','$DateInstalled','$Region','$Note','$Floor','$layout')"); 

                    if($insert && $result){
                        echo '<script>alert("Submitted!")</script>';
                        echo '<script>window.location.href="mytask.php";</script>';
                    }else{
                        echo '<script>alert("Error submitting the image")</script>';
                        echo '<script>window.location.href="mytask.php";</script>';
                    }} 
               
       

}
?>
