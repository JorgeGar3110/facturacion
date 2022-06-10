<html>
    <head>
        <title>ERROR 404</title>
        <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
        <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
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
                font-weight: 100;
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
            }
            .title {
                font-size: 72px;
                margin-bottom: 40px;
                color: black;
            }
            .backHome{
              color: #000000;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">ERROR DE SUBIDA</div>
                <font color="black" face="helvetica"><div class="" >Hubo un problema al subir el archivo, supera los 200M permitidos.</div></font>
                <div class=""> <a href="{{url ('home')}}"><font color="black" face="helvetica"><b>Click aquí para regresar a inicio...</b></font></a> </div>
            </div>
        </div>
    </body>
</html>
