<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Tus Fotos</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_fotos.css" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<meta name="author" content="Cristina" />
	</head>
	<body>
		<!-- Cabecera(logo y menú) -->
		<?php include("cabecera.php"); ?>
		
		<!-- Contenido -->
		<div id="div_content">
			<h2 id="text_busca">Tus Fotos</h2>
			<p>Aqui iran las fotos del propio usuario</p>
		</div>
	</body>
</html>
