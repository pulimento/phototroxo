<?php
session_start();
$idU = $_SESSION["idUsuario"];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_head.css" />
		<title>P&aacute;gina de inicio</title>
		<meta name="author" content="alumno" />
	</head>
	<body>
		<!-- Cabecera(logo y menú) -->
		<?php
		include ("cabecera.php");
		?>

		<!-- Contenido -->
		<div id="ultimasfotos">
			<h2>
				&Uacute;ltimas fotos subidas
			</h2>
			<?php
			$link = mysql_connect("localhost", "root", "") or die ;
			mysql_select_db("phototroxo", $link);
			echo "idUsuario-> " . $idU . "<br/>";
			$result = mysql_query("SELECT i.ruta, i.titulo, i.idI FROM imagen i WHERE idU = '$idU' ORDER BY idI DESC LIMIT 4", $link);
			echo "<br/>la consulta devuelve " . mysql_num_rows($result) . " tupla(s)<br/>";
			for ($i = 0; $i < mysql_num_rows($result); $i++) {
				//Añade las fotos de la base de datos a un array
				$arrayfotos[$i] = mysql_fetch_row($result);
			}

			// Ahora comprobaremos que todo ha ido correctamente (tratamiento de errores)
			$my_error = mysql_error($link);

			if (!empty($my_error)) {//Si hay error accediendo a la BD
				echo "Ha habido un error accediendo a la base de datos. Inténtelo más tarde. $my_error";
			} else {
				//Mostrar las fotos
				echo "<table id=\"tabla_ultimasfotos\"><tr>";//Inicio de la tabla
				for ($j = 0; $j < mysql_num_rows($result); $j++) {
					echo "<td class=\"celda_tabla_fotos\"><img class=\"foto_tabla\" src=\"" . $arrayfotos[$j][0] . "\"</img></td>";
				}
				echo "</tr></table>";//Cerramos las etiquetas de la tabla
			}
			?>
		</div>
		<div id="ultimoscomentarios">
			<h2>
				&Uacute;ltimos comentarios
			</h2>
		</div>
		<div id="quienessomos">
			<a href="quienessomos.html">&iquest;Qui&eacute;nes somos?</a>
		</div>
		<div id="sugerencia">
			<a href="mailto:staff@phototroxo.com">Env&iacute;anos una sugerencia</a>
		</div>
	</body>
</html>