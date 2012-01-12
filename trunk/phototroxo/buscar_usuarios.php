<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Phototroxo - Buscador de Usuarios</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_buscar_usuarios.css" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		
		<!-- INICIO DE JAVASCRIPT -->
		<!-- Validaci&#243;n del formulario -->
		<script type="text/javascript" language="JavaScript">
			function procesarUsuarios() {
				//Definici&#243;n de variables
				var ctrlUser = document.getElementById("input_usuario");
				var ctrlUser2= document.getElementById("input_confirmarUsuario");
				var validado = true;
				var msgError = "";

				//Pone todos los labels en negro, &#250;til si el usuario se equivoca dos veces
				var labels = document.getElementsByTagName("label"), i;
				for( i = 0; i < labels.length; i++)
				labels[i].setAttribute("class", "default");

				if(ctrlUser.value.length < 4) {
					msgError += "- El usuario debe tener al menos cuatro caracteres\n";
					document.getElementById("label_usuario").setAttribute("class", "error");
					ctrlUser.value = "";
					validado = false;
				}

				if(ctrlUser2.value != ctrlUser.value) {
					msgError += "- El usuario no existe\n";
					document.getElementById("label_usuario").setAttribute("class", "error");
					document.getElementById("label_confirmacionUsuario").setAttribute("class", "error");
					validado = false;
				};

				if(msgError != "") {
					alert("Los datos introducidos no son v\xE1lidos, por favor compruebe lo siguiente:\n\n" + msgError);
					ctrlUser2.value = "";
					
				}
				return validado;
			}
		</script>
		<!-- Fin de validaci&#243;n del formulario -->
		<!-- FIN DE JAVASCRIPT -->
	</head>
	<body>
		<!-- Cabecera(logo y men&#250;) -->
		<?php
		include ("cabecera.php");
		?> <!-- Contenido -->
		<div id="div_content">
			<form id="form_buscar_usuario" action="resultadoBuscarUsuarios.php" method="post" onsubmit="return procesarUsuarios()">
				<label id="label_palabra" for="palabra">Buscar usuario:</label>
				<input id="input_palabra" type="text" name="palabra" />
				<input id="boton_submit" type="submit" name="boton" value="Buscar" />
			</form>
		</div>
		<!-- Pie de p&#225;gina -->
		<?php
		include ("piedepagina.php");
		?>
	</body>
</html>