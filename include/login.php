<?php

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
        <form action="autentica.php" method="post" role="form">
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" placeholder="Enter username" required />
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter password" required />
          </div>
          <button type="submit" class="btn btn-primary" name="login" value="Login">Submit</button>
          </form>';
        return;
    }
?>
