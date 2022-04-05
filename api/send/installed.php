<?php
include("../../config/config.php");

$sql=mysqli_query($connection,"SELECT papdailysales.Floor,papdailysales.ClientName,papdailysales.BuildingName,papdailysales.BuildingCode,papdailysales.Region,Upper(papinstalled.MacAddress) as Mac,papinstalled.DateInstalled,papinstalled.ClientID,papdailysales.ClientContact  
FROM teams LEFT JOIN papinstalled on teams.Team_ID=papinstalled.Team_ID left join turnedonpap on papinstalled.ClientID=turnedonpap.ClientID JOIN papdailysales on papdailysales.ClientID=papinstalled.ClientID WHERE papinstalled.ClientID is NOT null and turnedonpap.ClientID is null ORDER BY papinstalled.DateInstalled ASC");

$result=mysqli_fetch_all($sql,MYSQLI_ASSOC);

exit(json_encode($result));

?>