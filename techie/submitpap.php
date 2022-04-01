<?php
include("../config/config.php");
include("session.php");


$targetDir = "/var/www/html/konn/images/papimages";
$fileName = basename($_FILES["image"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["image"]["name"])){
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
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
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
                    $insert = $connection->query("INSERT into papinstalled (Team_ID,ClientID,MacAddress,SerialNumber,DateInstalled,Region,Note,Floor,AptLayout,Image) VALUES 
                    ('$Team_ID','$ClientID','$MacAddress','$SerialNumber','$DateInstalled','$Region','$Note','$Floor','$layout','".$fileName."')"); 

                    if($insert && $result){
                        echo '<script>alert("Submitted!")</script>';
                        echo '<script>window.location.href="mytask.php";</script>';
                    }else{
                        echo '<script>alert("Error submitting the image")</script>';
                        echo '<script>window.location.href="mytask.php";</script>';
                    }} 
                }else{
                    echo '<script>alert("No path found")</script>';
                        echo '<script>window.location.href="mytask.php";</script>';
                }
        }else{
            echo '<script>alert("File type error")</script>';
                        echo '<script>window.location.href="mytask.php";</script>';
        }

}
?>
