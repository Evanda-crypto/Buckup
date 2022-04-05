<?php
include("../../config/config.php");

$sql=mysqli_query($connection,"SELECT papdailysales.ClientID,papdailysales.BuildingName,papdailysales.BuildingCode,papdailysales.Region,papdailysales.ChampName,papdailysales.ClientName,papdailysales.ClientContact,papdailysales.ClientAvailability,papdailysales.AptLayout,papdailysales.DateSigned,papdailysales.Note from papdailysales LEFT JOIN papnotinstalled ON papnotinstalled.ClientID=papdailysales.ClientID WHERE papnotinstalled.ClientID is null and papdailysales.DateSigned >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) order by papdailysales.DateSigned Desc");

$result=mysqli_fetch_all($sql,MYSQLI_ASSOC);

exit(json_encode($result));

?>