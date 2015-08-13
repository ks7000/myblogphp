<?php

include 'libs/libs.php';
include 'funciones.php';
include 'admin/funciones.php';

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
    case 'ActualizarPublicacion':
        ACTUALIZAR_POST($mysqli,$hostname,$user,$password,$db_name);
    break;    
    default:
        CONTENIDO_PRINCIPAL($mysqli,$hostname,$user,$password,$db_name);
    }
    return;
}



?>
