<?php 
include('../config/config.php');
include("session.php");
if(!empty($_GET['id'])){  
     
    if ($connection->connect_error) { 
        die("Unable to connect database: " . $db->connect_error); 
    } 
     
    // Get content from the database 
    $query = $connection->query("SELECT papdailysales.ChampName,techietask.ClientName,techietask.ClientID,techietask.ClientContact,techietask.ClientAvailability,papdailysales.BuildingName,papdailysales.Region,techietask.Date,token_teams.Team_ID,
    papdailysales.BuildingCode,papdailysales.Floor,papdailysales.Apt from papdailysales LEFT JOIN 
    techietask on techietask.ClientID=papdailysales.ClientID LEFT JOIN token_teams ON token_teams.Team_ID=techietask.TeamID  LEFT JOIN papinstalled ON papinstalled.ClientID=papdailysales.ClientID WHERE techietask.ClientID is not null AND papinstalled.ClientID is null and token_teams.Team_ID='" .
                                          $_SESSION["TeamID"] .
                                          "' and techietask.ClientID = {$_GET['id']}"); 
     
    if($query->num_rows > 0){ 
        $cmsData = $query->fetch_assoc(); 
        echo "<table class='table table-striped'>";
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
        echo "<td>Availability</td>";
        echo "<td>".$cmsData['ClientAvailability']."</td>";
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
    <button type="button" name="submit" class="col-lg-5 btn btn-warning"><a href='papdetails.php?clientid=<?php echo $cmsData['ClientID'];?>'>Installed</a></button>
    <button type="button" name="submit" class="col-lg-5 btn btn-danger"><a href='pap-not-installed.php?clientid=<?php echo $cmsData['ClientID'];?>'>To Restitutes</a></button>
</div>
</body>
</html>
