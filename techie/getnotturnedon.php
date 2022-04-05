<?php 
include('../config/config.php');
include("session.php");
if(!empty($_GET['id'])){  
     
    if ($connection->connect_error) { 
        die("Unable to connect database: " . $db->connect_error); 
    } 
     
    // Get content from the database 
    $query = $connection->query("SELECT papdailysales.Apt,papdailysales.ChampName,papdailysales.ClientContact,papinstalled.ClientID,papdailysales.ClientName,papdailysales.BuildingName,papdailysales.BuildingCode,papinstalled.Floor,papinstalled.MacAddress from papinstalled left join papdailysales on papdailysales.ClientID=papinstalled.ClientID left join turnedonpap on turnedonpap.ClientID=papinstalled.ClientID WHERE turnedonpap.ClientID is null and papinstalled.Team_ID='".$_SESSION['TeamID']."' and papinstalled.ClientID = {$_GET['id']}"); 
     
    if($query->num_rows > 0){ 
        $cmsData = $query->fetch_assoc(); 
        echo "<table class='table table-striped'>";
        echo "<td>Mac Address</td>";
        echo "<td>".$cmsData['MacAddress']."</td>";
        echo "</tr>";
        echo"</tr>";
        echo "<tr>";
        echo "<td>Building Name</td>";
        echo "<td>".$cmsData['BuildingName']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Building Code</td>";
        echo "<td>".$cmsData['BuildingCode']."</td>";
        echo "</tr>";
        echo "<td>Champ</td>";
        echo "<td>".$cmsData['ChampName']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Client Name</td>";
        echo "<td>".$cmsData['ClientName']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Contact</td>";
        echo "<td>".$cmsData['ClientContact']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Floor</td>";
        echo "<td>".$cmsData['Floor']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Door No</td>";
        echo "<td>".$cmsData['Apt']."</td>";
        echo "</tr>";
        echo"</tr>";
        echo "</table>";
    }else{ 
        echo 'Content not found....1'; 
    } 
}else{ 
    echo 'Content not found....2'; 
} 
?>