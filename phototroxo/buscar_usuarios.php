<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Phototroxo - Buscador de Usuarios</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_buscar_usuarios.css" />
		<link href="images/favicon.ico" rel="shortcut icon" />
	</head>
	<body>
		<!-- Cabecera(logo y menú) -->
		<?php
		include ("cabecera.php");
		?> <!-- Contenido -->
		<div id="div_content">
			<form id="form_buscar_usuario" action="resultadoBuscarUsuarios.php" method="post">
				<label id="label_palabra" for="palabra">Buscar usuario:</label>
				<input id="input_palabra" type="text" name="palabra" />
				<input id="boton_submit" type="submit" name="boton" value="Buscar" />
			</form>
		</div>
		<!-- Pie de página -->
		<?php
		include ("piedepagina.php");
		?>
	</body>
</html>