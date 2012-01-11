<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Phototroxo - Subir Fotos</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_subir_fotos.css" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<meta name="author" content="Javi Pulido" />
	</head>
	<body>
		<!-- Cabecera(logo y men&#250;) -->
		<?php
		include ("cabecera.php");
		?> <!-- Contenido -->
		<div id="div_content">
			<h2 id="text_subirfotos">Subir Fotos</h2>
			<form enctype="multipart/form-data" action="uploadphoto.php" method="POST">
				<div id="titulo_foto">
					<label id="label_title_uploadphoto" for="title_uploadphoto">T&#237;tulo:</label>
					<input name="title_uploadphoto" type="text" />
				</div>
				<div id="seleccionarfoto">
					<label id="label_uploadphoto" for="uploadedphoto">Selecciona una foto:</label>
					<input name="uploadedphoto" type="file" />
					<p>
						Se admiten im&#225;genes en formato JPG, PNG y GIF
					</p>
				</div>
				<button id="button_subirfoto">
					Subir foto
				</button>
			</form>
		</div>
		<!-- Pie de p&#225;gina -->
		<?php
		include ("piedepagina.php");
		?>
		
		
	</body>
</html>
