<?php
/*
* file: index.php
* descripcion: archivo principal
*/
require 'include/datos.php';
include 'config/conex.php';
include 'include/seleccion.php';
$sql = sprintf("SELECT * FROM configuracion WHERE id = '1' ");
$response =  QUERYBD($sql,$hostname,$user,$password,$db_name);
$row = mysqli_fetch_array($response,MYSQLI_ASSOC);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Clean Blog</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/clean-blog.min.css" rel="stylesheet">
        <?php
if ((isset($_SESSION['login'])) && ($_SESSION['login']==1)) {
    echo'<link href="css/summernote.css" rel="stylesheet">';
}
        ?>
        <!-- Custom Fonts -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
        <base href="/myblogphp/">
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php?ver=inicio"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="index.php?ver=inicio">Home</a>
                        </li>
                        <li>
                            <a href="index.php?ver=nosotros">About</a>
                        </li>
                        <li>
                            <a href="index.php?ver=contacto">Contact</a>
                        </li>
                        <?php
if ((isset($_SESSION["nivel"])) && $_SESSION["nivel"] == 1){
    echo'<li>
            <a href="index.php?ver=nuevo-post">Agregar Post</a>
        </li>
        <li>
            <a href="index.php?ver=configuracion">Editar Configuracion</a>
        </li>';
}
if ((isset($_SESSION['login'])) && ($_SESSION['login']==1)) {
    echo'<li>
                <a href="logout.php">Salir</a>
            </li>';
}else{
    echo'<li>
        <a href="index.php?ver=login">Ingresar</a>
    </li>';
}
                        ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <!-- Page Header -->
        <!-- Set your background image for this header on the line below. -->
        <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <?php echo'
                        <h1>'.$row["titulo_blog"].'</h1>
                        <hr class="small">
                        <span class="subheading">'.$row["subtitulo_blog"].'</span>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <?php SELECTOR($mysqli,$hostname,$user,$password,$db_name); ?>
                </div>
            </div>
        </div>
        <hr>
        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <ul class="list-inline text-center">
                            <li>
                                <a href="#">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-muted">Copyright &copy; Your Website 2014</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/validacion.js"></script>
        <?php
if ((isset($_SESSION['login'])) && ($_SESSION['login']==1)) {
    echo'<!-- Custom Theme JavaScript -->
<script src="js/summernote.min.js"></script>
<script src="js/summernote-es-ES.js"></script>
<script src="js/custom.js"></script>';
}
        ?>
    </body>
</html>
