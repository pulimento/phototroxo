<?php
session_start();
$idU = $_SESSION["idUsuario"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Phototroxo - Modificar el t&iacute;tulo de la foto</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_borrar_foto.css" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<meta name="author" content="Javi Pulido" />
	</head>
	<body>
		<!-- Cabecera(logo y menú) -->
		<?php
		include ("cabecera.php");
		?>

		<div id="div_content">
			<?php
			$idFoto = $_GET["idI"];
			$titulo = $_GET["titulo"];
			//Conectando a la base de datos
			$link = mysql_connect('localhost', 'root', '') or die;
			mysql_select_db("phototroxo", $link);
			$result = mysql_query("UPDATE imagen SET titulo = '$titulo' WHERE idI = '$idFoto'", $link);
			$my_error = mysql_error($link);

			if (!empty($my_error)) {//Si hay error accediendo a la BD
				echo "Ha habido un error accediendo a la base de datos. Inténtelo más tarde. $my_error";
			} else {
				echo 'El título se ha modificado correctamente. <a href="verfoto.php?idI=' . $idFoto . '">Volver a la foto</a>';
			}
			?>
		</div>
		<!-- Pie de página -->
		<?php
		include ("piedepagina.php");
		?>
	</body>
</html>
