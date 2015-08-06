<?php

include 'contenido.php';

function SELECTOR(){

if (!isset($_GET["ver"])) { 
	$ver = 'home'; 
   }else{ 
   	$ver = htmlentities(trim($_GET["ver"])); 
   }
     switch($ver){
     default:
	CONTENIDO_PRINCIPAL();
     } 
}



?>
