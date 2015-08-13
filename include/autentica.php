<?php
include '../include/datos.php';
include '../config/conex.php';

$mysqli=CONECTAR_BD($hostname,$user,$password,$db_name);

session_start();
$username = $_POST['username'];
$pass = $_POST['password'];
$password = md5($pass);
$sql = sprintf("SELECT * FROM usuarios WHERE email = '%s' && password = '%s'",
mysqli_real_escape_string($mysqli,$username),
mysqli_real_escape_string($mysqli,$password));
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
