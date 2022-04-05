<?php 
include("../config/config.php");
if(!empty($_GET['id'])){  
     
    if ($connection->connect_error) { 
        die("Unable to connect database: " . $db->connect_error); 
    } 
     
    // Get content from the database 
    $query = $connection->query("SELECT * FROM papdailysales WHERE ClientID = {$_GET['id']}"); 
     
    if($query->num_rows > 0){ 
        $cmsData = $query->fetch_assoc(); 
        echo "<table class='table table-striped'>";
        echo "<tr>";
        echo "<td>ClientID</td>";
        echo "<td>".$cmsData['ClientID']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>DateSigned</td>";
        echo "<td>".$cmsData['DateSigned']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Client Name</td>";
        echo "<td>".$cmsData['ClientName']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Availability</td>";
        echo "<td>".$cmsData['ClientAvailability']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Phone Main</td>";
        echo "<td>".$cmsData['ClientContact']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Phone Alt</td>";
        echo "<td>".$cmsData['PhoneAlt']."</td>";
        echo "</tr>";
        echo "<td>Region</td>";
        echo "<td>".$cmsData['Region']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Building Name</td>";
        echo "<td>".$cmsData['BuildingName']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Building Code</td>";
        echo "<td>".$cmsData['BuildingCode']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Floor</td>";
        echo "<td>".$cmsData['Floor']."</td>";
        echo "</tr>";
        echo "<td>Apt</td>";
        echo "<td>".$cmsData['Apt']."</td>";
        echo "</tr>";
        echo "</table>";
    }else{ 
        echo 'Content not found....1'; 
    } 
}else{ 
    echo 'Content not found....2'; 
} 
?>
