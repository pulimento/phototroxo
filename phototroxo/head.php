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
		?> <!-- Contenido -->
		<div id="ultimasfotos">
			<h2> &Uacute;ltimas fotos subidas por t&iacute; </h2>
			<?php
			$link = mysql_connect("localhost", "root", "") or die ;
			mysql_select_db("phototroxo", $link);

			// Ahora comprobaremos que todo ha ido correctamente (tratamiento de errores)
			$my_error = mysql_error($link);

			if (!empty($my_error)) {//Si hay error accediendo a la BD
				echo "Ha habido un error accediendo a la base de datos. Inténtelo más tarde. $my_error";
			} else {
				$result = mysql_query("SELECT i.ruta, i.titulo, i.idI FROM imagen i
			WHERE idU = '$idU' ORDER BY idI DESC LIMIT 4", $link);
				if (mysql_num_rows($result) > 0) {
					for ($i = 0; $i < mysql_num_rows($result); $i++) {
						//Añade las fotos de la base de datos a un array
						$arrayfotos[$i] = mysql_fetch_row($result);
					}
					//Mostrar las fotos
					echo "<table id=\"tabla_ultimasfotos\"><tr>";
					//Inicio de la tabla
					for ($j = 0; $j < mysql_num_rows($result); $j++) {
						echo "<td class=\"celda_tabla_fotos\">";
						echo "<a href=\"verfoto.php?idI=" . $arrayfotos[$j][2] . "\">
			<img class=\"foto_tabla\" src=\"" . $arrayfotos[$j][0] . "\"</img></a></td>";
					}
					//Cerramos las etiquetas de la tabla
					echo "</tr></table>";
				} else {
					echo "¡Aún no has subido ninguna foto! <a href=\"subir_fotos.php\">Sube alguna</a> para empezar";
				}
			}
			?>
			</div>
			<div id="ultimoscomentarios">
			<h2>
			&Uacute;ltimos comentarios en las fotos que has subido
			</h2>
			<?php
			function fechaespanola($fechainglesa) {
				list($a, $m, $d) = explode("-", $fechainglesa);
				return $d . "-" . $m . "-" . $a;
			};

			if (!empty($my_error)) {//Si hay error accediendo a la BD
				echo "Ha habido un error accediendo a la base de datos. Inténtelo más tarde. $my_error";
			} else {
				$resultcomentario = mysql_query("SELECT u.nombre AS name, c.comentario AS comment,
			c.fechaC FROM comentario AS c NATURAL JOIN imagen AS i NATURAL JOIN usuario AS u
			WHERE i.idU = '" . $idU . "' ORDER BY c.idC LIMIT 4", $link) or die ;
				$numcomentarios = mysql_num_rows($resultcomentario);
				if ($numcomentarios > 0) {
					echo "<ul>";
					for ($cont = 0; $cont < $numcomentarios; $cont++) {
						$comentario = mysql_fetch_array($resultcomentario);
						$comentario_user = $comentario["name"];
						$comentario_comentario = $comentario["comment"];
						$comentario_fecha = fechaespanola($comentario["fechaC"]);
						echo "<li>El " . $comentario_fecha . ", " . $comentario_user . " comentó: " . $comentario_comentario . "</li><br/>";
						//echo "user -> " . $comentario_user . "<br/>";
						//echo "comentario ->" . $comentario_comentario . "<br/>";
					}
					echo "</ul>";
				} else {
					echo "No hay comentarios para mostrar";
				}
			}
			?>

			</div>

			<!-- Pie de página -->

			<?php
			include ("piedepagina.php");
			?>
			</body>
			</html>
