<?php
include "../../config/config.php";
$output=array();
$output['turnedon']=array();

if ($connection) {
    $sql = "SELECT turnedonpap.BuildingCode,papdailysales.BuildingName,upper(papdailysales.BuildingCode) as bcode,upper(papdailysales.Region) as reg,turnedonpap.ChampName,turnedonpap.Region,papdailysales.ClientContact,Upper(turnedonpap.MacAddress) as Mac,turnedonpap.PapStatus,turnedonpap.DateTurnedOn, CASE WHEN LENGTH(papdailysales.BuildingCode)>11 THEN CONCAT(papdailysales.BuildingCode,'-',(row_number() over(partition by papdailysales.BuildingCode)),'P')
WHEN (row_number() over(partition by papdailysales.BuildingCode,papdailysales.Floor)) <=9 THEN CONCAT(upper(papdailysales.BuildingCode),'-',papdailysales.Floor,'0',(row_number() over(partition by papdailysales.BuildingCode,papdailysales.Floor)),'P')
WHEN (row_number() over(partition by papdailysales.BuildingCode,papdailysales.Floor)) >9 THEN CONCAT(upper(papdailysales.BuildingCode),'-',papdailysales.Floor,(row_number() over(partition by papdailysales.BuildingCode,papdailysales.Floor)),'P')
end as papcode from papdailysales LEFT JOIN turnedonpap ON turnedonpap.ClientID=papdailysales.ClientID WHERE DateTurnedOn >= DATE_SUB(CURDATE(), INTERVAL 70 DAY) order by turnedonpap.DateTurnedOn Desc";

    $result = mysqli_query($connection, $sql);
    if ($result) {
        header("Content-Type: JSON");
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
           extract($row);
           $item=array(
            'papcode' =>$row['papcode'],
            'BuildingName' =>$row['BuildingName'],
            'BuildingCode' =>$row['BuildingCode'],
            'Region' =>$row['Region'],
            'Contact' =>$row['ClientContact'],
           );
           
           array_push($output['turnedon'], $item);
        }
      echo json_encode($output, JSON_PRETTY_PRINT);
    } else {
        die(mysqli_error($connection));
    }
}
?>