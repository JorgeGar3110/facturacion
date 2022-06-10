<html>
    <head>
        <title>Error 404</title>
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
                <div class="title"><b>ERROR 404</b></div>
                <div class="title"><b>PÁGINA NO ENCONTRADA</b></div>
                <div class=""> <a href="{{url ('home')}}"><b>Click aquí para regresar a inicio</b></a> </div>
            </div>
        </div>
    </body>
</html>
