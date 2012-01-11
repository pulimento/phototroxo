<?php
session_start();
$titulo = $_POST["palabra"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Phototroxo - Resultados de la b&uacute;squeda de fotos</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_fotos.css" />
		<link href="images/favicon.ico" rel="shortcut icon" />
	</head>
	<body>
		<!-- Cabecera(logo y menú) -->
		<?php
		include ("cabecera.php");
		?> <!-- Contenido -->
		<div id="div_content">
			<?php
            $validado = true;
			//Validación del lado del servidor

			if (strlen($titulo) < 4) {
				echo "- El titulo debe tener al menos cuatro caracteres
			<br/>
			";
				$validado = false;
			}

			
			
			//Conectar base de datos
			if($validado){
			$link = mysql_connect("localhost", "root", "") or die ;
			mysql_select_db("phototroxo", $link);

			// Ahora comprobaremos que todo ha ido correctamente (tratamiento de errores)
			$my_error = mysql_error($link);

			echo '<h2 id="text_busca">Resultados de la b&uacute;squeda de fotos</h2>';
			if (!empty($my_error)) {//Si hay error accediendo a la BD
				echo "Ha habido un error accediendo a la base de datos. Inténtelo más tarde. $my_error";
			} else {
				$resultfotos = mysql_query("SELECT i.ruta, i.rutathumbnail, i.idI FROM imagen i
				WHERE i.titulo LIKE '%$titulo%' ORDER BY i.idI DESC", $link) or die ;
				$numFotos = mysql_num_rows($resultfotos);
				if ($numFotos > 0) {//Si hay alguna foto
					echo '<table id="tabla_fotos">';
					while ($numFotos > 4) {
						echo '<tr>';
						for ($j = 0; $j < 4; $j++) {
							$foto = mysql_fetch_array($resultfotos);
							echo '<td class="celda_tabla_fotos">';
							echo '<a href="verfoto.php?idI=' . $foto['idI'] . "\">
<img class=\"foto_tabla\" src=\"" . $foto["rutathumbnail"] . "\"</img></a></td>";
						}
						echo '</tr>';
						$numFotos -= 4;
					}
					if ($numFotos <= 4) {//Si quedan más fotos por mostrar, o si había menos de cuatro fotos
						echo '<tr>';
						for ($j = 0; $j < $numFotos; $j++) {
							$foto = mysql_fetch_array($resultfotos);
							echo '<td class="celda_tabla_fotos">';
							echo "<a href=\"verfoto.php?idI=" . $foto["idI"] . "\">
<img class=\"foto_tabla\" src=\"" . $foto["rutathumbnail"] . "\"</img></a></td>";
						}
						echo '</tr>';
					}

					//Cerramos las etiquetas de la tabla
					echo "</table>";
				} else {
					echo 'No se ha encontrado ninguna foto con los criterios de búsqueda especificados';
				}
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