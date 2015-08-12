<?php
require( 'helper/php_error.php' );
\php_error\reportErrors();
include 'include/datos.php';
include 'config/conex.php';

$mysqli=CONECTAR_BD($hostname,$user,$password,$db_name);

session_start();
$username = $_POST['username'];
$pass = $_POST['password'];
$password = md5($pass);
$sql = sprintf("SELECT * FROM usuarios WHERE email = '%s' && password = '%s'",
mysqli_real_escape_string($mysqli,$username),
mysqli_real_escape_string($mysqli,$password));
$response =  QUERYBD($sql,$hostname,$user,$password,$db_name,$mysqli);
$login = mysqli_fetch_array($response,MYSQLI_ASSOC);

if ($rowcount=mysqli_num_rows($response) == 1) {
//    die($rowcount);
    $_SESSION['id']         = $login["id"];
    $_SESSION['username']   = $login["nombre_usuario"];
    $_SESSION['mail']       = $login["email"];
    $_SESSION['nivel']      = $login["nivel"];
    $_SESSION['login']      = 1;
    header('location:index.php');
} else {
    header('location:index.php?ver=login&error=1');
}
?>
