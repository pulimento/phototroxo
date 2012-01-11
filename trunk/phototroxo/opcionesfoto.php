<?php
session_start();
$idU = $_SESSION["idUsuario"];
$idFoto = $_GET["idI"];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Phototroxo - Opciones de foto</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_opciones_foto.css" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<meta name="author" content="Javi Pulido" />
	</head>
	<body>
		<!-- Cabecera(logo y menú) -->
		<?php
		include ("cabecera.php");
		?>

		<!-- Contenido -->
		<div>
			<h2>Opciones de foto</h2>
			<div id="modificartitulo">
				<h3>Modificar el t&iacute;tulo de la foto</h3>
				<form id="form_modificar_titulo" action="modificartitulofoto.php" method="get">
					<label for="titulo">Introduce el nuevo t&iacute;tulo de la foto : </label>
					<input type="text" name="titulo" />
					<input type="hidden" name="idI" value="<?php echo $idFoto;?> "; />
					<button id="button_subirfoto">
						Modificar
					</button>
				</form>
			</div>
			<div id="borrarfoto">
				<h3>Borrar la foto</h3>
				<?php
				echo 'Si quieres borrar esta foto, pulsa <a href="borrarfoto.php?idI=' . $idFoto . '">aqu&iacute;</a>';
				?>
			</div>
		</div>
		<!-- Pie de página -->
		<?php
		include ("piedepagina.php");
		?>
	</body>
</html>