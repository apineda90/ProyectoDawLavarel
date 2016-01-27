<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jQueryRotate.js" ></script>
    <script src="js/jquery-1.11.3.js" ></script>
    <script src="js/jsPlumb-2.0.4.js" ></script>
    <script src="js/bootstrap.js" ></script>
    <script src="js/scriptSearch.js" ></script>
    <script src="js/script1.js" ></script>
    <script src="js/script.js" ></script>

    <script src="js/jquery.js" ></script>
    <script src="js/jquery-ui.js" ></script>
    <script src="js/jquery-ui.min.js" ></script>
    <link rel="stylesheet" href="css/style1.css"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <script src="http://www.google.com/jsapi" type="text/javascript"></script>
    <script src="js/jquery-1.4.2.js" type="text/javascript"></script>
    <script src="js/jquery-ui-1.7.2.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" ></script>




    <title>Mis Diagramas - DiagramPOl</title>


    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>






<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("button.delete").click(function(e){
        if(!confirm('Eliminar documento?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script>
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

            <a class="navbar-brand page-scroll" href="#page-top" id="menu-toggle"> Diagram Pol - Mis Diagramas
            </a>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a class="page-scroll" href="/perfil">
                        Bienvenido, {{$user}}</a></li>
                <li>
                    <a class="page-scroll" href="/nuevo"><i class="glyphicon glyphicon-star"></i> Nuevo</a>
                </li>
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
<div style="height:1000px; background-image: url(img/6.jpg)" id="principal">

    <div id="infoprincipal" style="display:inline-block;">

         @forelse ($docs as $grupo)
                <div class="documento">
                    <form action="/CargarDocDesdePrincipal" method="get">
                    <p class="tituloDoc"><strong><em>{{$grupo->titulo}}</em></strong></p>
                        <input type="hidden" name="fileToLoad" value="{{$grupo->titulo}}">
                    <button type="submit" class="btn btn-info" style="margin-left:5px; margin-top: 175px" type="button">Cargar</button>
                    </form>

                    <form action="/BorrarDoc" >
                        <input type="hidden" name="fileToDel" value="{{$grupo->idDocumento}}">
                        <button type="submit" class="btn btn-link delete" style="margin-left:120px; margin-top: -380px" type="button"><i class="glyphicon glyphicon-remove-sign"></i></button>
                    </form>

                    <button type="button" class="btn btn-warning" data-toggle="modal" data-id="{{$grupo->idDocumento}}" data-target="#CompartirModal" class="page-scroll"
                            style="margin-left:80px; margin-top: -95px" id="coco">Compartir</button>

                </div>

            @empty

            @endforelse
             <input type="text" name="docactual" id="da">
    </div>
</div>



<div class="modal fade" id="CompartirModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Compartir documento</h4>
            </div>
            <div class="modal-body">
                <b>Ingrese nombre del usuario:</b>
                <form class="navbar-form " role="search">
                    <div class="input-group">
                        <input type="text" name="agregarMiembro" id="inputo" class="form-control" placeholder="Agregue un compañero...">
                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>
                    </div>
                    <div class="displaygroup"></div>
                </form>


            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal" data-target="#loadModal">Cancelar</button>
            </div>
        </div>

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
