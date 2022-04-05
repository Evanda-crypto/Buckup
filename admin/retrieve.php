<?php

// Get the user id
$bcode = $_REQUEST['bcode'];

// Database connection
include("../config/config.php");

if ($bcode !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($connection, "SELECT Region,
	BuildingName FROM building WHERE BuildingCode='$bcode'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$Bname = $row["BuildingName"];

	// Get the first name
	$Reg = $row["Region"];
}

// Store it in a array
$result = array("$Bname", "$Reg");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>