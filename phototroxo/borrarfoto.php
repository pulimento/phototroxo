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
		<title>Phototroxo - Borrar foto</title>
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
			//Conectando a la base de datos
			$link = mysql_connect('localhost', 'root', '') or die;
			mysql_select_db("phototroxo", $link);
			$result_borrarfoto = mysql_query("DELETE FROM imagen WHERE idI = '$idFoto'", $link);
			$my_error = mysql_error($link);

			if (!empty($my_error)) {//Si hay error accediendo a la BD
				echo "Ha habido un error accediendo a la base de datos. Int&#233;ntelo m&#225;s tarde. $my_error";
			} else {
				echo 'La foto se ha borrado correctamente. <a href="album.php?idU=' . $idU . '">Volver a tu &#225;lbum</a>';
			}
			?>
		</div>
		<!-- Pie de p&#225;gina -->
		<?php
		include ("piedepagina.php");
		?>
	</body>
</html>