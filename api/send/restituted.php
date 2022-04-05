<?php
include("../../config/config.php");

$sql=mysqli_query($connection,"SELECT ClientID,ClientName,BuildingName,BuildingCode,Region,Floor,DateSigned,Reason,Contact,ChampName,CONCAT(Techie1,'/',Techie2) as techies from papnotinstalled  order by DateSigned Desc");

$result=mysqli_fetch_all($sql,MYSQLI_ASSOC);

exit(json_encode($result));

?>