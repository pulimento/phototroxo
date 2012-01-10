<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Buscar Fotos</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_buscar.css" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<meta name="author" content="Patricia_Raigada" />
	</head>
	<body>
		<!-- Cabecera(logo y menú) -->
		<?php
		include ("cabecera.php");
		?> <!-- Contenido -->
		<?php
		$titulo = $_POST["palabra"];
		?>

		<div id="div_content">
			<?php
			/*header ("Content-type: image/gif");*/

			//Conectar base de datos
			$link = mysql_connect("localhost", "root", "") or die ;
			mysql_select_db("phototroxo", $link);

			// Ahora comprobaremos que todo ha ido correctamente (tratamiento de errores)
			$my_error = mysql_error($link);
echo "titulo -> " . $titulo;

			$result = mysql_query("SELECT i.rutathumbnail FROM imagen AS i WHERE i.titulo = '$titulo'", $link);
			echo "resultados -> " . mysql_num_rows($result);

			if (!empty($my_error)) {//Si hay error accediendo a la BD
				echo "Ha habido un error accediendo a la base de datos. Inténtelo más tarde. $my_error";
			} else {
				
				if (mysql_num_rows($result) > 0) {
					
					for ($i = 0; $i < mysql_num_rows($result); $i++) {
						$array = mysql_fetch_array($result);
						$ruta = $array["rutathumbnail"];

						echo "<img src=\"" . $ruta . "\" />";
					}
				} else {
					echo 'sin resultados';
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