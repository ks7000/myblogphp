<?php
/*
 * Configuration file for: Database Connection
 * @author Angel Cruz (@abr4xas) - http://abr4xas.org
 * mie 05 ago 2015 10:32:05 VET
 * License: GPLv2 or later
 * @version 0.1
 */

$hostname   =   '';
$user       =   '';
$password   =   '';
$db_name    =   '';

function CONECTAR_BD($hostname,$user,$password,$db_name){
    function_exists('mysqli_connect') or die ('ERROR:No se tiene soporte actualmente para la base de datos MySQL');
    global $mysqli;
    $mysqli=mysqli_connect($hostname,$user,$password,$db_name)
    or die ('Error inesperado, No se pudo ejecutar la instruccion. Contacte al administrador'.' '.mysqli_error($mysqli));
    return $mysqli;
}

function QUERYBD($sql,$hostname,$user,$password,$db_name){
$mysqli=CONECTAR_BD($hostname,$user,$password,$db_name);
 if ($resulta=@mysqli_query($mysqli,$sql)){
        return $resulta;
    }else{
        die ('Error inesperado, no se pudo ejecutar la instrucción. Contacte al administrador!');
    }
    return;
}
?>
