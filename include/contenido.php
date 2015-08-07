<?php

function CONTENIDO_PRINCIPAL($hostname,$user,$password,$db_name){
$sql = sprintf("SELECT * FROM publicaciones ORDER BY id ASC");
$response =  QUERYBD($sql,$hostname,$user,$password,$db_name);
while ($row = mysqli_fetch_array($response,MYSQLI_ASSOC)) {
    echo'
    <div class="post-preview">
        <a href="post.html">
            <h2 class="post-title">
                '.$row["titulo"].'
            </h2>
            <h3 class="post-subtitle">
                '.$row["descripcion"].'
            </h3>
        </a>
        <p class="post-meta">Posted by
        <a href="#0">'.$row["id_autor"].'</a> 
        on '.$row["fecha"].'</p>
    </div>
    <hr>';    
}//fin while    

    return;
}

?>
