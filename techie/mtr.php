<?php
include("../config/config.php");
include("session.php");

$targetDir = "../images/mtrpics/";
$fileName = basename($_FILES["image"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"])){
$Team_ID=$_POST['teamid'];
$mtrno = $_POST['mtrno'];
$DateInstalled = $_POST['dateinstalled'];
$Region = $_POST['region'];
$contact = $_POST['contact'];
$bname = $_POST['bname'];
$Note = $_POST['note'];
$status = "New";
$Contperson = $_POST['person'];
                    // Insert image file name into database
                    $insert = $connection->query("INSERT into Token_meter (Techie_team,Meter_Number,Contact_Number,Contact_Person,date_Installed,Status,Region,Comments,Cluster_name ) 
                    VALUES ('$Team_ID','$mtrno','$contact','$Contperson','$DateInstalled','$status','$Region','$Note','$bname' )");
                    if($insert){
                        echo '<script>alert("Submitted!")</script>';
                        echo '<script>window.location.href="new-meter-form.php";</script>';
                    }else{
                        echo '<script>alert("Error")</script>';
                        echo '<script>window.location.href="new-meter-form.php";</script>';
                    } 
                

}
?>
