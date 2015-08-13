<?php
include '../include/datos.php';
include '../config/conex.php';
include '../libs/libs.php';
$mysqli=CONECTAR_BD($hostname,$user,$password,$db_name);
//echo'<pre>';
//print_r($_POST);
//echo'</pre>';
//die();

session_start();
$titulo         =   trim($_POST["titulop"]);
$descripcion    =   trim($_POST["descripcion"]);
$contenido      =   nl2br($_POST["contenido"]);
$usuario        =   $_SESSION['id'];
$fecha          =   DTIME();

$sql = sprintf("INSERT INTO publicaciones (id, titulo, descripcion, contenido, id_autor, fecha)
     VALUES ( NULL, '%s', '%s', '%s', '%s', '%s')",
               mysqli_real_escape_string($mysqli,$titulo),
               mysqli_real_escape_string($mysqli,$descripcion),
               mysqli_real_escape_string($mysqli,$contenido),
               mysqli_real_escape_string($mysqli,$usuario),
               mysqli_real_escape_string($mysqli,$fecha));
$result =  QUERYBD($sql,$hostname,$user,$password,$db_name);
if (mysqli_affected_rows($mysqli)){
    echo '
                <div class="alert alert-success text-center" role="alert">
                    <h4>
                        Se ha guardado la información de forma correcta
                    </h4>
                    <p>Será redireccionado nuevamente al panel de publicaciones en un momento</p>
                </div>
<meta http-equiv="refresh" content="3; url=index.php?ver=nuevo-post&tok='.md5(DTIME()).'"/>';
}else{
    echo '
                <div class="alert alert-danger text-center" role="alert">
                    <h4>
                        Disculpe
                    </h4>
                    <p>
                        Hay un problema por lo que no se realizó el registro. Intente nuevamente
                    </p>
                </div>';
}

