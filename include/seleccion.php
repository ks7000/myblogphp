<?php

include 'libs/libs.php';
include 'contenido.php';
include 'contacto.php';
include 'publicacion.php';
include 'historial.php';
include 'nosotros.php';
include 'login.php';
include 'admin/agrega_post.php';

function SELECTOR($mysqli,$hostname,$user,$password,$db_name){

    if (!isset($_GET["ver"])) {
        $ver = 'home';
    }else{
        $ver = htmlentities(trim($_GET["ver"]));
    }
    switch($ver){
    case 'inicio':
        CONTENIDO_PRINCIPAL($mysqli,$hostname,$user,$password,$db_name);
    break;
    case 'contacto':
        CONTACTO();
    break;
    case 'publicacion':
        CONTENIDO_PUBLICACION($mysqli,$hostname,$user,$password,$db_name);
    break;
    case 'historial':
        HISTORIAL($mysqli,$hostname,$user,$password,$db_name);
    break;
    case 'nosotros':
        NOSOTROS($mysqli,$hostname,$user,$password,$db_name);
    break;
    case 'login':
        INGRESAR($mysqli,$hostname,$user,$password,$db_name);
    break;
    case 'nuevo-post':
        NUEVO_POST($mysqli,$hostname,$user,$password,$db_name);
    break;
    default:
        CONTENIDO_PRINCIPAL($mysqli,$hostname,$user,$password,$db_name);
    }
    return;
}



?>
