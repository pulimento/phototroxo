<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Phototroxo - Buscador de Fotos</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_buscar_fotos.css" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<meta name="author" content="Patricia_Raigada" />
		
		<!-- INICIO DE JAVASCRIPT -->
		<!-- Validaci&#243;n del formulario -->
		<script type="text/javascript" language="JavaScript">
			function procesarFotos() {
				//Definici&#243;n de variables
				var ctrlTitulo = document.getElementById("titulo");
				var validado = true;
				var msgError = "";

				//Pone todos los labels en negro, &#250;til si el usuario se equivoca dos veces
				var labels = document.getElementsByTagName("label"), i;
				for( i = 0; i < labels.length; i++)
				labels[i].setAttribute("class", "default");

				if(ctrlTitulo.value.length < 4) {
					msgError += "- El usuario debe tener al menos cuatro caracteres\n";
					document.getElementById("label_titulo").setAttribute("class", "error");
					ctrlTitulo.value = "";
					validado = false;
				}


				if(msgError != "") {
					alert("El usuario introducido no es v\xE1lido, por favor compruebe lo siguiente:\n\n" + msgError);
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
			<form id="form_buscar_foto" action="resultadoBuscarFotos.php" method="post" onsubmit="return procesarFotos()">
				<label id="label_palabra" for="palabra">Buscar Foto:</label>
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