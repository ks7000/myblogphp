<?php

function NOSOTROS($mysqli,$hostname,$user,$password,$db_name){
$sql = sprintf("SELECT nosotros FROM configuracion");
$response =  QUERYBD($sql,$hostname,$user,$password,$db_name);
$row = mysqli_fetch_array($response,MYSQLI_ASSOC);

echo $row["nosotros"];


	return;
}

?>