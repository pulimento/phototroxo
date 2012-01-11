<?php
session_start();
$idU = $_SESSION["idUsuario"];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<title>Phototroxo - Quienes Somos</title>
		<meta name="author" content="Margari" />
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_quienessomos.css" />
		<!-- Date: 2012-01-02 -->
	</head>
	<body>
		<!-- Cabecera(logo y men&#250;) -->
		<?php
		include ("cabecera.php");
		?>
		<div id="quienes_somos">
			<h1> ¿Qui&#233;nes somos?</h1>
			<p>
				Somos un grupo de estudiantes de Ingenier&#237;a Inform&#225;tica de Gesti&#243;n.

				La web es con fines acad&#233;micos, para la asignatura de tercero ABD.
			</p>
			<p>
				Somos el grupo 65. Nuestros integrantes son:
				<br />
				<br />
				Francisco Javier Pulido Espina
				<br />
				Cristina Del Marco Mart&#237;nez
				<br />
				Patricia Raigada Romero
				<br />
				Margarita Vela Jim&#233;nez
				<br />
				Jos&#233; Manuel Llamas Llamas
				<br />
			</p>
		</div>
		<!-- Pie de p&#225;gina -->
		<?php
		include ("piedepagina.php");
		?>
	</body>
</html>
