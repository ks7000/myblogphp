<?php
include 'libs/libs.php';
include 'contenido.php';

function SELECTOR($hostname,$user,$password,$db_name){

    if (!isset($_GET["ver"])) {
        $ver = 'home';
    }else{
        $ver = htmlentities(trim($_GET["ver"]));
    }
    switch($ver){
        default:
        CONTENIDO_PRINCIPAL($hostname,$user,$password,$db_name);
    }
    return;
}



?>
