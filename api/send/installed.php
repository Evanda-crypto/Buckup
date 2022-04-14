
<?php
include "../../config/config.php";
$output=array();
$output['installed']=array();

if ($connection) {
    $sql = "SELECT papdailysales.Floor,papdailysales.ClientName,papdailysales.BuildingName,papdailysales.BuildingCode,papdailysales.Region,Upper(papinstalled.MacAddress) as Mac,papinstalled.DateInstalled,papinstalled.ClientID,papdailysales.ClientContact  
    FROM Token_teams LEFT JOIN papinstalled on Token_teams.Team_ID=papinstalled.Team_ID left join turnedonpap on papinstalled.ClientID=turnedonpap.ClientID JOIN papdailysales on papdailysales.ClientID=papinstalled.ClientID WHERE papinstalled.ClientID is NOT null and turnedonpap.ClientID is null ORDER BY papinstalled.DateInstalled ASC";

    $result = mysqli_query($connection, $sql);
    if ($result) {
        header("Content-Type: JSON");
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
           extract($row);
           $item=array(
            'BuildingName' =>$row['BuildingName'],
            'BuildingCode' =>$row['BuildingCode'],
            'Region' =>$row['Region'],
            'Floor' =>$row['Floor'],
            'ClientName' =>$row['ClientName'],
            'Region' =>$row['Region'],
            'Mac' =>$row['Mac'],
           );
           
           array_push($output['installed'], $item);
        }
      echo json_encode($output, JSON_PRETTY_PRINT);
    } else {
        die(mysqli_error($connection));
    }
}
?>