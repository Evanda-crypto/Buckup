<?php
include "../../config/config.php";
//read the json file contents
$jsonurl = "http://localhost/project/api/send/turned-on.php";
$json = file_get_contents($jsonurl);

//convert json object to php associative array
$data = json_decode($json, true);

foreach ($data as $dataarray) {
    //get the employee details
    $id = $dataarray["ClientID"];
    $mac = $dataarray["Mac"];
    $bname = $dataarray["BuildingName"];
    $bcode = $dataarray["bcode"];
    $cont = $dataarray["ClientContact"];

    $stmt = $connection->prepare("SELECT * from api where Contact= ?");
    $stmt->bind_param("s", $cont);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0) {
        $query = "update api set ClientID=$id,BuildingName='$bname',BuildingCode='$bcode' where Contact=$cont";
        $result=mysqli_query($connection,$query);
    } else {
        //insert into mysql table
        $sql = "INSERT INTO api (ClientID, BuildingName, BuildingCode, MacAddress,Contact)
    VALUES('$id', '$bname', '$bcode', '$mac','$cont')";
        if (!mysqli_query($connection, $sql)) {
            die("Error : " . mysql_error());
        }
    }
}
?>
