<?php
include("../config/config.php");
include("session.php");

$targetDir = "/var/www/html/konn/images/mtrpics/";
$fileName = basename($_FILES["image"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["image"]["name"])){
$Team_ID=$_POST['teamid'];
$mtrno = $_POST['mtrno'];
$DateInstalled = $_POST['dateinstalled'];
$Region = $_POST['region'];
$contact = $_POST['contact'];
$bname = $_POST['bname'];
$Note = $_POST['note'];
$status = "New Meter";
$Contperson = $_POST['person'];
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
                    // Insert image file name into database
                    $insert = $connection->query("INSERT into token_meter (Meter_Picture,Techie_team,Meter_Number,Contact_Number,Contact_Person,date_Installed,Status,Region,Comments,Building_name ) 
                    VALUES ('".$fileName."','$Team_ID','$mtrno','$contact','$Contperson','$DateInstalled','$status','$Region','$Note','$bname' )");
                    if($insert){
                        echo '<script>alert("Submitted!")</script>';
                        echo '<script>window.location.href="new-meter-form.php";</script>';
                    }else{
                        echo '<script>alert("Error")</script>';
                        echo '<script>window.location.href="new-meter-form.php";</script>';
                    } 
                }else{
                    echo '<script>alert("No path found")</script>';
                        echo '<script>window.location.href="new-meter-form.php";</script>';
                }
        }else{
            echo '<script>alert("Invalid file type")</script>';
                        echo '<script>window.location.href="new-meter-form.php";</script>';
        }

}
?>
