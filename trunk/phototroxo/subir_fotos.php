<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Phototroxo - Subir Fotos</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_subir_fotos.css" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<meta name="author" content="Javi Pulido" />
		
		<!-- INICIO DE JAVASCRIPT -->
		<!-- Validaci&#243;n del formulario -->
		<script type="text/javascript" language="JavaScript">
			function procesarSubirFotos() {
				//Definici&#243;n de variables
				var ctrluser = document.getElementById("usuario");
				var ctrlPassword = document.getElementById("pass");
				var ctrlAcepto = document.getElementById("acepto");
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

				if(ctrlPassword.value.length < 6) {
					msgError += "- La contrase\xF1a debe tener al menos seis caracteres\n";
					document.getElementById("label_pass").setAttribute("class", "error");
					ctrlPassword.value = "";
					validado = false;
				}

				if(ctrlAcepto.checked == false) {
					msgError += "- Debe aceptar las condiciones generales y la pol\xEDtica de privacidad\n";
					document.getElementById("label_acepto").setAttribute("class", "error");
					validado = false;
				}

				if(msgError != "") {
					alert("Los datos introducidos no son v\xE1lidos, por favor compruebe lo siguiente:\n\n" + msgError);
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
			<h2 id="text_subirfotos">Subir Fotos</h2>
			<form enctype="multipart/form-data" action="uploadphoto.php" method="POST">
				<div id="titulo_foto">
					<label id="label_title_uploadphoto" for="title_uploadphoto">T&#237;tulo:</label>
					<input name="title_uploadphoto" type="text" />
				</div>
				<div id="seleccionarfoto">
					<label id="label_uploadphoto" for="uploadedphoto">Selecciona una foto:</label>
					<input name="uploadedphoto" type="file" />
					<p>
						Se admiten im&#225;genes en formato JPG, PNG y GIF
					</p>
				</div>
				<button id="button_subirfoto">
					Subir foto
				</button>
			</form>
		</div>
		<!-- Pie de p&#225;gina -->
		<?php
		include ("piedepagina.php");
		?>
		
		
	</body>
</html>
