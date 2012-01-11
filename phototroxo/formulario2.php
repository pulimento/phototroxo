<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<title>Phototroxo - Registro</title>
		<meta name="author" content="Javi Pulido" />
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_formulario2.css" />
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

			//Definición de variables
			$user = strip_tags($_POST['user']);
			$password = strip_tags($_POST['password']);
			$dniconletra = strip_tags($_POST['dni']) . strip_tags($_POST['letra']);
			$nombre = strip_tags($_POST['nombre']);
			$apellidos = strip_tags($_POST['apellidos']);
			$email = strip_tags($_POST['email']);
			$fecha = explode("/", strip_tags($_POST['datepicker']));
			$calle = strip_tags($_POST['calle']);
			$poblacion = strip_tags($_POST['poblacion']);
			$provincia = strip_tags($_POST['provincia']);
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

			if (!isset($_POST['sexo'])) {
				echo "- Debe de especificar el sexo<br/>";
				$validado = false;
			} else {
				$sexo = $_POST['sexo'];
			}

			if (strlen($dniconletra) != 9) {
				echo "- Faltan cifras en el DNI introducido<br/>";
				$validado = false;
			}

			if (strlen($nombre) == 0) {
				echo "- El campo 'Nombre' no puede estar vacío<br/>";
				$validado = false;
			}

			if (strlen($apellidos) == 0) {
				echo "- El campo 'Apellidos' no puede estar vacío<br/>";
				$validado = false;
			}

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo "- El e-mail introducido no es correcto<br/>";
				$validado = false;
			}

			//fecha es un array con día, mes y año
			if (count($fecha) == 1) {
				echo "- La fecha introducida no es válida<br/>";
				$validado = false;
			} else {
				$fechaSQL = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];
			}

			if (strlen($calle) == 0) {
				echo "- El campo 'Calle/Avda.' no puede estar vacío<br/>";
				$validado = false;
			}

			if (strlen($poblacion) == 0) {
				echo "- El campo 'Población' no puede estar vacío<br/>";
				$validado = false;
			}

			//FIN DE LA VALIDACION DEL LADO DEL SERVIDOR

			if ($validado) {
				$link = mysql_connect("localhost", "root", "") or die ;
				mysql_select_db("phototroxo", $link);

				// Con esta sentencia SQL insertaremos los datos en la base de datos
				mysql_query("INSERT INTO usuario (User,Pass,Nombre,Apellidos,FechaNacimiento,mail,dni,sexo,calle,
					poblacion,provincia) VALUES ('$user','$password','$nombre','$apellidos','$fechaSQL','$email','$dniconletra','$sexo','$calle',
					'$poblacion','$provincia')", $link);

				// Ahora comprobaremos que todo ha ido correctamente (tratamiento de errores)
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
		</div>
	</body>
</html>