<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
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
			<!-- Procesamiento del formulario e inserci&#243;n en la base de datos si procede -->
			<?php

			//tenemos que ver qu&#233; es lo que se va a mostrar una vez que el usuario est&#233; registrado

			//Definici&#243;n de variables
			$user = $_POST['user'];
			$password = $_POST['password'];

			$validado = true;

			//Validaci&#243;n del lado del servidor

			if (strlen($user) < 4) {
				echo "- El usuario debe tener al menos cuatro caracteres
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

			//FIN DE LA VALIDACION DEL LADO DEL SERVIDOR

			if ($validado) {
				$link = mysql_connect("localhost", "root", "") or die ;
				mysql_select_db("phototroxo", $link);

				$result = mysql_query("SELECT u.User, u.Pass, u.idU, u.Nombre FROM usuario u WHERE User = '$user' AND Pass = '$password'", $link);
				$row = mysql_fetch_array($result);

				// Ahora comprobaremos que todo ha ido correctamente (tratamiento de errores)
				$my_error = mysql_error($link);

				if (!empty($my_error)) {//Si hay error accediendo a la BD
					echo "Ha habido un error accediendo a la base de datos. Int&#233;ntelo m&#225;s tarde. $my_error";
				} else {
					//echo sizeof($result);
					if (!empty($row)) {//Si el usuario y contrase&ntilde;a son v&#225;lidos
						$idUsuario = $row["idU"];
						$nombreUsuario = $row["Nombre"];
						$_SESSION["idUsuario"] = $idUsuario;
						$_SESSION["nombreUsuario"] = $nombreUsuario;
						//Mandar a head.html

						header('Location: head.php');

						//Guardar variables de sesi&#243;n
						$_SESSION["idUsuario"] = $idUsuario;
						$_SESSION["nombreUsuario"] = $nombreUsuario;
					} else {//No est&#225; registrado!!
						echo "Fallo en el usuario y/o contrase&ntilde;a, por favor <a href=\"#\" onclick=\"history.back(1);return false\">vuelva a intentarlo</a>";
					}
				}
			} else {//Si no ha pasado la validaci&#243;n
				echo "<br/><br/>Los datos que ha introducido no son v&#225;lidos, por favor vuelva a intentarlo";
			}
			?>
		</div>
		<!-- Pie de p&#225;gina -->
		<?php
		include ("piedepagina.php");
		?>
	</body>
</html>