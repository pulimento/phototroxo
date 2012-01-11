<?php
session_start();
$busqueda = $_POST["palabra"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Phototroxo - Resultados de la b&uacute;squeda de usuarios</title>
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

			//Conectar base de datos
			$link = mysql_connect("localhost", "root", "") or die ;
			mysql_select_db("phototroxo", $link);

			// Ahora comprobaremos que todo ha ido correctamente (tratamiento de errores)
			$my_error = mysql_error($link);

			echo '<h2 id="text_busca">Resultados de la b&uacute;squeda de usuarios</h2>';
			if (!empty($my_error)) {//Si hay error accediendo a la BD
				echo "Ha habido un error accediendo a la base de datos. Inténtelo más tarde. $my_error";
			} else {
				$resultusuarios = mysql_query("SELECT u.idU,u.nombre,u.apellidos FROM usuario AS u WHERE User LIKE '%$busqueda%'", $link);
				$numResultados = mysql_num_rows($resultusuarios);
				if ($numResultados > 0) {
					//Mostrar los resultados
					echo "<ul>";
					for ($cont = 0; $cont < $numResultados; $cont++) {
						$usuario = mysql_fetch_array($resultusuarios);
						$usuario_idU = $usuario["idU"];
						$usuario_nombre = $usuario["nombre"];
						$usuario_apellidos = $usuario["apellidos"];
						echo "<li><a href=\"album.php?idU=" . $usuario_idU . "\">" . $usuario_nombre . " " . $usuario_apellidos . "</a></li><br/>";
					}
					echo "</ul>";

				} else {
					echo 'No se ha encontrado ning&uacute;n usuario con los criterios de búsqueda especificados';
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