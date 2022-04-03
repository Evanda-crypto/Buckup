<?php
include("../config/config.php");
?>
<?php
session_start();
// If upload button is clicked ...
if (isset($_POST['submit']) && !empty($_FILES["image"]["name"])) {
$Team_ID=$_POST['teamid'];
$mtrno = $_POST['mtrno'];
$DateInstalled = $_POST['dateinstalled'];
$Region = $_POST['region'];
$contact = $_POST['contact'];
$bname = $_POST['bname'];
$Note = $_POST['note'];
$status = "New Meter";
$Contperson = $_POST['person'];

	$filename = $_FILES["image"]["name"];
	$tempname = $_FILES["image"]["tmp_name"];	
		$folder = "/var/www/html/konn/images/mtrpics".$filename;

		// Get all the submitted data from the form
		$sql = "INSERT INTO token_meter (Meter_Picture,Techie_team,Meter_Number,Contact_Number,Contact_Person,date_Installed,Status,Region,Comments,Building_name) VALUES 
		('$filename','$Team_ID','$mtrno','$contact','$Contperson','$DateInstalled','$status','$Region','$Note','$bname' )";

		// Execute query
		mysqli_query($connection, $sql);
		
		// Now let's move the uploaded image into the folder: image
		if (move_uploaded_file($tempname, $folder)) {
            $_SESSION["success"] = "Submitted";
            header("Location: new-meter-form.php");
		}else{
            $_SESSION["status"] = "An Error Occured";
            header("Location: new-meter-form.php");
         
	}
}
?>
