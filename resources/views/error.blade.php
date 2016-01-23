<!DOCTYPE html>
<html>
    <head>
        <title>Error!! </title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/style1.css"/>
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <link href="css/simple-sidebar.css" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

        <!-- Custom Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

        <!-- Plugin CSS -->
        <link rel="stylesheet" href="css/animate.min.css" type="text/css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/creative.css" type="text/css">
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
                color:black;
                font-size: 25px;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <div class="content">
                <img height="50px" width="50px" src="img/AdmError.jpg">
                <div class="title"><b>Ooooops!</b></div>
                <b>{{$error}}</b><br><br>
                <a href="/" class="btn btn-default btn-lg active" role="button">Volver a intentar </a>

            </div>
        </div>
    </body>
</html>
