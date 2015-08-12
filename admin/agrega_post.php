<?php
function NUEVO_POST($mysqli,$hostname,$user,$password,$db_name){
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header('location:index.php?ver=login&error=2');
}
echo'
<div class="page-header">
  <h1 class="text-center">Agregar una nueva publicacion</h1>
</div>
<form>
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
        </div>
    </div>

</form>';
    return;
}


?>
