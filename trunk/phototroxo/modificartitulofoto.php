<?php
session_start();
$idU = $_SESSION["idUsuario"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Phototroxo - Modificar el t&#237;tulo de la foto</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_borrar_foto.css" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<meta name="author" content="Javi Pulido" />
	</head>
	<body>
		<!-- Cabecera(logo y men&#250;) -->
		<?php
		include ("cabecera.php");
		?>

		<div id="div_content">
			<?php
			$idFoto = $_GET["idI"];
			$titulo = $_GET["titulo"];
			
			   $validado = true;
			//Validaci&#243;n del lado del servidor

			if (strlen($titulo) < 4) {
				echo "- El titulo debe tener al menos cuatro caracteres
			<br/>
			";
				$validado = false;
			}
			
			
			//Conectando a la base de datos
			if($validado){
			$link = mysql_connect('localhost', 'root', '') or die;
			mysql_select_db("phototroxo", $link);
			$result = mysql_query("UPDATE imagen SET titulo = '$titulo' WHERE idI = '$idFoto'", $link);
			$my_error = mysql_error($link);

			if (!empty($my_error)) {//Si hay error accediendo a la BD
				echo "Ha habido un error accediendo a la base de datos. Int&#233;ntelo m&#225;s tarde. $my_error";
			} else {
				echo 'El t&#237;tulo se ha modificado correctamente. <a href="verfoto.php?idI=' . $idFoto . '">Volver a la foto</a>';
			}
			}
			?>
		</div>
		<!-- Pie de p&#225;gina -->
		<?php
		include ("piedepagina.php");
		?>
	</body>
</html>
