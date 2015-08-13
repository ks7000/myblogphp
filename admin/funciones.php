<?php
function NUEVO_POST($mysqli,$hostname,$user,$password,$db_name){
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header('location:index.php?ver=login&error=2');
}
echo'
<div class="page-header">
  <h1 class="text-center">Agregar una nueva publicacion</h1>
</div>
<div id="InformacionPublicacion"></div>
<form enctype="application/x-www-form-urlencoded" action="javascript:void(0)" role="form" method="post" onsubmit="return AgregaPost(); return document.MM_returnValue" name="FormNuevoPost" id="FormNuevoPost">
  <div class="form-group col-xs-12 floating-label-form-group controls">
    <label for="titulop">Titulo</label>
    <input type="text" class="form-control" id="titulop" name="titulop" placeholder="Titulo de la publicacion">
  </div>
  <div class="form-group col-xs-12 floating-label-form-group controls">
    <label for="descripcionp">Descripcion</label>
    <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion"></textarea>
  </div>
  <div class="form-group col-xs-12 floating-label-form-group controls">
    <label for="contenido">Contenido</label>
    <textarea class="form-control" id="summernote" name="contenido"></textarea>
  </div>
    <div class="row">
        <div class="form-group col-xs-12">
            <button type="submit" class="btn btn-default">Enviar publicacion</button>
            <input type="hidden" value="1" id="op" name="op">
        </div>
    </div>

</form>';
    return;
}


function ACTUALIZAR_POST($mysqli,$hostname,$user,$password,$db_name){
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header('location:index.php?ver=login&error=2');
}
$id = $_GET["id"];
$sql = sprintf("SELECT * FROM publicaciones WHERE id = '%s' ",
mysqli_real_escape_string($mysqli,$id)); // ver http://php.net/manual/es/mysqli.real-escape-string.php
$response =  QUERYBD($sql,$hostname,$user,$password,$db_name);
$row = mysqli_fetch_array($response,MYSQLI_ASSOC);

echo'
<div class="page-header">
  <h1 class="text-center">Actualizar publicacion</h1>
</div>
<div id="InformacionPublicacion"></div>
<form enctype="application/x-www-form-urlencoded" action="javascript:void(0)" role="form" method="post" onsubmit="return AgregaPost(); return document.MM_returnValue" name="FormNuevoPost" id="FormNuevoPost">
  <div class="form-group col-xs-12 floating-label-form-group controls">
    <label for="titulop">Titulo</label>
    <input type="text" class="form-control" id="titulop" name="titulop" placeholder="Titulo de la publicacion" value="'.$row["titulo"].'">
  </div>
  <div class="form-group col-xs-12 floating-label-form-group controls">
    <label for="descripcionp">Descripcion</label>
    <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion">'.$row["descripcion"].'</textarea>
  </div>
  <div class="form-group col-xs-12 floating-label-form-group controls">
    <label for="contenido">Contenido</label>
    <textarea class="form-control" id="summernote" name="contenido">'.$row["contenido"].'</textarea>
  </div>
    <div class="row">
        <div class="form-group col-xs-12">
            <button type="submit" class="btn btn-default">Enviar publicacion</button>
            <input type="hidden" value="2" id="op" name="op">
            <input type="hidden" value="'.$id.'" id="id" name="id">
        </div>
    </div>

</form>';
    return;
}




?>
