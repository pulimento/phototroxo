<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<title>Phototroxo - Buscador de usuarios</title>
		<meta name="author" content="Javi Pulido" />
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_buscar_usuarios.css" />
	</head>
	<body>
		<!-- Cabecera(logo y menú) -->
		<?php
		include ("cabecera.php");
		?> <!-- Contenido -->
		<div id="div_content">
			Aquí lo que habría que poner es un formulario con un solo campo de búsqueda,</br>
			hacer la consulta SQL correspondiente, y buscar por nombre de usuario. Luego habría que</br>
			mostrar los resultados en una lista. Hay código muy parecido en lo de mostrar comentarios.
		</div>
		<!-- Pie de página -->
		<?php
		include ("piedepagina.php");
		?>
	</body>
</html>