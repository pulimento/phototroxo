<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Buscar Fotos</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_buscar_fotos.css" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<meta name="author" content="Javi Pulido" />
	</head>
	<body>
		<!-- Cabecera(logo y menú) -->
		<?php
		include ("cabecera.php");
		?> <!-- Contenido -->
		<div id="div_content">
			
			Aquí lo que habría que poner es un formulario con un solo campo de búsqueda,</br>
			hacer la consulta SQL correspondiente, y buscar por título de foto. Luego habría que</br>
			mostrar los resultados en una lista
						
		</div>
		<!-- Pie de página -->
		<?php
		include ("piedepagina.php");
		?>
	</body>
</html>