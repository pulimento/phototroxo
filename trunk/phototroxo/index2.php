<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Phototroxo - Inicio</title>
		<link href="images/favicon.ico" rel="shortcut icon" />
		<meta name="author" content="Patricia Raigada" />
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_index2.css" />
	</head>
	<body>
		<!-- Header -->
		<div id="div_header">
			<img id="img_header" src="images/header.png" alt="Phototroxo"/>
		</div>
		<!-- Contenido -->
		<div id="div_content">
			<!-- Procesamiento del formulario e inserción en la base de datos si procede -->
			<?php

			//tenemos que ver qué es lo que se va a mostrar una vez que el usuario esté registrado

			//Definición de variables
			$user = $_POST['user'];
			$password = $_POST['password'];
			$validado = true;

			//Validación del lado del servidor

			if (strlen($user) < 4) {
				echo "- El usuario debe tener al menos cuatro caracteres<br/>";
				$validado = false;
			}

			if (strlen($password) < 6) {
				echo "- La contraseña debe tener al menos seis caracteres<br/>";
				$validado = false;
			}

			//FIN DE LA VALIDACION DEL LADO DEL SERVIDOR

			/*echo $user."<br/>";
			 echo $password."<br/>";
			 echo $sexo."<br/>";
			 echo $dniconletra."<br/>";
			 echo $nombre."<br/>";
			 echo $apellidos."<br/>";
			 echo $email."<br/>";
			 echo $_POST['datepicker']."<br/>";
			 echo $fecha[0]."<br/>";
			 echo $fecha[1]."<br/>";
			 echo $fecha[2]."<br/>";
			 echo "FechaSQL ".$fechaSQL."<br/>";
			 echo $calle."<br/>";
			 echo $poblacion."<br/>";
			 echo $provincia."<br/>";*/

			if ($validado) {
				$link = mysql_connect("localhost", "root", "");
				mysql_select_db("phototroxo", $link);

				// Con esta sentencia SQL insertaremos los datos en la base de datos
				mysql_query("INSERT INTO usuario (User,Pass) VALUES ('$user','$password')", $link);

				// Ahora comprobaremos que todo ha ido correctamente (tratamiento de errores)
				$my_error = mysql_error($link);

				if (!empty($my_error)) {
					echo "Ha habido un error al insertar los valores. $my_error";
				} else {

				}	echo "Los datos han sido introducidos satisfactoriamente ;)";
			} else {
				echo "<br/><br/>Los datos que ha introducido no son válidos, por favor vuelva a intentarlo";
			}
			?>
		</div>
	</body>
</html>