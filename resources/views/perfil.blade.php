<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery-1.11.3.js" ></script>
    <script src="js/jsPlumb-2.0.4.js" ></script>
    <script src="js/bootstrap.js" ></script>
    <script src="js/bootstrap.min.js" ></script>
    <script src="js/script1.js" ></script>
    <script src="js/jquery.js" ></script>
    <script src="js/jquery-ui.js" ></script>
    <script src="js/jquery-ui.min.js" ></script>
    <link rel="stylesheet" href="css/style1.css"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <script src="http://www.google.com/jsapi" type="text/javascript"></script>
    <script type="text/javascript">
        google.load("jquery", "1.4.2");
        google.load("jqueryui", "1.7.2");
    </script>
    <title>Perfil - DiagramPOl</title>

    <!-- Bootstrap Core CSS -->

    <!-- Custom CSS -->


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">

    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand page-scroll" href="#page-top" id="menu-toggle"> Diagram Pol - Mi Perfil
            </a>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a class="page-scroll" href="/perfil">
                    Bienvenido, {{$user}}</a></li>
                <li>
                <li>
                    <a class="page-scroll" href="/principal"><i class="glyphicon glyphicon-home"></i> Principal</a>
                </li>

                <li>
                    <a class="page-scroll" href="/compartidos"><i class="glyphicon glyphicon-user"></i>
                        <i class="glyphicon glyphicon-user"></i> Compartidos</a>
                </li>

                <li>
                    <a class="page-scroll" href="/perfil"><i class="glyphicon glyphicon-user"></i> Perfil</a>
                </li>
                <li>
                    <a class="page-scroll" href="/logout"><i class="glyphicon glyphicon-off"></i> Salir</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
</nav>

<div id="wrapper">

    <footer class="footer">
        <div class="container">
            <p class="text-muted"><small>Daw Derechos reservados &copy; 2015 </small></p>
        </div>
    </footer>
</div>
<div style="height:500px; background-image: url(img/bg.jpg)" id="perfil">
    <div id="foto" style="margin-top:25px; margin-left:5px; display:inline-block;"><img style="height:200px; width:200px border-radius:15%; border:5px solid darkslategray " src="img/user.jpg"/></div>
    <div id="infousuario" style="display:inline-block;">
        <h4 style="margin-top:40px;text-align:right"><strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Información Personal</strong></h4>
        <ul>
            <li><strong>Nombre:</strong>&nbsp;&nbsp;John Doe</li>
            <li><strong>Edad:</strong>&nbsp;&nbsp;24</li>
            <li><strong>Usuario:</strong>&nbsp;&nbsp;<em>@jdoe</em></li>
            <li><strong>Docs Compartidos:</strong>&nbsp;&nbsp;4</li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 text-center">
            <h4><strong>Diagram Pol</strong>
            </h4>
            <p>Escuela Superior Politecnica del Litoral</p>
            <ul class="list-unstyled">
                <li> Daw Fiec 2015</li>

            </ul>
            <br>
            <ul class="list-inline">
                <li>
                    <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-dribbble fa-fw fa-3x"></i></a>
                </li>
            </ul>
            <hr class="small">
            <p class="text-muted">Copyright &copy; Fiec 2015</p>
        </div>
    </div>
</div>
<!-- /#wrapper -->



<!-- Menu Toggle Script -->

</body>

</html>

