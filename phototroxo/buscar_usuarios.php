<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<title>Phototroxo - Buscador de usuarios</title>
		<meta name="author" content="Patricia Raigada" />
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_buscar_usuarios.css" />
	</head>
	<body>
		<!-- Cabecera(logo y menú) -->
		<?php
		include ("cabecera.php");
		?> <!-- Contenido -->
		<div id="div_content">
			<form action="buscarUsuarios.php" method="post">
			Buscar Usuario: <input name="palabra">
			<input type="submit" name="buscador" value="Buscar">
			</form>
		</div>
		<!-- Pie de página -->
		<?php
		include ("piedepagina.php");
		?>
	</body>
</html>