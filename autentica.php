<?php
session_start();
include 'include/datos.php';
include 'config/conex.php';
$mysqli=CONECTAR_BD($hostname,$user,$password,$db_name);
$username = trim($_POST['username']);
$pass = md5(trim($_POST['password']));
$sql = sprintf("SELECT * FROM usuarios WHERE email = '%s' && password = '%s'",
mysqli_real_escape_string($mysqli,$username),
mysqli_real_escape_string($mysqli,$pass));
$response =  QUERYBD($sql,$hostname,$user,$password,$db_name,$mysqli);

if ($rows = mysqli_fetch_array($response,MYSQLI_ASSOC)) {
    $_SESSION['id']         = $rows["id"];
    $_SESSION['username']   = $rows["nombre_usuario"];
    $_SESSION['mail']       = $rows["email"];
    $_SESSION['nivel']      = $rows["nivel"];
    $_SESSION['login']      = 1;
    header('location:index.php');
} else {
    header('location:index.php?ver=login&error=1');
}
?>
