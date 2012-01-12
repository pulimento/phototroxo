<?php
session_start();
$idU = $_SESSION["idUsuario"];
$idFoto = $_GET["idI"];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Phototroxo - Opciones de foto</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_opciones_foto.css" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<meta name="author" content="Javi Pulido" />
		
		<!-- INICIO DE JAVASCRIPT -->
		<!-- Validaci&#243;n del formulario -->
		<script type="text/javascript" language="JavaScript">
			function procesarCambio() {
				//Definici&#243;n de variables
				var ctrlTitulo = document.getElementById("input_titulo");
				var validado = true;
				var msgError = "";

				//Pone todos los labels en negro, &#250;til si el usuario se equivoca dos veces
				var labels = document.getElementsByTagName("label"), i;
				for( i = 0; i < labels.length; i++)
				labels[i].setAttribute("class", "default");

				if(ctrlTitulo.value.length < 4) {
					msgError += "- El titulo debe tener al menos cuatro caracteres\n";
					document.getElementById("label_titulo").setAttribute("class", "error");
					ctrlTitulo.value = "";
					validado = false;
				}
				
				if(msgError != "") {
					alert("El  introducido no es v\xE1lido, por favor compruebe lo siguiente:\n\n" + msgError);
					
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
		?>

		<!-- Contenido -->
		<div>
			<h2>Opciones de foto</h2>
			<div id="modificartitulo">
				<h3>Modificar el t&#237;tulo de la foto</h3>
				<form id="form_modificar_titulo" action="modificartitulofoto.php" method="get" onsubmit="return procesarCambio()">
					<label  id="label_titulo" for="titulo">Introduce el nuevo t&#237;tulo de la foto : </label>
					<input  id="input_titulo" type="text" name="titulo" />
					<input  type="hidden" name="idI" value="<?php echo $idFoto;?> "; />
					<button id="button_subirfoto">
						Modificar
					</button>
				</form>
			</div>
			<div id="borrarfoto">
				<h3>Borrar la foto</h3>
				<?php
				echo 'Si quieres borrar esta foto, pulsa <a href="borrarfoto.php?idI=' . $idFoto . '">aqu&#237;</a>';
				?>
			</div>
		</div>
		<!-- Pie de p&#225;gina -->
		<?php
		include ("piedepagina.php");
		?>
	</body>
</html>