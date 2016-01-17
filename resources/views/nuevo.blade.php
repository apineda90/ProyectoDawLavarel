<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jQueryRotate.js" ></script>
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
    <!--<script type="text/javascript">
        google.load("jquery", "1.4.2");
        google.load("jqueryui", "1.7.2");
    </script>-->

    <script src="js/jquery-1.4.2.js" type="text/javascript"></script>
    <script src="js/jquery-ui-1.7.2.js" type="text/javascript"></script>

    <title>Panel de Dibujo - DiagramPOl</title>

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

            <a class="navbar-brand page-scroll" href="#page-top" id="menu-toggle"> Paleta:
                <span id="pltv" class="pocultar"><i class="glyphicon glyphicon-eye-open"></i></span>
                <span id="plto" class="pver"><i class="glyphicon glyphicon-eye-close"></i></span>
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
                    <a class="page-scroll" href="#"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</a>
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

        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="background-color: #1b6d85">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                      DiagramPol
                    </a>
                </li>
                <li>
                   <div id="objeto1" class="drag">
                    </div>
                </li>
                <li>
                    <div id="objeto2" class="drag">
                    </div>
                </li>
                <li>
                    <div id="objeto3" class="drag">
                    </div>
                </li>
                <li>
                    <div id="objeto4" class="drag">
                    </div>
                </li>
                <li>
                    <div id="objeto5" class="drag">
                    </div>
                </li>
                <li>
                   <div id="objeto6" class="drag">
                    </div>
                </li>
                <li>
                    <div id="objeto7" class="drag">
                    </div>
                </li>
                <li>
                    <div id="objeto8" class="drag">
                    </div>
                </li>
                <li>
                    <div id="objeto9" class="drag">
                    </div>
                </li>
                <li>
                    <div id="objeto10" class="drag">
                    </div>
                </li>
                <li>
                    <div id="objeto11" class="drag">
                    </div>
                </li>
                <li>
                   <div id="objeto12" class="drag">
                    </div>
                </li>
                <li>
                    <div id="objeto13" class="drag">
                    </div>
                </li>
                <li>
                    <div id="objeto14" class="drag">
                        <textarea>Text</textarea>
                    </div>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="canvas" class="canvas">
            <div class="container-fluid" >
                    <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">

                </div>
            </div>
        </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
<footer class="footer">
      <div class="container">
        <p class="text-muted"><small>Daw derechos reservados &copy; 2015 </small></p>
      </div>
    </footer>
    </div>
    <!-- /#wrapper -->



    <!-- Menu Toggle Script -->
    <script>

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").addClass("overflowy");
        $("#wrapper").toggleClass("toggled");
        $('#pltv').toggleClass('pocultar');
        $('#plto').toggleClass('pocultar');
    });

    </script>
</body>
<script src="js/jQueryRotate.js" ></script>
</html>

