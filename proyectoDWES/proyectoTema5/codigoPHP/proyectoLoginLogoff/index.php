<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
:root{
    --colorLetra:black;
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
  color: var(--colorLetra);
}
.main {
  float:left;
  width:60%;
  padding:0 20px;
}
.right {
  background-color:#e5e5e5;
  float:left;
  width:20%;
  padding:15px;
  margin-top:7px;
  text-align:center;
}

@media only screen and (max-width:620px) {
  /* For mobile phones: */
  .menu, .main, .right {
    width:100%;
  }
}
</style>
</head>
<body style="font-family:Verdana;color:#aaaaaa;">

<div style="background-color:#e5e5e5;padding:15px;text-align:center;">
  <h1>Proyecto LogInLogOut</h1>
  <h3>Diseño temporal</h3>
</div>

<div style="overflow:auto">
  <div class="menu">
    <a href="#">Home</a>
    <a href="#">Catálogo</a>
    <a href="#">Sobre nosotros</a>
    <a href="codigoPHP/login.php">Ir al login</a>
  </div>

  <div class="main">
    <h2>Título</h2>
    <p>Contenido de la web.</p>
  </div>

  <div class="right">
    <h2>Acerda de</h2>
    <p>Información adicional</p>
  </div>
</div>

<div style="background-color:#e5e5e5;text-align:center;padding:10px;margin-top:7px;">©AlexDominguez width w3schools™</div>

</body>
</html>