<?php
include("../config/config.php");
include("session.php");


$targetDir = "/var/www/html/konn/images/bizzimages/";
$fileName = basename($_FILES["image"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["image"]["name"])){
    $DateSigned = trim($_POST["DateSigned"]);
    $ChampName = $_POST["ChampName"];
    $BuildingName = trim($_POST["Buildingname"]);
    $BuildingCode = trim($_POST["BuildingCode"]);
    $Region = trim($_POST["Region"]);
    $Venue = trim($_POST["venue"]);
    $Bizlayout = trim($_POST["bizlayout"]);
    $Floor = trim($_POST["floor"]);
    $ClientName = trim($_POST["ClientName"]);
    $FamilyName = trim($_POST["FamilyName"]);
    $ClientAvailability = trim($_POST["Day"]);
    $ClientContact = trim($_POST["ClientContact"]);
    $ClientWhatsApp = trim($_POST["WhatsApp"]);
    $ClientGender = trim($_POST["gender"]);
    $ClientAge = trim($_POST["age"]);
    $Birthday = trim($_POST["Birthday"]);
    $BizName = trim($_POST["bizname"]);
    $BizCat = trim($_POST["bizcat"]);
    $BizDec = trim($_POST["bizdec"]);
    $Note = trim($_POST["Note"]);
    $PhoneAlt = trim($_POST["phonealt"]);
    $Email = trim($_POST["email"]);
    $Role = trim($_POST["role"]);
    $package = trim($_POST["package"]);
    $Status = "Signed";

    $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
                    // Insert image file name into database
                    $stmt= $connection->prepare("select * from papdailysales where ClientContact= ?");
                    $stmt->bind_param("s",$ClientContact);
                    $stmt->execute();
                    $stmt_result= $stmt->get_result();
                    if($stmt_result->num_rows>0){
                      echo "<script>alert('Client already Exists');</script>";
                      echo '<script>window.location.href="business.php";</script>';
                    }
                    else{
                        $insert = $connection->query("INSERT into papdailysales (DateSigned,ChampName,BuildingName,BuildingCode,Region,Venue,BizLayout,Floor,ClientName,ClientAvailability,ClientContact,
        ClientWhatsApp,ClientGender,ClientAge,Birthday,BizName,BizCat,BizDec,Note,FamilyName,PhoneAlt,Email,Role,CurrentPackage,Image,PapStatus) VALUES ('$DateSigned','$ChampName','$BuildingName','$BuildingCode','$Region','$Venue','$Bizlayout','$Floor','$ClientName','$ClientAvailability','$ClientContact',
      '$ClientWhatsApp','$ClientGender','$ClientAge','$Birthday','$BizName','$BizCat','$BizDec','$Note','$FamilyName','$PhoneAlt','$Email','$Role','$package','".$fileName."','$Status')");
                    if($insert){
                        echo '<script>alert("Submitted!")</script>';
                        echo '<script>window.location.href="business.php";</script>';
                    }else{
                        echo '<script>alert("Error submitting the image")</script>';
                        echo '<script>window.location.href="business.php";</script>';
                    }} 
                }else{
                    echo '<script>alert("No path found")</script>';
                        echo '<script>window.location.href="business.php";</script>';
                }
        }else{
            echo '<script>alert("File type error")</script>';
                        echo '<script>window.location.href="business.php";</script>';
        }

}
?>
