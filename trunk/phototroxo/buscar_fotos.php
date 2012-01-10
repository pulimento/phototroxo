<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Phototroxo - Buscador de Fotos</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_buscar_fotos.css" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<meta name="author" content="Patricia_Raigada" />
	</head>
	<body>
		<!-- Cabecera(logo y menú) -->
		<?php
		include ("cabecera.php");
		?> <!-- Contenido -->
		<div id="div_content">
			<form action="buscarFotos.php" method="post">
				<label for="palabra">Buscar Foto:</label>
				<input type="text" name="palabra" />
				<input type="submit" name="boton" value="Buscar" />
			</form>
		</div>
		<!-- Pie de página -->
		<?php
		include ("piedepagina.php");
		?>
	</body>
</html>