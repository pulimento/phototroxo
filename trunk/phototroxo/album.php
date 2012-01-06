<?php
session_start();
$usuarioAlbum = $_GET['idU'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Phototroxo - &Aacute;lbum de Fotos</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_fotos.css" />
		<link href="images/favicon.ico" rel="shortcut icon" />
	</head>
	<body>
		<!-- Cabecera(logo y menú) -->
		<?php
		include ("cabecera.php");
		?>

		<!-- Contenido -->
		<div id="div_content">
			<?php
			$link = mysql_connect("localhost", "root", "") or die ;
			mysql_select_db("phototroxo", $link);

			// Ahora comprobaremos que todo ha ido correctamente (tratamiento de errores)
			$my_error = mysql_error($link);

			if (!empty($my_error)) {//Si hay error accediendo a la BD
				echo "Ha habido un error accediendo a la base de datos. Inténtelo más tarde. $my_error";
			} else {
				//Obtenemos el nombre y el apellido del usuario del álbum
				$resultusername = mysql_query("SELECT u.Nombre AS nom, u.Apellidos AS ape FROM usuario AS u WHERE u.idU = '$usuarioAlbum'", $link) or die ;
				$array_usuarioAlbum_name = mysql_fetch_array($resultusername);
				$usuarioAlbum_name = $array_usuarioAlbum_name["nom"];
				$usuarioAlbum_apellidos = $array_usuarioAlbum_name["ape"];
			}
			?>

			<h2 id="text_busca">&Aacute;lbum de fotos de <?php echo $usuarioAlbum_name . " " . $usuarioAlbum_apellidos;?></h2>
			<?php
			//Ya se ha hecho previamente la conexión a la BD
			if (!empty($my_error)) {//Si hay error accediendo a la BD
				echo "Ha habido un error accediendo a la base de datos. Inténtelo más tarde. $my_error";
			} else {
				$resultfotos = mysql_query("SELECT i.ruta, i.rutathumbnail, i.idI FROM imagen i
WHERE idU = '$usuarioAlbum' ORDER BY i.idI DESC", $link) or die ;
				$numFotos = mysql_num_rows($resultfotos);
				if ($numFotos > 0) {//Si hay alguna foto
					echo "<table id=\"tabla_fotos\">";
					while ($numFotos > 4) {
						echo '<tr>';
						for ($j = 0; $j < 4; $j++) {
							$foto = mysql_fetch_array($resultfotos);
							echo "<td class=\"celda_tabla_fotos\">";
							echo "<a href=\"verfoto.php?idI=" . $foto["idI"] . "\">
<img class=\"foto_tabla\" src=\"" . $foto["rutathumbnail"] . "\"</img></a></td>";
						}
						echo '</tr>';
						$numFotos -= 4;
					}
					if ($numFotos <= 4) {//Si quedan más fotos por mostrar, o si había menos de cuatro fotos
						echo '<tr>';
						for ($j = 0; $j < $numFotos; $j++) {
							$foto = mysql_fetch_array($resultfotos);
							echo "<td class=\"celda_tabla_fotos\">";
							echo "<a href=\"verfoto.php?idI=" . $foto["idI"] . "\">
<img class=\"foto_tabla\" src=\"" . $foto["rutathumbnail"] . "\"</img></a></td>";
						}
						echo '</tr>';
					}

					//Cerramos las etiquetas de la tabla
					echo "</table>";
				} else {
					echo "¡Aún no has subido ninguna foto! <a href=\"subir_fotos.php\">Sube alguna</a> para empezar";
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
