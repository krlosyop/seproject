<!DOCTYPE HTML>
<html>
<head>
<title>Iniciar Sesi�n</title>
<link rel="stylesheet" type="text/css" href="css/sesion.css" />
</head>

<body>
<form class="boxlogin" action="login.php" name="login" method="POST">
	<div class="boxBody">
	  <label>Usuario</label>
	  <input type="text" tabindex="1" placeholder="Usuario" name="usuario"/>
	  <label>Contrase�a</label>
	  <input type="password" tabindex="2" name="contrasena"/>
	  <input type="hidden" name="login" />
	</div>
	<footer>
	<div class="btnLogin" onClick="document.login.submit();">
	  Iniciar Sesi�n
	</div>
	</footer>
</form>
</body>
</html>
