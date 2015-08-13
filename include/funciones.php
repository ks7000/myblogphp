<?php
function CONTACTO(){
    echo'
<p>Want to get in touch with me? Fill out the form below to send me a message and I will try to get back to you within 24 hours!</p>
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email Address</label>
                            <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Phone Number</label>
                            <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Message</label>
                            <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-default">Send</button>
                        </div>
                    </div>
                </form>
';


    return;
}


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


function CONTENIDO_PUBLICACION($mysqli,$hostname,$user,$password,$db_name){
$id_p = $_GET["id"];// obtenemos la id de la publicacion para buscarla en la tabla
$sql = sprintf("SELECT * FROM publicaciones WHERE id = '%s' ",
mysqli_real_escape_string($mysqli,$id_p)); // ver http://php.net/manual/es/mysqli.real-escape-string.php
$response =  QUERYBD($sql,$hostname,$user,$password,$db_name);
$row = mysqli_fetch_array($response,MYSQLI_ASSOC);
    echo'
    <ol class="breadcrumb">
      <li><a href="index.php">Regresar al Inicio</a></li>
    </ol>
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
    return;
}

function HISTORIAL($mysqli,$hostname,$user,$password,$db_name){
    $sql = sprintf("SELECT * FROM publicaciones ORDER BY id DESC");
    $response =  QUERYBD($sql,$hostname,$user,$password,$db_name);
    while ($row = mysqli_fetch_array($response,MYSQLI_ASSOC)) {
        echo'
    <div class="post-preview">
<a href="index.php?ver=publicacion&id='.$row["id"].'/'.FSPATH($row["titulo"]).'">
            <h2 class="post-title">
                '.$row["titulo"].'
            </h2>
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
    return;
}

function INGRESAR($mysqli,$hostname,$user,$password,$db_name){
    if (!empty($_GET['error'])) {
        if ($_GET['error'] == 1) {
            echo '<div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>Lo lamento, no hay ningun usuario con los datos suministrados
             </div>';
        }
        if ($_GET['error'] == 2) {
            echo '<div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>Antes de continuar debe ingresar nuevamente al sistema.
             </div>';
        }
    }
    echo'
<h2>Ingresar</h2>
<div id="InformacionIngreso"></div>
<form enctype="application/x-www-form-urlencoded" action="javascript:void(0)" role="form" method="post" onsubmit="return Ingreso(); return document.MM_returnValue" name="FormIngreso" id="FormIngreso">
          <div class="form-group col-xs-12 floating-label-form-group controls">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" placeholder="Enter username" required />
          </div>
          <div class="form-group col-xs-12 floating-label-form-group controls">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter password" required />
          </div>
          <button type="submit" class="btn btn-primary" name="login" value="Login">Submit</button>
          </form>';
    return;
}

function NOSOTROS($mysqli,$hostname,$user,$password,$db_name){
    $sql = sprintf("SELECT about FROM configuracion");
    $response =  QUERYBD($sql,$hostname,$user,$password,$db_name);
    $row = mysqli_fetch_array($response,MYSQLI_ASSOC);

    echo $row["about"];


    return;
}
