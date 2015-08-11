<?php

function CONTENIDO_PRINCIPAL($mysqli,$hostname,$user,$password,$db_name){
$sql = sprintf("SELECT * FROM publicaciones ORDER BY id DESC LIMIT 0,10");
$response =  QUERYBD($sql,$hostname,$user,$password,$db_name);
while ($row = mysqli_fetch_array($response,MYSQLI_ASSOC)) {
    echo'
    <div class="post-preview">
<a href="index.php?ver=publicacion&id='.$row["id"].'/'.FSPATH($row["titulo"]).'">
            <h2 class="post-title">
                '.$row["titulo"].'
            </h2>
            <h3 class="post-subtitle">
                '.$row["descripcion"].'
            </h3>
        </a>
        <p class="post-meta">Posted by';
$id = $row["id_autor"];
$sql = sprintf("SELECT nombre_usuario FROM usuarios WHERE id = '%s' ",
mysqli_real_escape_string($mysqli,$id)); // ver http://php.net/manual/es/mysqli.real-escape-string.php
$responseusuario =  QUERYBD($sql,$hostname,$user,$password,$db_name);
$nombreU = mysqli_fetch_array($responseusuario,MYSQLI_ASSOC);
echo'        <a href="#0">'.$nombreU["nombre_usuario"].'</a>
        on '.prettyDate(date("Y-m-d H:i:s",$row["fecha"])).'</p>
    </div>
    <hr>';
}//fin while
echo'
    <!-- Pager -->
    <ul class="pager">
        <li class="next">
            <a href="index.php?ver=historial">Ver Historial &rarr;</a>
        </li>
    </ul>
';
    return;
}

?>
