
<?php
include "../../config/config.php";
$output=array();
$output['restituted']=array();

if ($connection) {
    $sql = "SELECT ClientID,ClientName,BuildingName,BuildingCode,Region,Floor,DateSigned,Reason,Contact,ChampName,CONCAT(Techie1,'/',Techie2) as techies 
    from papnotinstalled  order by DateSigned Desc";

    $result = mysqli_query($connection, $sql);
    if ($result) {
        header("Content-Type: JSON");
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
           extract($row);
           $item=array(
            'DateSigned' =>$row['DateSigned'],
            'BuildingName' =>$row['BuildingName'],
            'BuildingCode' =>$row['BuildingCode'],
            'Region' =>$row['Region'],
            'ChampName' =>$row['ChampName'],
            'ClientName' =>$row['ClientName'],
            'Region' =>$row['Region'],
            'Contact' =>$row['Contact'],
            'Techies' =>$row['techies'],
            'Reason' =>$row['Reason'],
           );
           
           array_push($output['restituted'], $item);
        }
      echo json_encode($output, JSON_PRETTY_PRINT);
    } else {
        die(mysqli_error($connection));
    }
}
?>