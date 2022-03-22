<?php
include("../../config/config.php");

$sql=mysqli_query($connection,"SELECT papdailysales.ClientAvailability,papdailysales.ClientName,papdailysales.ClientContact,papdailysales.BuildingName,papdailysales.BuildingCode,papdailysales.DateSigned,papdailysales.Region FROM papdailysales left join papinstalled on papdailysales.ClientID=papinstalled.ClientID left join papnotinstalled on papnotinstalled.ClientID=papdailysales.ClientID where papinstalled.ClientID is null and papnotinstalled.ClientID is null");

$result=mysqli_fetch_all($sql,MYSQLI_ASSOC);

exit(json_encode($result));

?>