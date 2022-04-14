

<?php
include "../../config/config.php";
$output=array();
$output['pending']=array();

if ($connection) {
    $sql = "SELECT papdailysales.ClientID,papdailysales.ClientAvailability,papdailysales.ClientName,papdailysales.ClientContact,papdailysales.BuildingName,papdailysales.BuildingCode,papdailysales.DateSigned,papdailysales.Region FROM papdailysales left join papinstalled on papdailysales.ClientID=papinstalled.ClientID left join papnotinstalled on 
    papnotinstalled.ClientID=papdailysales.ClientID where papinstalled.ClientID is null and papnotinstalled.ClientID is null";

    $result = mysqli_query($connection, $sql);
    if ($result) {
        header("Content-Type: JSON");
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
           extract($row);
           $item=array(
            'DateSigned' =>$row['DateSigned'],
            'ClientID' =>$row['ClientID'],
            'BuildingName' =>$row['BuildingName'],
            'BuildingCode' =>$row['BuildingCode'],
            'Region' =>$row['Region'],
            'ClientName' =>$row['ClientName'],
            'Contact' =>$row['ClientContact'],
            'Availability' =>$row['ClientAvailability'],
           );
           
           array_push($output['pending'], $item);
        }
      echo json_encode($output, JSON_PRETTY_PRINT);
    } else {
        die(mysqli_error($connection));
    }
}
?>