<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<title>Phototroxo - Buscarfoto</title>
		<meta name="author" content="Javi Pulido" />
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_formulario2.css" />
	</head>
	<body>
		<!-- Cabecera(logo y menú) -->
		<?php
		include ("cabecera.php");
		?> <!-- Contenido -->
		<div id="div_content">
			<?php

			$titulo = $_GET['titulo'];
			$valido = true;

			if ($foto == "") {
				echo "- El titulo de la foto no puede ser vacío
			<br/>
			";
				$validado = false;
			}

			if ($validado) {
				$config = array();
				$config["sql_host"] = "localhost";
				$config["sql_user"] = "root";
				$config["sql_pass"] = "******";
				$config["sql_database"] = "phototroxo";
				$sql_link = @mysql_connect($config['sql_host'], $config['sql_user'], $config['sql_pass']) or die(mysql_error($sql_link));
				@mysql_select_db($config['sql_database'], $sql_link);

				$q = "SELECT * FROM `authorize` WHERE titulo = '$titulo'";
				$result = mysql_query($q, $sql_link) or die(mysql_error($sql_link));
				$snd_tot = mysql_num_rows($result);
				mysql_free_result($result);
			}
			?>
		</div>
		<!-- Pie de página -->
		<?php
		include ("piedepagina.php");
		?>
	</body>
</html>