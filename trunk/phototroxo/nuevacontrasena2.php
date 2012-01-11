<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
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

		//Definicion de variables

		$user = $_POST['user'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		$validado = true;

		//validacion de datos

		if (strlen($user) < 4) {
			echo "- El usuario debe tener al menos cuatro caracteres
		<br/>
		";
			$validado = false;
		}
		
		if($password != $password2){
			echo "- Las contrase&ntilde;as no coinciden
			<br/>
			";
			$validado = false;
		}

		if (strlen($password) < 6) {
			echo "- La contrase&ntilde;a debe tener al menos seis caracteres
		<br/>
		";
			$validado = false;
		}
		//fin de validacion de datos, conexion con la base de datos

		if ($validado) {
			$link = mysql_connect("localhost", "root", "") or die ;
			mysql_select_db("phototroxo", $link);
			
			$result = mysql_query("SELECT * FROM usuario WHERE User='$user'", $link);

			$result = mysql_query("UPDATE usuario SET Pass='$password' where User='$user'",$link);

			$my_error = mysql_error($link);

			if (!empty($my_error)) {
				echo "Ha habido un error al insertar los valores. $my_error";
			} else {
				echo "Tu contrase&ntilde;a ha sido cambiada correctamente, " . $user . " ;)
		<br/>
		<br/>
		";
				echo "Puedes volver a la <a id=\"inicio\" href=\"index.html\">p&#225;gina principal</a> para iniciar sesi&#243;n";
			}
		} else {// No se ha superado la validaci&#243;n del lado del servidor
			echo "<br/><br/>Los datos que ha introducido no son v&#225;lidos, por favor <a href=\"#\" onclick=\"history.back(1);return false\">vuelva a intentarlo</a>";
		}
		?>
		<!-- Pie de p&#225;gina -->
		<?php
		include ("piedepagina.php");
		?>
	</body>
</html>
