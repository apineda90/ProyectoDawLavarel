<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jQueryRotate.js" ></script>
    <script src="js/jquery-1.11.3.js" ></script>
    <script src="js/jsPlumb-2.0.4.js" ></script>
    <script src="js/bootstrap.js" ></script>
    <script src="js/script1.js" ></script>
    <script src="js/script2.js" ></script>
    <script src="js/jquery.js" ></script>
    <script src="js/jquery-ui.js" ></script>
    <script src="js/jquery-ui.min.js" ></script>
    <script src="http://parall.ax/parallax/js/jspdf.js"></script>
    <script src="js/html2canvas.js" ></script>
    <link rel="stylesheet" href="css/style1.css"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <script src="http://www.google.com/jsapi" type="text/javascript"></script>
    <script src="//js.pusher.com/3.0/pusher.min.js"></script>

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
<?php 
    if(empty($title)){
        $title = "Untitled";
    }
?>
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

            <a class="navbar-brand page-scroll" href="#page-top" id="menu-toggle">Tools:
                <span id="pltv" class="pocultar"><i class="glyphicon glyphicon-eye-open"></i></span>
                <span id="plto" class="pver"><i class="glyphicon glyphicon-eye-close"></i></span>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">   

            <ul class="nav navbar-nav navbar-right">

                <li><a class="page-scroll" href="/perfil">
                        Bienvenido, {{$user}}</a></li>
                <li><a class="page-scroll" href="#">
                         Doc: {{$title}}</a>

                </li>
                <li>
                    <a class="page-scroll" href="/principal"><i class="glyphicon glyphicon-home"></i> Principal</a>
                </li>
                <li>
                    <a class="page-scroll" href="/compartidos"><i class="glyphicon glyphicon-user"></i>
                        <i class="glyphicon glyphicon-user"></i> Compartidos</a>
                </li>
                <li>
                    <a data-toggle="modal" id="htmlListo" data-target="#saveModal" class="page-scroll" href="#"><i class="glyphicon glyphicon glyphicon-asterisk"></i> Crear</a>
                </li>
                <li>
                    <a data-toggle="modal" id="htmlModif" data-target="#modifModal" class="page-scroll" href="#"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</a>
                </li>
                 <li>
                    <a data-toggle="modal" data-target="#exportModal" class="page-scroll" href="#"><i class="glyphicon glyphicon glyphicon-download-alt"></i> Exportar</a>
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
        <div id="canvas" class="canvas" name="canvas">
        <?php
            if(!empty($doc)){
               echo $doc->grafico; 
            }
            else error_log("jiggly");
        ?>
        </div>
        <!-- /#page-content-wrapper -->

  <!-- Modal -->
  <div class="modal fade" id="saveModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
   
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Guardar documento</h4>
        </div>
        <div class="modal-body">
             <form name="formSaveDoc" action="/newDoc" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="HTMLCanvas" name="getHTML">
                <b>  Nombre del documento</b><br>
                <input type="text" id="saveDoc" name="fileToSave"><br><br>
                <button type="submit" class="btn btn-default" id="btnGuardar">Guardar</button>
             </form>
        </div>
        <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
        
      </div>
      
    </div>
  </div>
  
</div>

  <div class="modal fade" id="loadModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cargar documento</h4>
        </div>
        <div class="modal-body">
            <b>  Nombre del documento</b><br>
            <form name="formLoadDoc" action="/loadDocum" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">  
          <input type="text" id="loadDoc" name="fileToLoad" placeholder="Archivo a cargar"><br><br>
          <button type="submit" id="btnCargar" class="btn btn-default">Cargar</button>
          </form>
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-default" data-dismiss="modal" data-target="#loadModal">Cancelar</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<div class="modal fade" id="modifModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
   
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Guardar cambios</h4>
        </div>
        <div class="modal-body">
                <b>  Desea guardar los cambios?</b><br>
        </div>
        <div class="modal-footer"> 
            <form name="formModifDoc" action="/modDocum" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                <input type="hidden" id="HTMLCanvasMod" name="getHTMLMod">
                <button type="submit" class="btn btn-default" id="okModif">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" data-target="#modifModal">Cancelar</button>
            </form>

        </div>
        
      </div>
      
    </div>
  </div>
  

    <div class="modal fade" id="exportModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
       
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Exportar documento</h4>
            </div>
            <div class="modal-body">
            <input type="text" id="exportDoc" name="fileToExport" placeholder="Exportar archivo"><br><br>
            </div>
            <div class="modal-footer"> 
                <button type="button" id="expDoc" class="btn btn-default" data-target="#exportModal">Exportar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" data-target="#exportModal">Cancelar</button>
            </div>
            
          </div>
          
        </div>
  </div>
</div>

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

<script src="//js.pusher.com/2.2/pusher.min.js"></script>
<script>
    var pusher = new Pusher("{{ 'env(PUSHER_KEY)' }}");
</script>
<script src="js/pusher.js"></script>


</body>
<script src="js/jQueryRotate.js" ></script>
</html>

