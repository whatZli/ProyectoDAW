<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            :root{
                --colorLetraMain:white;
                --colorLetraHeader:black;
                --colorLetraAside:black;
                --colorLetraFooter:black;
            }
            * {
                box-sizing: border-box;
                margin:0;
                padding: 0;
            }
            body{
                width: 100%;
                height: 100vh;
                background-image: radial-gradient( circle farthest-corner at -8.9% 51.2%,  rgba(255,124,0,1) 0%, rgba(255,124,0,1) 15.9%, rgba(255,163,77,1) 15.9%, rgba(255,163,77,1) 24.4%, rgba(19,30,37,1) 24.5%, rgba(19,30,37,1) 66% );
            }
            header{
                background-color:#e5e5e5;
                padding:15px;
                text-align:center;
                color: var(--colorLetraHeader);
            }
            .menu {
                float:left;
                width:20%;
                text-align:center;
            }
            .menu a {
                background-color:#e5e5e5;
                padding:8px;
                margin-top:7px;
                display:block;
                width:100%;
                color: black;
            }
            .main {
                float:left;
                width:60%;
                background-color: rgba(123, 120, 124, 0.2);
                padding:0 20px;
                color: var(--colorLetraMain);
            }
            .column {
                float: left;
                width: 33.33%;
                padding: 15px;
            }
            .right {
                background-color:#e5e5e5;
                float:left;
                width:20%;
                padding:15px;
                margin-top:7px;
                text-align:center;
                color: var(--colorLetraAside);
            }
            footer{
                color: var(--colorLetraFooter);
            }
            @media only screen and (max-width:620px) {
                /* For mobile phones: */
                .menu, .main, .right ,.row, .column{
                    width:100%;
                }
            }
        </style>
    </head>
    <body style="font-family:Verdana;color:#aaaaaa;">

        <header>
            <h1>Proyecto LogInLogOut</h1>
        </header>

        <div style="overflow:auto">
            <div class="menu">
                <a href="#">Home</a>
                <a href="codigoPHP/login.php">Ir al login</a>
            </div>

            <div class="main">
                <h2>Contenido de la web</h2>
                <div class="row">
                    <div class="column">
                        <h2>Articulo</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="column">
                        <h2>Articulo</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="column">
                        <h2>Articulo</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <h2>Articulo</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="column">
                        <h2>Articulo</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>

            <div class="right">
                <h2>Acerda de</h2>
                <p>Información adicional</p>
            </div>
        </div>

        <footer style="background-color:#e5e5e5;text-align:center;padding:10px;margin-top:7px;">©2019 AlexDominguez</footer>

    </body>
</html>