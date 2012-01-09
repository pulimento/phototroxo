<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<title>Nueva Contraseña</title>
		<link rel="stylesheet" type="text/css"  href="stylesheets/estilo_nuevacontrasena.css" />
		<meta name="author" content="Margari" />
		<!-- Date: 2012-01-02 -->
		<!-- INICIO DE JAVASCRIPT -->
		<!-- Validación del formulario -->
		<script type="text/javascript" language="JavaScript">
			function procesarFormulario() {
				//Definición de variables
				var ctrlUser = document.getElementById("input_usuario");
				var ctrlPassword = document.getElementById("input_nuevaContrasena");
				var ctrlPassword2 = document.getElementById("input_confirmacion");
				var validado = true;
				var msgError = "";

				//Pone todos los labels en negro, útil si el usuario se equivoca dos veces
				var labels = document.getElementsByTagName("label"), i;
				for( i = 0; i < labels.length; i++)
				labels[i].setAttribute("class", "default");

				if(ctrlUser.value.length < 4) {
					msgError += "- El usuario debe tener al menos cuatro caracteres\n";
					document.getElementById("label_usuario").setAttribute("class", "error");
					ctrlUser.value = "";
					validado = false;
				}

				if(ctrlPassword.value.length < 6) {
					msgError += "- La contrase\xF1a debe tener al menos seis caracteres\n";
					document.getElementById("label_contrasena").setAttribute("class", "error");
					document.getElementById("label_confirmacioncontrasena").setAttribute("class", "error");
					validado = false;
				}

				if(ctrlPassword2.value != ctrlPassword.value) {
					msgError += "- Las contrase\xF1as no coinciden\n";
					document.getElementById("label_contrasena").setAttribute("class", "error");
					document.getElementById("label_confirmacioncontrasena").setAttribute("class", "error");
					validado = false;
				};

				if(msgError != "") {
					alert("Los datos introducidos no son v\xE1lidos, por favor compruebe lo siguiente:\n\n" + msgError);
					ctrlPassword.value = "";
					ctrlPassword2.value = "";
				}
				return validado;
			}
		</script>
		<!-- Fin de validación del formulario -->
		<!-- FIN DE JAVASCRIPT -->
	</head>
	<body>
		<div id="div_header">
			<img id="img_header" src="images/header.png" alt="Phototroxo" />
		</div>
		<div id="div_form">
			<form id="contrasena" action="nuevacontrasena2.php" method="post" onsubmit="return procesarFormulario()">
				<h1 id="nueva contraseña">&iquest;Has olvidado tu contrase&ntilde;a?</h1>
				<div id="usuario">
					<label id="label_usuario">Introduzca su nombre de usuario:</label>
					<input id="input_usuario"  name="user" type="text"/>
				</div>
				<div id="introduzca_contrasena">
					<label id="label_contrasena">Introduzca su nueva contraseña:</label>
					<input id="input_nuevaContrasena"  name="password" type="text"/>
				</div>
				<div id= "confirmacion">
					<label id="label_confirmacioncontrasena">Confirme su nueva contraseña:</label>
					<input id="input_confirmacion"  name="password2" type="text"/>
				</div>
				<div id = "boton_confirmar">
					<input id="boton_enviar" type="submit" value="Enviar" />
					<!--<button id="confirmar">
					Enviar
					</button>-->
				</div>
			</form>
		</div>
		<!-- Pie de página -->
		<?php
		include ("piedepagina.php");
		?>
	</body>
</html>
