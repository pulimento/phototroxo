<?php
session_start();
?>

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
			<img id="img_header" src="images/header.png" alt="Phototroxo" />
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

			if ($validado) {
				$link = mysql_connect("localhost", "root", "") or die;
				mysql_select_db("phototroxo", $link);

				$result = mysql_query("SELECT u.User, u.Pass, u.idU, u.Nombre FROM usuario u WHERE User = '$user' AND Pass = '$password'", $link);
				$row = mysql_fetch_array($result);

				// Ahora comprobaremos que todo ha ido correctamente (tratamiento de errores)
				$my_error = mysql_error($link);

				if (!empty($my_error)) {//Si hay error accediendo a la BD
					echo "Ha habido un error accediendo a la base de datos. Inténtelo más tarde. $my_error";
				} else {
					//echo sizeof($result);
					if (!empty($row)) {//Si el usuario y contraseña son válidos
						$idUsuario = $row["idU"];
						$nombreUsuario = $row["Nombre"];
						$_SESSION["idUsuario"] = $idUsuario;
						$_SESSION["nombreUsuario"] = $nombreUsuario;
						//Mandar a head.html
						
						header('Location: head.php');
						
						//Guardar variables de sesión
						$_SESSION["idUsuario"] = $idUsuario;
						$_SESSION["nombreUsuario"] = $nombreUsuario;
					} else {//No está registrado!!
						echo "Fallo en el usuario y/o contraseña, por favor <a href=\"#\" onclick=\"history.back(1);return false\">vuelva a intentarlo</a>";
					}
				}
			} else {//Si no ha pasado la validación
				echo "<br/><br/>Los datos que ha introducido no son válidos, por favor vuelva a intentarlo";
			}
			?>
		</div>
	</body>
</html>