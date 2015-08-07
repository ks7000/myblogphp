<?php

function CONTENIDO_PUBLICACION($mysqli,$hostname,$user,$password,$db_name){
$id_p = $_GET["id"];// obtenemos la id de la publicacion para buscarla en la tabla
$sql = sprintf("SELECT * FROM publicaciones WHERE id = '%s' ",
mysqli_real_escape_string($mysqli,$id_p)); // ver http://php.net/manual/es/mysqli.real-escape-string.php
$response =  QUERYBD($sql,$hostname,$user,$password,$db_name);
while ($row = mysqli_fetch_array($response,MYSQLI_ASSOC)) {
    echo'
    <div class="post-preview">
            <h2 class="post-title">
                '.$row["titulo"].'
            </h2>
            <h3 class="post-subtitle">
                '.$row["descripcion"].'
            </h3>
            '.$row["contenido"].'
        <p class="post-meta">Posted by';
$id = $row["id_autor"];
$sql = sprintf("SELECT nombre_usuario FROM usuarios WHERE id = '%s' ",
mysqli_real_escape_string($mysqli,$id));
$response =  QUERYBD($sql,$hostname,$user,$password,$db_name);
$nombreU = mysqli_fetch_array($response,MYSQLI_ASSOC);
echo'        <a href="#0">'.$nombreU["nombre_usuario"].'</a>
        on '.prettyDate(date("Y-m-d H:i:s",$row["fecha"])).'</p>
    </div>';
}//fin while

    return;
}

?>
