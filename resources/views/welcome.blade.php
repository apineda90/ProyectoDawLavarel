<!DOCTYPE html>
<html lang="sp">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Diagram-POl</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

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
                <a class="navbar-brand page-scroll" href="#page-top">Diagram Pol</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#login">Login</a>
                    </li>

                    <li>
                        <a class="page-scroll" href="#registro">Registro</a>
                    </li>

                    <li>
                        <a class="page-scroll" href="#about">Acerca de</a>
                    </li>

                   </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header id="login">
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Diagram POl</h1>
                <hr>
                <p>Una nueva herramienta modeladora de tipo colaborativa, para ti!</p>

                <form action="/login" method="post">
		<meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group" align="center">
                        <label>Usuario:</label>

                        <div class="input-group">
                            <input  style="color:black"
                                    type="text"
                                    pattern="^[a-zA-Z]{1,}$"
                                    required
                                    title="Usuario de correo @espol.edu.ec"
                                    placeholder="Usuario de Espol"
                                    name="username"
                                    autocomplete="on"
                                    autofocus/>

                        </div>
                    </div>
                    <div class="form-group" align="center">
                        <label>Contraseña:</label>
                        <div class="input-group">

                            <input
                                    style="color:black"
                                    type="password"
                                    pattern="^((?=.*[a-z])(?=.+[A-Z])(?=.+\d).{6,12})$"
                                    required
                                    title="Contraseña"
                                    placeholder="Contraseña"
                                    name="passwordLog"
                                    autocomplete="on"/>
                        </div>
                    </div>
                    <div class="form-group">

                        <button type="submit" class="btn btn-primary" >
                            Ingresar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </header>


    <section id="registro" >
        <div class="container" style="background-image:url(img/ee.jpg)">
            <div class="row">
                <div class="col-md-6 col-sm-12 pull-left" >
                    <div class="sign-up-wrapper wrapper-background2">

                        <h1 >Registrate !!</h1>
                        <p>¡Disfruta de una nueva herramienta!</p>
                        <br/>

                        <form align="right" action="/registro" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group" >
                                <label >Usuario:</label>
                                <div class="input-group">

                                    <input  style="background-color: white"
                                            type="text"
                                            pattern="^[a-zA-Z]{1,}$"
                                            required
                                            title="Usuario de correo @espol.edu.ec"
                                            placeholder="Usuario de Espol"
                                            name="username"
                                            autocomplete="on">
                                </div>
                            </div>

                            <div class="form-group">
                                <label >Contraseña:</label>
                                <div class="input-group">
                                    <input  style="background-color: white"
                                            type="password"
                                            pattern="^((?=.*[a-z])(?=.+[A-Z])(?=.+\d).{6,12})$"
                                            required
                                            title="Debe tener al menos un numero y una mayúscula, mínimo 6 caracteres, máximo 12"
                                            placeholder="Contraseña Diagram-Pol"
                                            name="passwordRegistro"
                                            autocomplete="on">
                                </div>
                            </div>
                            <div class="form-group" >
                                <label >Nombres:</label>
                                <div class="input-group">

                                    <input  style="background-color: white"
                                            type="text"
                                            title="Nombres y Apellidos"
                                            placeholder="Nombres y Apellidos"
                                            name="nombresReg"
                                            required
                                            autocomplete="on">
                                </div>
                            </div>

                            <div class="form-group" >
                                <label >Correo:</label>
                                <div class="input-group">

                                    <input  style="background-color: white"
                                            type="text"
                                            title="Correo"
                                            placeholder="Correo Electronico"
                                            name="emailReg"
                                            autocomplete="on">
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-facebook fa-fw"></i>
                                </button>
                                </button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-twitter fa-fw"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <section id="about" class="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Crea tus propios diseños de base de datos</h2>
                        <p class="lead">Desarrolladores: Angel Pineda, Kevin Filella</p>
                    </div>
                </div>
                <!-- /.row -->
            </div>
         </section>

    <!--<section id="contact">-->
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
                            <a href="#"><i class="fa fa-dribbble fa-fw fa-3x"></i></a>
                        </li>
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; Fiec 2015</p>
                </div>
            </div>
        </div>
    <!--</section>-->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

</body>

</html>
