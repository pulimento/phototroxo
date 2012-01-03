<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<title>nuevacontrasena</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_nuevacontrasena2.css" />
		<meta name="author" content="Margari" />
		<!-- Date: 2012-01-03 -->
	</head>
	<body>
		<div id="div_header">
			<img id="img_header" src="images/header.png" alt="Phototroxo"/>
		</div>
		<!-- actualizacion en la base de datos-->
		<?php
		
		$usser = $usser['usser'];
		$password = $password['password'];
		$validado = true;
		
		//validacion de datos
		
		if (strlen($user) < 4) {
				echo "- El usuario debe tener al menos cuatro caracteres<br/>";
				$validado = false;
			}
		
		if (strlen($password) < 6) {
				echo "- La contraseña debe tener al menos seis caracteres<br/>";
				$validado = false;
			}
		//fin de validacion de datos, conexion con la base de datos
		
		if ($validado) {
				$link = mysql_connect("localhost", "root", "") or die ;
				mysql_select_db("phototroxo", $link);
		}
		
		$result=mysql_query("SELECT * FROM usuario WHERE usser=$usser", $conexion);

		$result=mysql_query("UPDATE usuario SET password=$password where usser=$usser,$conexion);
		
		$my_error = mysql_error($link);

				if (!empty($my_error)) {
					echo "Ha habido un error al insertar los valores. $my_error";
				} else {
					echo "Te acabas de registrar satisfactoriamente en Phototroxo, " . $user . " ;) <br/><br/>";
					echo "Puedes volver a la <a id=\"inicio\" href=\"index.html\">página principal</a> para iniciar sesión";
				}
			} else {// No se ha superado la validación del lado del servidor
				echo "<br/><br/>Los datos que ha introducido no son válidos, por favor <a href=\"#\" onclick=\"history.back(1);return false\">vuelva a intentarlo</a>";
			}
		?>
		
		
		
	</body>
</html>
