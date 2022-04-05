<?php 
include('../config/config.php');
if(!empty($_GET['id'])){  
     
    if ($connection->connect_error) { 
        die("Unable to connect database: " . $db->connect_error); 
    } 
     
    // Get content from the database 
    $query = $connection->query("SELECT turnedonpap.ChampName,turnedonpap.DateTurnedOn,turnedonpap.ClientName,turnedonpap.ClientContact,papdailysales.DateSigned,papdailysales.PhoneAlt,turnedonpap.ClientID,papdailysales.BuildingName,papdailysales.BuildingCode,papdailysales.ClientAvailability,papdailysales.Region,papdailysales.Floor,papdailysales.Apt,CONCAT(Token_teams.Techie1,'/',Token_teams.Techie2) AS techies FROM turnedonpap LEFT JOIN papdailysales ON papdailysales.ClientID=turnedonpap.ClientID LEFT JOIN Token_teams ON Token_teams.Team_ID=turnedonpap.Team_ID WHERE turnedonpap.ClientID = {$_GET['id']}"); 
     
    if($query->num_rows > 0){ 
        $cmsData = $query->fetch_assoc(); 
        echo "<table class='table table-striped'>";
        echo "<tr>";
        echo "<td>Date Turned On</td>";
        echo "<td>".$cmsData['DateTurnedOn']."</td>";
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
        echo "<tr>";
        echo "<td>Apt</td>";
        echo "<td>".$cmsData['Apt']."</td>";
        echo "</tr>";
        echo"</tr>";
        echo "<td>Techies</td>";
        echo "<td>".$cmsData['techies']."</td>";
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
<?php
include('../config/config.php');

if(isset($_POST['submit'])){
    $upd=$_POST['Day'];

    $sql="update papdailysales set ClientID=$id,ClientAvailability='$upd' where ClientID=$id";
    $result=mysqli_query($connection,$sql);
    if($result){
        echo "<script>alert('Updated');</script>";
        echo '<script>window.location.href="turned-on.php";</script>';
    }
    else{
        echo "<script>alert('An error occured while updating your request');</script>";
    echo '<script>window.location.href="turned-on.php";</script>';
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title></title>
</head>
<body>
      <div class="modal-footer">
    <button type="button" name="submit" class="col-lg-5 btn btn-warning"><a href='update-availability.php?client-id=<?php echo $cmsData['ClientID'];?>'>Change Availability</a></button>
    <button type="button" class="col-lg-4 btn btn-danger" data-dismiss="modal">Close</button>
</div>
</body>
</html>
