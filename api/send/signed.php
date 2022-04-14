
<?php
include "../../config/config.php";
$output=array();
$output['signed']=array();

if ($connection) {
    $sql = "SELECT papdailysales.ClientID,papdailysales.BuildingName,papdailysales.BuildingCode,papdailysales.Region,papdailysales.ChampName,papdailysales.ClientName,papdailysales.ClientContact,papdailysales.ClientAvailability,
    papdailysales.AptLayout,papdailysales.DateSigned,papdailysales.Note from papdailysales 
    LEFT JOIN papnotinstalled ON papnotinstalled.ClientID=papdailysales.ClientID WHERE papnotinstalled.ClientID is null and 
    papdailysales.DateSigned >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) order by papdailysales.DateSigned Desc";

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
            'Champ' =>$row['ChampName'],
            'ClientName' =>$row['ClientName'],
            'Contact' =>$row['ClientContact'],
            'Availability' =>$row['ClientAvailability'],
            'Note' =>$row['Note'],
           );
           
           array_push($output['signed'], $item);
        }
      echo json_encode($output, JSON_PRETTY_PRINT);
    } else {
        die(mysqli_error($connection));
    }
}
?>